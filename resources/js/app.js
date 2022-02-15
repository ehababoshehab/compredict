require('./bootstrap');

import Vue from 'vue'
window.Vue = Vue;
import VueRouter from 'vue-router'
import routes from "./Router/routes"
import router from "./Router"
import VehiclesList from './components/VehiclesIndex.vue';
import TripsPlot from './components/TripsPlot.vue';

Vue.component('vehicles-index', require('./components/VehiclesIndex.vue').default);
Vue.component('trips-plot', require('./components/TripsPlot.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));

Vue.use(VueRouter)

const app = new Vue({
    el: '#app',
    router: router
});
