import VueRouter from 'vue-router'

import Login from '../components/auth/Login'
import Home from "../components/Pages/Home";
import DefaultContainer from '../components/containers/DefaultContainer'
import Dashboard from '../components/Views/Dashboard'
import SuppliersList from '../components/Pages/Dictionaries/Suppliers'
//import SupplierView from '../components/views/SuppliersView'
import ForgotPassword from "../components/auth/ForgotPassword";
import ResetPasswordForm from '../components/auth/ResetPasswordForm'
import Persons from "../components/Pages/persons/Persons";
import PersonProfile from "../components/Pages/persons/PersonProfile";


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
                 component: Dashboard
             },
             {
                 path: '/suppliers',
                 name: 'suppliers',
                 component: SuppliersList
             },
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
     }
]
});
export default router;
