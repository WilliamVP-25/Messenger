require('./bootstrap');

window.Vue = require('vue');

import BootstrapVue from 'bootstrap-vue'
import 'jquery/src/jquery.js'
Vue.use(BootstrapVue);

import $ from 'jquery';
window.$ = window.jQuery = $;
import mdbootstrap from 'mdbootstrap'

Vue.component('messenger-component', require('./components/MessengerComponent.vue').default);
Vue.component('message-conversation-component', require('./components/MessageConversationComponent.vue').default);
Vue.component('contact-component', require('./components/ContactComponent.vue').default);
Vue.component('contact-list-component', require('./components/ContactListComponent.vue').default);
Vue.component('active-conversation-component', require('./components/ActiveConversationComponent.vue').default);

const app = new Vue({
    el: '#app',
    methods:{
      logout(){
        event.preventDefault();
        document.getElementById('logout-form').submit();
      }
    }
});
