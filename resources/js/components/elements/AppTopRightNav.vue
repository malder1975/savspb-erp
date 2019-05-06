<template>
    <nav class="navbar-right nav">
        <b-nav-item id="open_right_sidebar" to="#">
            <i class="fas fa-cog"></i>
        </b-nav-item>
        <b-nav-item-dropdown class="app-drp dropdown" :no-caret="noCaret" :right="right">
            <template slot="button-content">
                <i class="fas fa-th"></i>
            </template>
            <slot name="dropdown" class="app-dropdown" data-dropdown-in="slideInRight" data-dropdown-out="fliipOutX">
                <div class="nice-scroll-bar">
                    <b-dropdown-item>Погода</b-dropdown-item>
                </div>
            </slot>
        </b-nav-item-dropdown>
        <b-nav-item-dropdown class="user-drp dropdown" :no-caret="noCaret">
            <template slot="button-content">
                <b-img width="43" height="43" rounded="circle" src="#" class="user-auth-img" />
                <span class="user-status"></span>
            </template>
        </b-nav-item-dropdown>
    </nav>
</template>

<script>
    export default {
        name: "AppTopRightNav",
        props: {
            noCaret: {
                type: Boolean,
                default: true
            },
            right: {
                type: Boolean,
                default: false
            }
        }
    }
</script>

