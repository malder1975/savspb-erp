<template>
    <div class="app">
        <AppHeader fixed>
            <AppNav fixedtop></AppNav>
        </AppHeader>
        <div class="app-body">
            <Sidebar fixed>
                <!--<SidebarNav ></SidebarNav>-->
                <SidebarFooter></SidebarFooter>
                <SidebarMinimizer></SidebarMinimizer>
            </Sidebar>
            <main class="main">
<!--                <Breadcrumb :list="list"/>-->
                <div class="container-fluid">
                    <router-view></router-view>
                </div>

            </main>
        </div>
    </div>
</template>

<script>
    import nav from '../../_nav'
    import AppHeader from '../elements/header/Header'
    import AppNav from '../elements/AppNav'
    import Sidebar from '../elements/sidebar/Sidebar'
    import SidebarHeader from '../elements/sidebar/SidebarHeader'
    import SidebarNav from '../elements/sidebar/SidebarNav'
    import SidebarFooter from "../elements/sidebar/SidebarFooter";
    import SidebarMinimizer from "../elements/sidebar/SidebarMinimizer";
    import Breadcrumb from "../elements/Breadcrumb/Breadcrumb";

    export default {
        name: "DefaultContainer",
        components: {
            Breadcrumb,
            SidebarMinimizer,
            SidebarFooter,
            AppHeader,
            AppNav,
            Sidebar,
            SidebarHeader,
            SidebarNav,
        },
        data() {
            return {
                nav: nav.items
            }
        },
        computed: {
            name() {
                return this.$route.name
            },
            list() {
                return this.$route.matched.filter((route) => route.name || route.meta.label)
            }
        }
    }
</script>
