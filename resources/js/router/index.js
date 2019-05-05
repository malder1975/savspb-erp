import VueRouter from 'vue-router'

import Login from '../components/auth/Login'
//import Index from "../components/Index";
import DefaultContainer from '../components/containers/DefaultContainer'
import Home from '../components/Pages/Home'
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
                 redirect: '/home'
             },
             {
                 path: '/home',
                 name: 'home',
                 component: Home
             }
         ]
     }
]
});
export default router;
