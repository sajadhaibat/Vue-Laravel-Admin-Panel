/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import swal from 'sweetalert2';
import VueProgressBar from 'vue-progressbar'
import { Form, HasError, AlertError} from 'vform';
window.Form = Form;
window.swal = swal;
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

import VueRouter from 'vue-router';
Vue.use(VueRouter);
let routes = [
    // {path: '/', component:require('./components/dashboard.vue').default },
    {path: '/users', component:require('./components/users.vue').default },
    {path: '/dashboard', component:require('./components/dashboard.vue').default },
    {path: '/profiles', component:require('./components/Profiles.vue').default },
    //{path: '/do', component: do },
];
const router = new VueRouter({
    mode:'history',
    routes
});

Vue.filter('capitalFirst', function (text) {
    return text.charAt(0).toUpperCase() + text.slice(1);
});
window.Fire = new Vue();


const options = {
    color: '#bffaf3',
    failedColor: '#874b4b',
    thickness: '4px',
    transition: {
        speed: '0.01s',
        opacity: '0.6s',
        termination: 300
    },
    autoRevert: true,
    location: 'top',
    inverse: false
};

Vue.use(VueProgressBar, options);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('top-navbar', require('./components/top_navbar.vue').default);
Vue.component('side-bar', require('./components/sidebar.vue').default);
Vue.component('pagef', require('./components/pagefooter.vue').default);
Vue.component('pagebox', require('./components/Pagebox.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#wrapper',
    router
});
