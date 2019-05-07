import bearer from '@websanova/vue-auth/drivers/auth/bearer'
import axios from '@websanova/vue-auth/drivers/http/axios.1.x'
import router from '@websanova/vue-auth/drivers/router/vue-router.2.x'

const config = {
    auth: bearer,
    http: axios,
    router: router,
    tokenDefaultName: 'Authorization',
    tokenStore: ['localStorage'],
    rolesVar: 'LEVELS_ID',

    // API endpoints used in Vue Auth.
    registerData: {
        url: 'auth/register',
        method: 'POST',
        redirect: '/login'
    },
    loginData: {
        url: 'auth/login',
        method: 'POST',
        redirect: '',
        fetchUser: true
    },
    logoutData: {
        url: 'auth/logout',
        method: 'POST',
        redirect: '/login',
        makeRequest: true
    },
    fetchData: {
        url: 'user',
        method: 'GET',
        enabled: true
    },
    refreshData: {
        url: 'auth/refresh',
        method: 'GET',
        enabled: true,
        interval: 30
    }
};

export default config
  /*  user: {
        authenticated: false,
        profile: null
    },
    check() {
        if (localStorage.getItem('token') !== null) {
            Vue.http.get(
                'user',
            ).then(response => {
                this.user.authenticated = true,
                    this.user.profile = response.data.data
            })
        }
    }*/

