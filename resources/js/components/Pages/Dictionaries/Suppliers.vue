<template>
    <div>
        <b-table striped hover :items="items"></b-table>
    </div>
</template>

<script>
    export default {
        name: "SuppliersList",
        data() {
            return {
                suppliers: []
            }
        }
    }
</script>

<style scoped>

</style>
