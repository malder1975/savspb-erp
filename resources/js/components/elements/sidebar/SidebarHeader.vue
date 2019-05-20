<template>
    <div v-if="hasSlotDef" class="sidebar-header">
        {{ title }}
        <slot></slot>
    </div>
</template>

<script>
    export default {
        name: "SidebarHeader",
        props: {
            title: 'Центральный магазин'
        },
        computed: {
            hasSlotDef() {
                return !!!this.$slots.default;
            }
        }
    }
</script>
