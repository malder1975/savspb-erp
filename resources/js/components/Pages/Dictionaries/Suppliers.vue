<template>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <div v-for="supplier in suppliers" :key="supplier.KLIENT_ID">
                    <template v-for="(value) in supplier">
                    <b-card header-tag="header" footer-tag="footer" header-bg-variant="primary" header-text-variant="white" align="center">

                    <h4 slot="header">{{ value.KLIENT_KOD }}</h4>
                    <b-card-body>
                        {{ value.NAME }}
                    </b-card-body>

                </b-card>
                    </template>
                </div>

                <div v-for="supplier in suppliers" :key="supplier.KLIENT_ID">
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
                suppliers: [

                ],

            supplier: [],
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
                    console.log(response.data)
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
