<template>
    <div class="app">
        <AppHeader fixed>
            <AppNav fixedTop></AppNav>
        </AppHeader>
        <div class="app-body">
            <Sidebar fixed>
                <SidebarNav :nav-items="nav"></SidebarNav>
            </Sidebar>
            <main class="main">

            </main>
        </div>
    </div>
</template>

<script>
    import AppHeader from '../elements/header/Header'
    import AppNav from '../elements/AppNav'
    import Sidebar from '../elements/sidebar/Sidebar'
    import SidebarHeader from '../elements/sidebar/SidebarHeader'
    import SidebarNav from '../elements/sidebar/SidebarNav'

    export default {
        name: "DefaultContainer",
        components: {
            AppHeader,
            AppNav,
            Sidebar,
            SidebarHeader,
            SidebarNav
        },
        data() {
            return {
                nav: nav.items
            }
        }
    }
</script>
