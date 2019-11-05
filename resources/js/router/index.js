import VueRouter from 'vue-router'

import Login from '../components/auth/Login'
import Home from "../components/Pages/Home";
import DefaultContainer from '../components/containers/DefaultContainer'
import Dashboard from '../components/views/Dashboard'
import SuperAdminDashboard from '../components/views/SuperAdmin/Dashboard'
import SuppliersList from '../components/Pages/Dictionaries/Suppliers'
//import SupplierView from '../components/views/SuppliersView'
import ForgotPassword from "../components/auth/ForgotPassword";
import ResetPasswordForm from '../components/auth/ResetPasswordForm'
import Persons from "../components/Pages/persons/Persons";
import PersonProfile from "../components/Pages/persons/PersonProfile";
import Organizations from "../components/Pages/Dictionaries/Organizations";
import EditSupplier from "../components/Pages/Dictionaries/EditSupplier";
import SupplierPrices from "../components/views/SuppPriceList";
import Register from "../components/Pages/Register";
//import store from '../store/index'


const router = new VueRouter({
    history: true,
    mode: 'history',
    scrollBehavior() {
        return {x: 0, y: 0};
    },

 routes: [
     {
         path: '/login',
         name: 'login',
         component: Login,
         meta: {
             auth: false
         }
     },
     {
       path: '/register',
       name: 'register',
       component: Register,
       meta: {
           auth: false
       }
     },
     {
       path: '/reset-password',
         name: 'Забыли пароль',
         component: ForgotPassword,
         meta: {
           auth: false
         }
     },
    /* {
       path: '/reset-password/:token',
         name: 'Сменить пароль',
         component: ResetPasswordForm,
         meta: {
           auth: false
         }
     },*/

     {
         path: '/',
         redirect: '/dashboard',
         name: 'index',
         component: DefaultContainer,
         meta: {
             auth: true
         },
         children: [
             {
                 path: '/',
                 redirect: '/dashboard'
             },
             {
                 path: '/dashboard',
                 name: 'dashboard',
                 component: Dashboard,
                 meta: {
                     auth: true
                 }
             },
             /*{
                 path: '/superadmin',
                 name: 'sadmin.dashboard',
                 component: SuperAdminDashboard,
                 meta: {
                     auth: {levels: 100, redirect: { name: 'login'}, forbiddenRedirect: '/403'}
                 }
             },*/

             {
                 path: '/suppliers',
                 name: 'suppliers',
                 component: SuppliersList,
                 childern: [
                     {
                         path: '/supplier/:id/edit',
                         name: 'supplier',
                         component: EditSupplier,
                         children: [
                             {
                                 path: 'price-lists',
                                 name: 'supplprices',
                                 component: SupplierPrices

                             },

                             {
                                 path: 'price-lists/:id',
                                 name: 'supplprice'

                             }
                         ]
                     }
                 ]
             },

             /*{
                 path: '/organizations',
                 name: 'Organizations',
                 component: Organizations
             },*/
             {
                 path: '/users',
                 name: 'users',
                 redirect: 'Pages/persons',
                 component: {
                     render (c) {
                         return c('router-view')
                     }
                 },
                 childern: [
                     {
                         path: 'persons',
                         name: 'Persons',
                         component: Persons
                     },
                     {
                         path: 'profile',
                         name: 'Profile',
                         component: PersonProfile
                     }
                 ]
             }
         ]
     },
]
});

/*router.beforeEach((to, from, next) => {
   if(to.matched.some(route => route.meta.auth) && !store.state.isLoggedIn) {
       next({ name: 'login' })
       return
   }
   if (to.path === '/login' && store.state.isLoggedIn) {
       next({ name: 'dashboard' })
   }
   next()
});*/
export default router;
