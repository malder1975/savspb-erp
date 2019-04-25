<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <router-link :to="{name: 'home'}" class="navbar-brand">Laravel + JWT + Vue JS</router-link>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto" v-if="$auth.check(1)">
                <li class="nav-item" v-for="(route, key) in routes.user" v-bind:key="route.path">
                    <router-link :to="{ name : route.path }" :key="key" class="nav-link">{{route.name}}</router-link>
                </li>
            </ul>
            <ul class="navbar-nav mr-auto" v-if="$auth.check(2)">
                <li class="nav-item" v-for="(route, key) in routes.user" v-bind:key="route.path">
                    <router-link :to="{ name : route.path }" :key="key" class="nav-link">{{route.name}}</router-link>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto" v-if="!$auth.check()">
                <li class="nav-item" v-for="(route, key) in routes.unlogged" v-bind:key="route.path">
                    <router-link :to="{ name : route.path }" :key="key" class="nav-link">{{route.name}}</router-link>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto" v-if="$auth.check()">
                <li class="nav-item">
                    <a class="nav-link" href="#" @click.prevent="$auth.logout()">Выход</a>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
    export default {
        name: 'Menu',
        data() {
            return {
                routes: {
                    // UNLOGGED
                    unlogged: [
                        { name: 'Регистрация', path: 'register' },
                        { name: 'Вход', path: 'login'}
                    ],
                    // LOGGED USER
                    user: [
                        { name: 'Home', path: 'home' }
                    ]
                }
            }
        },
        mounted() {
            //
        }
    }
</script>

<style scoped>
    .navbar {
        margin-bottom: 30px;
    }
</style>
