/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

//importation du module vue-router
import VueRouter from 'vue-router';

//permetre vue d'utiliser les fonctionnalite de Vue-
Vue.use(VueRouter);

import Home from './components/HomeComponent.vue';
import Entreprise from './components/EntrepriseComponent.vue';


const routes = [
    {
        path : '/',
        component : Home
    },
    {
        path : '/entreprise',
        component : Entreprise
    }
];

const router = new VueRouter({routes})

const app = new Vue({
    el: '#app',
    router : router
});