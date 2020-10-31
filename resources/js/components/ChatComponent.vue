<template>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 v-if="role.role == 2">Our Support Members</h4>
                    <h4 v-else>Users</h4>
                </div>
                <div class="card-body" style="overflow-y: scroll; height: 350px;">
                    <ul class="list-unstyled list-unstyled-border">
                        <li @click.prevent="currentUser(user.id)" class="media" style="cursor: pointer;"
                            v-for="user in users" :key="user.id">
                            <div class="media-body">
                                <div class="mt-0 mb-1 font-weight-bold">{{ user.username }}</div>
                                <div v-if="online(user.id)" class="text-success text-small font-600-bold"><i
                                    class="fas fa-circle"></i> Online
                                </div>
                                <div v-else class="text-muted text-small font-600-bold"><i class="fas fa-circle"></i>
                                    Offline
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card chat-box card-primary mb-0">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h4 v-if="userMessages.user">
                            <i class="fas fa-user text-primary mr-2"></i>
                            Chat with {{ userMessages.user.username }}</h4>
                        <h4 v-else>Select Someone</h4>
                    </div>
                    <div class="dropdown dropleft" v-if="userMessages.user">
                        <i class="fas fa-ellipsis-v text-primary" data-toggle="dropdown"
                           style="cursor: pointer;font-size: 1.2rem;"></i>
                        <div class="dropdown-menu">
                            <a @click.prevent="deleteMessages" class="dropdown-item" href="#">Clear Chat</a>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="overflow-y: scroll; height: 350px" v-chat-scroll>
                    <ul class="list-unstyled d-flex flex-column">
                        <li :class="`p-2 ${message.user.id == userMessages.user.id ? 'mr-auto' : 'ml-auto'}`"
                            v-for="message in userMessages.messages" :key="message.id">
                            <div>
                                <strong>{{ message.user.username }}</strong> - <span
                                class="text-muted">{{ message.created_at | dateformat }}</span>
                            </div>
                            <div :class="`px-3 py-2 rounded ${message.user.id == userMessages.user.id ? 'bg-light text-dark' : 'bg-primary text-white'}`"
                                style="width: fit-content;">
                                <div v-if="message.attachment">
                                    <img style="width: 100%;" :src="`storage/chat_images/${message.attachment}`"  alt="chat attachment">
                                </div>
                                <div v-else>
                                    {{ message.message }}
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-footer chat-form border-top border-light">
                    <form id="chat-form2" v-if="userMessages.user">
                        <textarea v-model="message" type="text" name="message" class="form-control"
                                  placeholder="Type a message" @keyup.enter="sendMessage"
                                  @keydown="typing(userMessages.user.id)"></textarea>
                        <button class="btn btn-primary" @click.prevent="sendMessage">
                            <i class="far fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="d-flex mt-3" v-if="userMessages.user">
                <p class="my-0 mr-3">
                    <file-upload
                        :post-action="'message/image/send'"
                        ref='upload'
                        @input-file="$refs.upload.active = true"
                        :headers="{'X-CSRF-TOKEN': token}"
                        name="attachment"
                        :data="{receiver_id: userMessages.user.id}"
                        :size="1024 * 1024"
                        @input="imageSend"
                    >
                        <i class="fas fa-image text-primary" style="font-size: 2rem;"></i>
                    </file-upload>
                </p>
                <p class="my-0 text-primary font-weight-bold" v-if="typerName && userMessages.user">{{ typerName }} typing....</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['role'],

    mounted() {
        this.$store.dispatch('users');
    },

    data() {
        return {
            message: '',
            typerName: '',
            onlineUsers: [],
            typerTimeOut: false,
            token: document.head.querySelector('meta[name="csrf-token"]').content,
        }
    },

    computed: {
        users() {
            return this.$store.getters.users;
        },

        userMessages() {
            return this.$store.getters.userMessages;
        }
    },

    created() {
        Echo.private('chat.' + this.$props.role.id)
            .listen('MessageSendEvent', (event) => {
                this.currentUser(event.message.user_id);
            });

        Echo.private('userTyping')
            .listenForWhisper('typing', (e) => {
                if (this.userMessages.user) {
                    if (e.user.id == this.userMessages.user.id && e.userId == this.$props.role.id) {
                        this.typerName = e.user.username;
                    }

                    if (this.typerTimeOut) {
                        clearTimeout(this.typerTimeOut);
                    }

                    this.typerTimeOut = setTimeout(() => {
                        this.typerName = '';
                    }, 2000);
                }
            });

        Echo.join('onlineUsers')
            .here((users) => {
                this.onlineUsers = users;
            })
            .joining((user) => {
                this.onlineUsers.push(user);
            })
            .leaving((user) => {
                var index = this.onlineUsers.indexOf(user);
                if (index > -1) {
                    this.onlineUsers.splice(index, 1);
                }
            });
    },

    methods: {
        currentUser(userId) {
            this.$store.dispatch('userMessages', userId);
        },

        imageSend() {
            this.currentUser(this.userMessages.user.id);
        },

        sendMessage() {
            if (this.message != '') {
                axios.post('message/send', {message: this.message, receiver_id: this.userMessages.user.id})
                    .then(response => {
                        this.currentUser(this.userMessages.user.id);
                    });
                this.message = '';
            } else {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'error',
                    title: 'Please enter your message!'
                })
            }
        },

        deleteMessages() {
            axios.get('chats/delete/' + this.userMessages.user.id)
                .then(response => {
                    this.currentUser(this.userMessages.user.id);
                });
        },

        typing(userId) {
            Echo.private('userTyping')
                .whisper('typing', {
                    user: this.$props.role,
                    typed: this.message,
                    userId: userId
                });
        },

        online(onlineId) {
            return _.find(this.onlineUsers, {'id': onlineId});
        }
    }
}
</script>
