require('./bootstrap');

import Vue from 'vue';
import Vuex from 'vuex';
import BootstrapVue from 'bootstrap-vue'
import 'jquery/src/jquery.js'
import $ from 'jquery';
import mdbootstrap from 'mdbootstrap'

Vue.use(BootstrapVue);
Vue.use(Vuex);
window.$ = window.jQuery = $;

Vue.component('messenger-component', require('./components/MessengerComponent.vue').default);
Vue.component('message-conversation-component', require('./components/MessageConversationComponent.vue').default);
Vue.component('contact-component', require('./components/ContactComponent.vue').default);
Vue.component('contact-list-component', require('./components/ContactListComponent.vue').default);
Vue.component('active-conversation-component', require('./components/ActiveConversationComponent.vue').default);
Vue.component('status-component', require('./components/StatusComponent.vue').default);
Vue.component('profile-form-component', require('./components/ProfileFormComponent.vue').default);

const store = new Vuex.Store({
  state: {
    messages: []
  }
});

const app = new Vue({
    el: '#app',
    store,
    methods:{
      logout(){
        event.preventDefault();
        document.getElementById('logout-form').submit();
      }
    }
});
