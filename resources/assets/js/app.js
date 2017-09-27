require('./bootstrap');

require('./scripts');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

let axios = require('axios');

Vue.component('sidebar', require('./components/dashboard/Sidebar.vue'));
Vue.component('userinfo', require('./components/dashboard/UserInfo.vue'));
Vue.component('properties', require('./components/dashboard/Properties.vue'));

// Passport Components
Vue.component('passport-clients', require('./components/passport/Clients.vue'));
Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue'));
Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue'));

// Custom Passport Components
Vue.component('passport-login-form', require('./components/passport/PassportLoginForm.vue'));

const app = new Vue({
    el: '#app',
    data: {
    	currentView: 'profile'
    }
});
