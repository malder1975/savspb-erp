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
import Organizations from "../components/Pages/Dictionaries/Organizations";
import EditSupplier from "../components/Pages/Dictionaries/EditSupplier";
import SupPricelists from "../components/views/SupPricelists";
import InetAccs from '../components/views/InetAccs'


const router = new VueRouter({
    history: true,
    mode: 'history',
    scrollBehavior() {
        return {x: 0, y: 0};
    },

 routes: [
     {
         path: '/login',
         name: 'Вход',
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
         name: 'Главная',
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
                 name: 'Рабочий стол',
                 component: Dashboard
             },
             {
                 path: '/suppliers',
                 name: 'Поставщики',
                 component: SuppliersList,
                 childern: [
                     {
                         path: '/suppliers/:id',
                         name: 'Поставщик',
                         component: EditSupplier,
                         children: [
                             {
                                 path: '/price-lists',
                                 name: 'Прайс-листы поставщиков',
                                 component: SupPricelists,
                                 children: [
                                     {
                                         path: '/price-list/:id',
                                         name: 'Прайс-лист поставщика',
                                     }
                                 ]
                             },
                             {

                             }
                         ]
                     }
                 ]
             },

             {
                 path: '/organizations',
                 name: 'Организации',
                 component: Organizations,
                 meta: {
                     auth: true
                 }
             },
             {
               path: '/inetaccs',
               name: 'Счета Net Pay',
               component: InetAccs,
               meta: {
                   auth: true
               }
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
                         name: 'Персонал',
                         component: Persons
                     },
                     {
                         path: 'profile',
                         name: 'Профиль',
                         component: PersonProfile
                     }
                 ]
             }
         ]
     }
]
});
export default router;
