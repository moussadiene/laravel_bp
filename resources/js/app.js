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

// les fonctionnalite de la pagination
Vue.component('pagination', require('laravel-vue-pagination'));
// recuperer et definir la vue add-entreprise
Vue.component('add-entreprise', require('./components/entreprise/AddEntrepriseComponent.vue').default);
Vue.component('edit-entreprise', require('./components/entreprise/EditEntrepriseComponent.vue').default);

import Home from './components/HomeComponent.vue';
import Entreprise from './components/entreprise/EntrepriseComponent.vue';
import Service from './components/service/ServiceComponent.vue';


const routes = [
    {
        path : '/',
        component : Home
    },
    {
        path : '/entreprise',
        component : Entreprise
    },
    {
        path : '/service',
        component : Service
    }
];

const router = new VueRouter({routes});

const app = new Vue({
    el: '#app',
    router : router
});
