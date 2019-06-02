<template>
    <b-modal ref="editModal" v-model="showModal" id="EditSupplier" scrollable title="Scrollable Content">
        <p class="my-4" v-for="i in 20" :key="i">
            Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis
            in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
        </p>
    </b-modal>
</template>

<script>
    export default {
        name: "EditSupplier",
        props: {
            showModal: {
                type: Boolean,
                default: false
            }
        },
        data() {
            return {}
        },
       /* watch: {
            showModal(newVal) {
                if (newVal) {
                    this.$refs.editModal.show()
                } else {
                    this.$refs.editModal.hide()
                }
            }
        }*/
    }
</script>

<style scoped>

</style>