require('./bootstrap');

window.Vue = require('vue');

import Vuex from 'vuex';

window.moment = require('moment');

import VueChatScroll from 'vue-chat-scroll'

Vue.use(VueChatScroll)

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        users: [],
        userMessages: []
    },
    mutations: {
        users(state, payload) {
            return state.users = payload;
        },

        userMessages(state, payload) {
            return state.userMessages = payload;
        }
    },
    actions: {
        users(context) {
            axios.get('users')
                .then(response => {
                    context.commit('users', response.data);
                });
        },

        userMessages(context, payload) {
            axios.get('user/messages/'+payload)
                .then(response => {
                    context.commit('userMessages', response.data);
                });
        }
    },
    getters: {
        users(state) {
            return state.users;
        },

        userMessages(state) {
            return state.userMessages;
        }
    }
});

Vue.filter('dateformat', function (arg) {
    return moment(arg).format('h:mm a')
});

Vue.component('chat-component', require('./components/ChatComponent.vue').default);


const app = new Vue({
    el: '#app',
    store
});
