<template>
    <b-modal ref="editModal" id="EditSupplier" size="lg" scrollable centered title="Редактирование поставщика">

        <div slot="modal-footer" class="w-100">
            <div class="float-right">
                <b-button variant="outline-success" size="sm">Сохранить</b-button>
                <b-button variant="outline-info" size="sm" @click="toggleModal">Отмена</b-button>
            </div>
        </div>
    </b-modal>
</template>

<script>
    export default {
        name: "EditSupplier",
        props: {
            //
        },
        data() {
            return {}
        },
        methods: {
            toggleModal() {
                this.$bvModal.hide('EditSupplier')
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