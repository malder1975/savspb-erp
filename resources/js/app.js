require('./bootstrap');
import 'es6-promise/auto'
import axios from 'axios'
import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'
import VueForm from 'vue-form'
import VueAuth from '@websanova/vue-auth'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'
import App from './components/App'
import Index from './components/Index'
import auth from './auth'
import routes from './router'

import '@fortawesome/fontawesome-free/scss/fontawesome.scss'
import '../sass/style.scss'
import 'material-design-icons/iconfont/material-icons.css'
//import 'materialize-css/dist/css/materialize.min.css'

window.Vue = Vue;

Vue.component('App', require('./components/App.vue').default);
Vue.component('pagination', require('laravel-vue-pagination'));

Vue.use(BootstrapVue);
Vue.use(VueForm);
Vue.router = routes;
Vue.use(VueRouter);

Vue.use(VueAxios, axios);
axios.defaults.baseURL = `${process.env.MIX_APP_URL}/api/v1`;
Vue.use(VueAuth, auth);

new Vue({
        el: '#app',
        router: routes,
        methods: {
            //
        },
        render: h => h(App),
    });
