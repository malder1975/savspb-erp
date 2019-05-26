<template>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <VueTable ref="vuetable" :data-manager="getSuppliers()" data-path="data" :fields="['KLIENT_KOD', 'NAME', 'KL_ADR']"></VueTable>
                <ul>
                    <li v-for="(supplier) in suppliers" :key="supplier.KLIENT_ID">{{ supplier.NAME }}</li>
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
    import VueTable from 'vuetable-2/src/components/Vuetable'
    export default {
        name: "SuppliersList",
        components: {VueTable},
        data() {
            return {
                suppliers: [],
                KLIENT_KOD: '',
                NAME: '',
                errors: []
            }
        },
        mounted() {
            this.getSuppliers()
        },
        methods: {
            getSuppliers: function() {
                //let app = this;
                axios.get('/auth/suppliers').then((response) => {
                        console.log(response)
                        this.suppliers = response.data
                        }
                    )
                    .catch((error) =>
                        this.errors = error.response.data.errors || error.message
                    );
               // alert('Не могу показать поставщиков. Ошибка: '.error)
            }
        }
    }
</script>
