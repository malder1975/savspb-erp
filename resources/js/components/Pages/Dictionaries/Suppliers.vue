<template>
    <div>
        <b-table striped hover :suppliers="suppliers"></b-table>
    </div>
</template>

<script>
    export default {
        name: "SuppliersList",
        data() {
            return {
                suppliers: [],
                errors: []
            }
        },
        mounted() {
            let app = this
            axios.post('/auth/suppliers')
                .then((response) => {
                    app.suppliers = response.data
                    })
                .catch((error) => {
                    this.errors = error.response.data.errors || error.message
                    })
            alert('Не могу показать поставщиков. Ошибка: '. error)
        }
    }
</script>
