/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue              from 'vue';
import VueRouter        from 'vue-router';
import VueResource      from 'vue-resource';
import Vuetify          from 'vuetify';
//import                       '../../../node_modules/vuetify/dist/vuetify.min.css';
import routes           from './routes.js';

require('./bootstrap');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(Vuetify);
Vue.use(VueRouter);
Vue.use(VueResource);

Vue.http.headers.common['X-CSRF-TOKEN'] = document.head.querySelector('meta[name="csrf-token"]').content;

var router = new VueRouter({
    history: true,
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#application',
    router: router
});
