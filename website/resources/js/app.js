require('./bootstrap');

window.Vue = require('vue');


import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
Vue.component('pagination', require('laravel-vue-pagination'));
export const bus = new Vue();

import App from './views/App'
import Login from './views/Login'
import Signup from './views/Signup'
import Home from './views/Home'


const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/Login',
            name: 'login',
            component: Login,
        },
        {
            path: '/signup',
            name: 'Sign up',
            component: Signup,
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});





