<template>
    <b-nav
        :class="classList">
        <b-navbar-brand to="/" class="navbar-brand">
            <img src="images/logo1.png" class="brand-img" alt="ДМ Нарвский">
            <span class="brand-text">ДМ Нарвский</span>
        </b-navbar-brand>
        <SidebarToggler class="d-md-down-none" display="md"></SidebarToggler>
        <b-navbar-nav class="mr-auto">
            <b-nav-item-dropdown class="px-3 dropdown" text="Справочники" :no-caret="noCaret" >

            </b-nav-item-dropdown>
        </b-navbar-nav>

        <AppTopRightNav right></AppTopRightNav>
    </b-nav>
</template>

<script>
    import AppTopRightNav from './AppTopRightNav'
    import SidebarToggler from './sidebar/SidebarToggler'
    export default {
        name: "AppNav",
        components: {
            AppTopRightNav,
            SidebarToggler
        },
        props: {
            fixedtop: {
                type: Boolean,
                default: false
            },
            fixedbottom: {
                type: Boolean,
                default: false
            },
            noCaret: {
                type: Boolean,
                default: true
            }
        },
        computed: {
            classList() {
                return [
                    'navbar',
                    'app-navbar'
                ];
            }
        },
        mounted() {
            this.isFixedTop(this.fixedtop);
            this.isFixedBottom(this.fixedbottom);
        },
        methods: {
            isFixedTop (fixedtop) {
                fixedtop ? document.body.classList.add('navbar-fixed-top') :
                    document.body.classList.remove('navbar-fixed-top');
                return fixedtop
            },
            isFixedBottom (fixedbottom) {
                fixedbottom ? document.body.classList.add('navbar-fixed-bottom') :
                    document.body.classList.remove('navbar-fixed-bottom');
                return fixedbottom
            }
        }
    }
</script>
