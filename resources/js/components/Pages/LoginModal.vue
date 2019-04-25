<template>
    <div id="login-modal" v-show="show" v-on:click="show = false">
        <div class="login-box">
            <a href="/login/google" v-on:click.stop="">
                <img src="/img/google-login.svg"/>
            </a>

            <a href="/login/twitter" v-on:click.stop="">
                <img src="/img/twitter-login.svg"/>
            </a>

            <a href="/login/facebook" v-on:click.stop="">
                <img src="/img/facebook-login.svg"/>
            </a>
        </div>
    </div>
</template>

<script>
    import { EventBus } from '../../event-bus.js'
    export default {
        name: "LoginModal",
        data(){
            return {
                show: false
            }
        },

        mounted(){
            EventBus.$on('prompt-login', function(){
                this.show = true;
            }.bind(this));
        }
    }
</script>

<style scoped>

</style>
