
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';

//IMPORT VUEX STORE
// import { store } from './store';


// Vue.use(VueRouter);


// const routes = [
//     { path: '/upload', component: walkthrough },
//     { path: '/animated', component: AnimatedOptions },
//     { path: '/preview', component: PhotoPreview }

// ];

// const router = new VueRouter({
//     routes,
//     mode: 'history'
// });


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('video-chat', require('./VideoChat/Video.vue'));
// Vue.component('app-wrapper', require('./AppContainer/AppWrapper.vue'));
// Vue.component('walkthrough', require('./AppContainer/walkthrough.vue'));
// Vue.component('animated-options', require('./AppContainer/AnimatedOptions.vue'));
// Vue.component('photo-preview', require('./AppContainer/PhotoPreview.vue'));

const app = new Vue({
    // store,
    // router,
    el: '#app'
});










