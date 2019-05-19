<template>
    <nav class="navbar-right nav">
        <b-nav-item id="open_right_sidebar" to="#">
            <i class="fas fa-cog"></i>
        </b-nav-item>
        <b-nav-item-dropdown class="app-drp dropdown" :no-caret="noCaret" :right="right">
            <template slot="button-content">
                <i class="fas fa-th"></i>
            </template>
            <slot name="dropdown" class="app-dropdown" data-dropdown-in="slideInRight" data-dropdown-out="flipOutX">
                <div class="nice-scroll-bar">
                    <b-dropdown-item>Погода</b-dropdown-item>
                </div>
            </slot>
        </b-nav-item-dropdown>
        <b-nav-item-dropdown class="user-drp dropdown" :no-caret="noCaret" right>
            <template slot="button-content">
                <b-img width="43" height="43" rounded="circle" :src="user.avatar_url ? '/images/avatars/user1.png' : '/images/avatars/user1.png'" alt="Мини аватар" class="user-auth-img" />
                <span class="user-status"></span>
            </template>
            <slot name="dropdown" class="app-dropdown">
                <div class="dropdown-profile">
                    <b-dropdown-header class="user-header">
                        <b-img rounded="circle" :src="user.avatar_url ? '/images/avatars/user1.png' : '/images/avatars/user1.png'" alt="Аватар пользователя" />
                        <p class="text-center" v-if="$auth.check()">{{ user.PERS_NAME  }}</p>
                    </b-dropdown-header>
                </div>
                <b-dropdown-item @click.prevent="user.profile()" href="#">
                   <i class="far fa-user menu-icon"></i> Мой профиль
                </b-dropdown-item>
                <b-dropdown-item @click.prevent="user.accsettins()" href="#">
                    <i class="fas fa-cog"></i> Настройки профиля
                </b-dropdown-item>
                <b-dropdown-divider></b-dropdown-divider>
               <b-dropdown-item class="dropdown-footer" v-if="$auth.check()" @click.prevent="user.lockscr">
                  <i class="fas fa-lock"></i> Заблокировать экран
               </b-dropdown-item>
                <b-dropdown-item v-if="$auth.check()" @click.prevent="$auth.logout()" href="#">
                    <i class="fas fa-sign-out-alt"></i>  Выход
                </b-dropdown-item>
            </slot>
        </b-nav-item-dropdown>
    </nav>
</template>

<script>
    import EventBus from '../EventBus'
    //import HeaderDropdown from './header/HeaderDropdown'
    export default {
        name: "AppTopRightNav",
        components: {
            //HeaderDropdown
        },
        props: {
            noCaret: {
                type: Boolean,
                default: true
            },
            right: {
                type: Boolean,
                default: false
            },
        },


        data() {
            return {
                user: {
                    PERSONAL_ID: '',
                    LOGIN: '',
                    PERS_NAME: '',
                    email: '',
                    avatar_url: ''
                }
            }
        },
        computed: {



        },
        created() {
            this.fetchUser()
            this.user = this.$auth.user
        },
        mounted() {
            //
        },
        methods: {
            fetchUser() {
                this.error = this.user = null
                axios.get('/user')
                    .then(response => {
                        this.user = response.data
                    }).catch(error =>
                    this.error = error.response.data.message || error.message)
            }
        }

    }
</script>

