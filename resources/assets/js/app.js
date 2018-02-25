
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vuetify from 'vuetify'
import VueRouter from 'vue-router';
import VideoRoom from './scenes/VideoRoom/index.vue';
import QuestionForm from './scenes/CreateQuestion/QuestionForm.vue';
import Lobby from './scenes/Lobby/index.vue';

//IMPORT VUEX STORE
// import { store } from './store';


Vue.use(VueRouter);
Vue.use(Vuetify)

// CSS
import 'vuetify/dist/vuetify.min.css'

const uri = '/app';

const routes = [
    { path: `${uri}/video`, component: VideoRoom },
    { path: `${uri}/question`, component: QuestionForm },
    { path: `${uri}/lobby`, component: Lobby },
];

const router = new VueRouter({
    routes,
    mode: 'history'
});


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('video-room', require('./scenes/VideoRoom/index.vue'));
// Vue.component('app-wrapper', require('./AppContainer/AppWrapper.vue'));
// Vue.component('walkthrough', require('./AppContainer/walkthrough.vue'));
// Vue.component('animated-options', require('./AppContainer/AnimatedOptions.vue'));
// Vue.component('photo-preview', require('./AppContainer/PhotoPreview.vue'));

const app = new Vue({
    // store,
    router,
    el: '#app'
});










