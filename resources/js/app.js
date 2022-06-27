import Vue from 'vue';
import IndexComponent from "./components/IndexComponent";
import router from "./router";
require('./bootstrap');
Vue.component('pagination', require('laravel-vue-pagination'));
const app = new Vue({
     el: '#app',
     components:{
         IndexComponent,
     },
    router
 })
