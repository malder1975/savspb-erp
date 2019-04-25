<template>
   <div id="main">
    <router-view></router-view>
   </div>
</template>

<script>
    export default {
        name: "App",
        components: {

        }
    }
</script>

<style lang="scss">
  $fa-font-path: '~@fortawesome/fontawesome-free/webfonts/';
    @import "~@fortawesome/fontawesome-free/scss/fontawesome.scss";
    @import "../../sass/style.scss";
</style>
