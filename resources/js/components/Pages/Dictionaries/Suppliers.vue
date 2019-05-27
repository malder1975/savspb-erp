<template>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <b-card header-tag="header" footer-tag="footer">
                    <b-card-body>
                    <h6 slot="header">Поставщики</h6>
                <div v-for="supplier in suppliers" :key="supplier.KLIENT_ID">
                    <template v-for="(value) in supplier">
                    <b-card header-tag="header" footer-tag="footer" header-bg-variant="primary" header-text-variant="white" align="center">

                    <h6 slot="header">{{ value.KLIENT_KOD }} - {{ value.NAME }}</h6>
                    <b-card-body>
                        {{ value.NAME }}
                    </b-card-body>

                </b-card>
                    </template>
                </div>
                    </b-card-body>
                    <div slot="footer">
                        <pagination :limit="3" :data="suppliers" @pagination-change-page="getResults"></pagination>
                    </div>

                </b-card>

                <!--<div v-for="supplier in suppliers" :key="supplier.KLIENT_ID">
                    <template v-for="(index, value) in supplier"  :index="index">
                        <h5>{{value}}</h5>
                        <p>{{index.NAME}}</p>
                    </template>
                </div>
               <ul  v-for="supplier in suppliers" :key="supplier.KLIENT_ID">
                    //
                   <template v-for="(key, index, value) in supplier"  :index="index">
                        <li> {{ key }} , {{ index }}, {{ value }}</li>
                    </template>
                </ul>

                <ul >

                        <li v-for="supplier in suppliers">
                            <p>{{ supplier.NAME }}</p>
                        </li>

                </ul>-->

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

        data(){
            return {
                suppliers: {},
                errors: []
            }
        },
        created() {
            this.getResults()
        },
        mounted() {
            this.getSuppliers()

        },
        methods: {
            getResults(page) {
                if (typeof page === 'undefined') {
                    page = 1
                }

                axios.get('/auth/suppliers?page=' + page)
                    .then((response) => {
                        this.suppliers = response.data
                    })
            },
            getSuppliers() {
                //let app = this;
                axios.get('/auth/suppliers').then(({ data }) => (
                    //console.log(response.data)
                        this.suppliers = data
                    )).catch((error) =>
                        this.errors = error.response.data.errors || error.message
                    );
               // alert('Не могу показать поставщиков. Ошибка: '.error)
            }
        }
    }
</script>
