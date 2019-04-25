
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import 'es6-promise/auto'
import axios from 'axios'
import Vue from 'vue'
import App from './components/App'
import BootstrapVue from 'bootstrap-vue'
import VueAuth from '@websanova/vue-auth'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'
import Index from './components/Index'
import auth from './auth'
import routes from './router'

window.Vue = Vue;





/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */



//Vue.component('Index', require('./components/Index.vue').default);
//Vue.component('App', require('./components/App.vue').default);

//import Index from './components/Index'

Vue.use(BootstrapVue);
Vue.router = routes;
Vue.use(VueRouter);
//const routes = new VueRouter({router})

Vue.use(VueAxios, axios);
axios.defaults.baseURL = `${process.env.MIX_APP_URL}/api/v1`;
Vue.use(VueAuth, auth);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/*const app = new Vue({
    components: {
        Index,
        routes
    },

}).$mount('#app');*/
new Vue({
    el: '#app',
    router: routes,
    render: h => h(Index)
});
