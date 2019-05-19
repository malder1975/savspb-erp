<template>
    <button
        :display="display"
        :mobile="mobile"
        :class="classList"
        @click="SidebarToggle">
        <span class="navbar-toggler-icon fas fa-bars"></span>
    </button>
</template>

<script>
    export default {
        name: "SidebarToggler",
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
                    'navbar-toggler'
                ]
            }
        },
        mounted() {
            this.toggle(this.defaultOpen)
        },
        methods: {
            toggle(force) {
                const [display, mobile] = [this.display, this.mobile];
                let cssClass = sidebarCssClasses[0];
                if (!mobile && display && checkBreakpoint(display, validBreakpoints)) {
                    cssClass = 'sidebar-${display}-show'
                }
                toggleClasses(cssClass, sidebarCssClasses, force)
            },
            SidebarToggle(e) {
                e.preventDefault()
                e.stopPropagation()
                this.toggle()
            }
        }
    }
</script>

