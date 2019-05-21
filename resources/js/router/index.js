import VueRouter from 'vue-router'

import Login from '../components/auth/Login'
import Home from "../components/Pages/Home";
import DefaultContainer from '../components/containers/DefaultContainer'
import SuppliersList from '../components/Pages/Dictionaries/Suppliers'
import ForgotPassword from "../components/auth/ForgotPassword";
import ResetPasswordForm from '../components/auth/ResetPasswordForm'


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
                 component: Home
             },
             {
                 path: '/suppliers',
                 name: 'suppliers',
                 component: SuppliersList
             }
         ]
     }
]
});
export default router;
