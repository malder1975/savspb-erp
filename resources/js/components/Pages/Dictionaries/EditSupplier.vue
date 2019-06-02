<template>
    <b-modal ref="editModal" v-model="showModal" id="EditSupplier" scrollable centered title="Редактирование поставщика">
        <p class="my-4" v-for="i in 5" :key="i">
            Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis
            in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.
        </p>
        <div slot="modal-footer" class="w-100">
            <div class="float-right">
                <b-button variant="success" size="sm">Сохранить</b-button>
                <b-button variant="info" size="sm" @click="toggleModal">Отмена</b-button>
            </div>
        </div>
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
        methods: {
            toggleModal() {
                showModal = false
            }
        }
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