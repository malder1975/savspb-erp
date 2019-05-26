<template>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <ul>
                    <li v-for="(result) in suppliers">{{ result.KLIENT_KOD }}</li>
                </ul>
                <b-card header-tag="header" footer-tag="footer" v-for="(result) in suppliers" :key="result.KLIENT_ID" :name="result.NAME" :kode="result.KLIENT_KOD">
                    <h6 slot="header">{{ result.NAME }}</h6>
                    <b-card-body>
                        {{ result.KLIENT_KOD }}
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
                 suppliers: null,



                    // KLIENT_KOD: '',
                    // NAME: '',

              //  errors: []
            }
        },
        mounted() {

            //alert('Не могу показать поставщиков. Ошибка: '. error)
        },
        created() {
            this.getSuppliers()
           // console.log(suppliers)
        },
        methods: {
            getSuppliers () {
                let app = this;
                axios.get('/auth/suppliers')
                    .then((response) =>
                        app.suppliers = response.data
                    )
                    .catch((error) =>
                        this.errors = error.response.data.errors || error.message
                    );
            }
        }
    }
</script>
