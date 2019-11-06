<template>
    <b-link
        :display="display"
        :mobile="mobile"
        :class="classList"
        @click="NavbarToggle">
        <span class="navbar-toggler-icon fas fa-bars"></span>
    </b-link>
</template>

<script>
    import toggleClasses from '../../sidebar/toggle-classes.js'
    import {navbarCssClasses, validBreakpoints, checkBreakpoint} from '../../navbar/appNavbarClasses'
    export default {
        name: "AppNavToggler",
        props: {
            defaultOpen: {
                type: Boolean,
                default: true
            },
            display: {
                type: String,
                default: 'lg'
            },
            mobile: {
                type: Boolean,
                default: false
            }
        },
        computed: {
            classList() {
                return [
                    'inline-block'
                ]
            }
        },
        mounted() {
            this.toggle(this.defaultOpen)
        },
        methods: {
            toggle(force) {
                const [display, mobile] = [this.display, this.mobile];
                let cssClass = navbarCssClasses[0];
                if (!mobile && display && checkBreakpoint(display, validBreakpoints)) {
                    cssClass = 'sidebar-${display}-show'
                }
                toggleClasses(cssClass, navbarCssClasses, force)
            },
            NavbarToggle(e) {
                e.preventDefault()
                e.stopPropagation()
                thi.toggle()
            }
        }
    }
</script>

<style scoped>

</style>
