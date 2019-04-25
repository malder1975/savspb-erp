import VueRouter from 'vue-router'

// Pages
import Home from './components/pages/Home'
//import About from './pages/About'
import Register from './components/pages/Register'
import Login from './components/pages/Login'
import Dashboard from './components/pages/user/Dashboard'
//import AdminDashboard from './pages/admin/Dashboard'
// Routes
const routes = [
    {
        path: '*',
        redirect: {
            name: 'login'
        }
    },
    {

        path: '/',
       name: 'home',
        component: Home,
        children: [
            {
                path: '/dashboard',
                name: 'dashboard',
                component: Dashboard,
                meta: {
                    auth: true
                }
            },
        ]

    },
   /* {
        path: '/about',
        name: 'about',
        component: About,
        meta: {
            auth: undefined
        }
    },*/
    {
        path: '/register',
        name: 'register',
        component: Register,
        meta: {
            auth: false
        }
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
        meta: {
            auth: false
        }
    },
    // USER ROUTES
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard,
        meta: {
            auth: true
        }
    },
];
const router1 = new VueRouter({
    history: true,
    mode: 'history',
    routes,
});
export default router1
