<template>
    <div class="app">
        <AppHeader fixed>
            <AppNav fixedTop></AppNav>
        </AppHeader>
        <div class="app-body">
            <main class="main">

            </main>
        </div>
    </div>
</template>

<script>
    import AppHeader from '../elements/header/Header'
    import AppNav from '../elements/AppNav'
    export default {
        name: "DefaultContainer",
        components: {
            AppHeader,
            AppNav
        }
    }
</script>
