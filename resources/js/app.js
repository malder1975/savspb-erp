require('./bootstrap');
import 'es6-promise/auto'
import axios from 'axios'
import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import VueForm from 'vue-form'
import VueAuth from '@websanova/vue-auth'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'
//import DatatableFactory from 'vuejs-datatable'
//import Vuex from 'vuex'
import App from './components/App'
import Index from './components/Index'
import auth from './auth'
import routes from './router'
//import storeData from './store'
import '@fortawesome/fontawesome-free/scss/fontawesome.scss'
import '../sass/style.scss'
import 'material-design-icons/iconfont/material-icons.css'
import { VuejsDatatableFactory } from 'vuejs-datatable';
import Toastr from '@enso-ui/toastr/bulma';
import ToastrPlugin from '@enso-ui/toastr';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
//import 'materialize-css/dist/css/materialize.min.css'

window.Vue = Vue;

Vue.component('App', require('./components/App.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('fa', FontAwesomeIcon);

Vue.use(BootstrapVue);
Vue.use(VueForm);
Vue.router = routes;
Vue.use(VueRouter);
Vue.use(VuejsDatatableFactory);
Vue.use(ToastrPlugin, {
    layout: Toastr,
    options: {
        duration: 3500,
        position: 'right',
    },
});
//Vue.use(Vuex);


Vue.use(VueAxios, axios);
axios.defaults.baseURL = `${process.env.MIX_APP_URL}/api/v1`;
Vue.use(VueAuth, auth);


//const store = new Vuex.Store(storeData);

new Vue({
        el: '#app',
        router: routes,
       // store,
        methods: {
            //
        },
        render: h => h(App),
    });
