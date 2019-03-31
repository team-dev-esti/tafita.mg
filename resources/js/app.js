
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

window.Vue = require('vue');
import VueRouter from 'vue-router'
import routes from './routes'
var Turbolinks = require("turbolinks")
Turbolinks.start()
Vue.use(VueRouter)



Vue.component('boot', require('./components/boot.vue').default);


const app = new Vue({
    el: '#app',
    routes
});
