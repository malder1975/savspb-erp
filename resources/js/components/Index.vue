<template>
   <div id="main">
        <header id="header">
            <Menu></Menu>
        </header>
        <div id="content">
            <router-view></router-view>
            <!--<LoginModal></LoginModal>-->
   </div>
    </div>
</template>

<script>
    import Menu from './Menu'
   // import LoginModal from "./Pages/LoginModal";
    export default {
        name: "Index",
        components: {
            //LoginModal,
            Menu
        },
        data() {
            return {
                //
            }

            //
        },
    }
</script>
