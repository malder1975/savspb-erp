<template>
   <div id="main">
    <router-view></router-view>
   </div>
</template>

<script>
    export default {
        name: "App",
        components: {
            //
        },
        data() {
            return {
                user: null
            }
        },
        methods: {
            //

        }
    }
</script>

<style lang="scss">
  $fa-font-path: '~@fortawesome/fontawesome-free/webfonts/';
    @import "~@fortawesome/fontawesome-free/scss/fontawesome.scss";
    @import "~@fortawesome/fontawesome-free/css/all.css";
    @import "../../sass/style.scss";
    @import "~vue-material-design-icons/styles.css";
</style>
