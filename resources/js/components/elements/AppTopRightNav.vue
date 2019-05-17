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
                <b-img width="43" height="43" rounded="circle" :src="user.avatar_url ? '/images/avatars/user1.png' : '/images/avatars/user1.png'" class="user-auth-img" />
                <span class="user-status"></span>
            </template>
            <slot name="dropdown" class="app-dropdown">
                <div :style="{ right: 'auto', height: '200px' }">
                    <span class="text-center" v-if="$auth.check()">{{ user.PERS_NAME  }}</span>
                </div>
                <b-dropdown-item v-if="$auth.check()" @click.prevent="$auth.logout()" href="#">
                    Выход
                </b-dropdown-item>
            </slot>
        </b-nav-item-dropdown>
        <HeaderDropdown></HeaderDropdown>
    </nav>
</template>

<script>
    import EventBus from '../EventBus'
    import HeaderDropdown from './header/HeaderDropdown'
    export default {
        name: "AppTopRightNav",
        components: {
            HeaderDropdown
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

