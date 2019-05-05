<template>
    <nav
        :class="classList">
        <b-navbar-brand to="/" class="navbar-brand">
            <img src="images/logo1.png" class="brand-img" alt="ДМ Нарвский">
            <span class="brand-text">ДМ Нарвский</span>
        </b-navbar-brand>
        <SidebarToggler class="bv-d-md-down-none" display="lg"></SidebarToggler>
        <AppTopRightNav right></AppTopRightNav>
    </nav>
</template>

<script>
    import AppTopRightNav from './AppTopRightNav'
    export default {
        name: "AppNav",
        components: {
            AppTopRightNav
        },
        props: {
            fixedtop: {
                type: Boolean,
                default: false
            },
            fixedbottom: {
                type: Boolean,
                default: false
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
