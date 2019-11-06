<template>
    <button class="sidebar-minimizer" type="button" @click="onClick()"></button>
</template>

<script>
    import { togglePs } from "../../../sidebar/mixins/togglePs";

    export default {
        name: "SidebarMinimizer",
        mixins: [ togglePs ],
        mounted() {
            const isMinimized = document.body.classList.contains('sidebar-minimized')
            this.togglePs(!isMinimized)
        },
        methods: {
            onClick() {
                this.sidebarMinimize()
                this.brandMinimize()
            },
            sidebarMinimize() {
                const isMinimized = document.body.classList.toggle('sidebar-minimized')
                this.$emit('vr-sidebar-minimize', isMinimized)
                this.togglePs(!isMinimized)
                //document.querySelector('.sidebar-nav section').classList.toggle('ps')
            },
            brandMinimize() {
                document.body.classList.toggle('brand-minimized')
            }
        }
    }
</script>
