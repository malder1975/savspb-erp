<template>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <ul>
                    <li v-for="object in suppliers">{{ object.NAME }}</li>
                </ul>
                <b-card header-tag="header" footer-tag="footer" v-for="supplier in suppliers" :key="supplier.id">
                    <h6 slot="header">{{ supplier.NAME }}</h6>
                    <b-card-body>
                        {{ supplier.KLIENT_KOD }}
                    </b-card-body>
                </b-card>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SuppliersList",
        data() {
            return {
                suppliers: {
                    KLIENT_KOD: '',
                    NAME: ''
                },
                errors: {}
            }
        },
        mounted() {
            let app = this;
            axios.post('/auth/suppliers')
                .then((response) =>
                    app.suppliers = response.data
                    )
                .catch((error) =>
                    this.errors = error.response.data.errors || error.message
                    );
            alert('Не могу показать поставщиков. Ошибка: '. error)
        }
    }
</script>
