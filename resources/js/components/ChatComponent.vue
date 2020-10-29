<template>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 v-if="role == 2">Our Support Members</h4>
                    <h4 v-else>Users</h4>
                </div>
                <div class="card-body" style="overflow-y: scroll; height: 350px;">
                    <ul class="list-unstyled list-unstyled-border">
                        <li @click.prevent="currentUser(user.id)" class="media" style="cursor: pointer;" v-for="user in users" :key="user.id">
                            <div class="media-body">
                                <div class="mt-0 mb-1 font-weight-bold">{{ user.username }}</div>
                                <div class="text-muted text-small font-600-bold"><i class="fas fa-circle"></i> Offline</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card chat-box card-success">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h4 v-if="userMessages.user"><i class="fas fa-circle text-success mr-2" title="Online" data-toggle="tooltip"></i> Chat with {{ userMessages.user.username }}</h4>
                        <h4 v-else>Select Someone</h4>
                    </div>
                    <div class="dropdown dropleft" v-if="userMessages.user">
                        <i class="fas fa-ellipsis-v text-primary" data-toggle="dropdown" style="cursor: pointer;font-size: 1.2rem;"></i>
                        <div class="dropdown-menu">
                            <a @click.prevent="deleteMessages" class="dropdown-item" href="#">Clear Chat</a>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="overflow-y: scroll; height: 350px" v-chat-scroll>
                    <ul class="list-unstyled">
                        <li class="p-2" v-for="message in userMessages.messages" :key="message.id">
                            <div>
                                <strong>{{ message.user.username }}</strong> - <span class="text-muted">{{ message.created_at | dateformat }}</span>
                            </div>
                            <div :class="`p-3 rounded ${message.user.id == userMessages.user.id ? 'bg-light text-dark' : 'bg-primary text-white'}`" style="width: fit-content;">
                                {{ message.message }}
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-footer chat-form border-top border-light">
                    <form id="chat-form2" v-if="userMessages.user">
                        <textarea v-model="message" type="text" name="message" class="form-control" placeholder="Type a message" @keyup.enter="sendMessage"></textarea>
                        <button class="btn btn-primary" @click.prevent="sendMessage">
                            <i class="far fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
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

        },

        methods: {
            currentUser(userId) {
                this.$store.dispatch('userMessages', userId);
            },

            sendMessage() {
                if (this.message != '') {
                    axios.post('message/send', {message: this.message, receiver_id: this.userMessages.user.id})
                    .then(response => {
                        this.currentUser(this.userMessages.user.id);
                    });
                    this.message = '';
                }
            },

            deleteMessages() {
                axios.get('chats/delete/'+this.userMessages.user.id)
                    .then(response => {
                        this.currentUser(this.userMessages.user.id);
                    });
            }
        }
    }
</script>
