<template>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">

                <ul v-if="suppliers && suppliers.length">
                    <li v-for="(index, supplier) of suppliers" :key="index">{{ supplier.NAME }}</li>
                </ul>
                <!--<b-card header-tag="header" footer-tag="footer" v-for="supplier in suppliers" :key="supplier.KLIENT_ID">
                    <h6 slot="header">{{ supplier.NAME }}</h6>
                    <b-card-body>
                        {{ supplier.KLIENT_KOD }}
                    </b-card-body>
                </b-card>-->
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: "SuppliersList",

        data: () => ({
                suppliers: [],
                errors: []
        }),
        created() {
            //
        },
        mounted() {
            this.getSuppliers()
        },
        methods: {
            getSuppliers() {
                //let app = this;
                axios.get('/auth/suppliers').then((response) => {

                        this.suppliers = response.data
                        }
                    ).catch((error) =>
                        this.errors = error.response.data.errors || error.message
                    );
               // alert('Не могу показать поставщиков. Ошибка: '.error)
            }
        }
    }
</script>
