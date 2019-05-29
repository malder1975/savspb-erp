<template>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <b-card header-tag="header" footer-tag="footer">
                    <b-card-body>
                    <h6 slot="header">Поставщики</h6>
                <div v-for="supplier in suppliers" :key="supplier.KLIENT_ID">
                    <template v-for="(value) in supplier">
                    <b-card header-tag="header" footer-tag="footer" header-bg-variant="primary" header-text-variant="white">

                    <h4 slot="header" class="text-center">{{ value.KLIENT_KOD }} - {{ value.NAME }}</h4>
                    <b-card-body>
                        <div class="row">
                            <div class="col-md-3">
                                <img src="https://via.placeholder.com/80" alt="Лого" width="80px" height="80px"/>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h5>Адрес поставщика</h5>
                                        <p class="recv_post">Город: {{ value.KL_CITY }}</p>
                                        <p class="recv_post">Адрес: {{ value.KL_ADR }}</p>
                                        <p class="recv_post">Телефон: {{ value.KL_TEL }}</p>
                                        <p class="recv_post">Факс: {{ value.KL_FAX }}</p>
                                    </div>
                                    <div class="col-md-4">
                                       <h5>Банковские реквизиты</h5>
                                        <p class="recv_post">ИНН: {{ value.KL_INN }}/ КПП: {{ value.KL_KPP }}</p>
                                        <p class="recv_post">БИК: {{ value.KL_BIK }}</p>
                                        <p class="recv_post">К/сч: {{ value.KL_KS }}</p>
                                        <p class="recv_post">Р/сч: {{ value.KL_RS }}</p>
                                        <p class="recv_post">Банк: {{ value.KL_BANK }}</p>
                                    </div>
                                    <div class="col-md-4">

                                    </div>
                                </div>

                            </div>
                        </div>

                    </b-card-body>

                </b-card>
                    </template>
                </div>
                        <button type="button" class="btn btn-sm btn-outline-secondary" v-if="page != 1" @click="page--"> << </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary" v-for="pageNumber in pages.slice(page-1, page+5)" @click="page = pageNumber"> {{pageNumber}} </button>
                        <button type="button" @click="page++" v-if="page < pages.length" class="btn btn-sm btn-outline-secondary"> >> </button>
                    </b-card-body>
                    <div slot="footer">
                        <button type="button" class="btn btn-sm btn-outline-secondary" v-if="page != 1" @click="page--"> << </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary" v-for="pageNumber in pages.slice(page-1, page+5)" @click="page = pageNumber"> {{pageNumber}} </button>
                        <button type="button" @click="page++" v-if="page < pages.length" class="btn btn-sm btn-outline-secondary"> >> </button>
                        <!--<pagination :limit="5" :data="suppliers" @pagination-change-page="getResults"></pagination>-->
                    </div>
                </b-card>
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
                suppliers: [],
                errors: [],
                page: 1,
                perPage: 3,
                pages: [],
            }
        },

        methods: {
            getSuppliersData() {

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
            },
            setPages() {
                let numOfPages = Math.ceil(this.suppliers.result.length / this.perPage);
                console.log(numOfPages);
                for (let index = 1; index <= numOfPages; index++) {
                    this.pages.push(index)
                }
            },
            paginate(suppl) {
                let page = this.page;
                let perPage = this.perPage;
                let from_ = (page * perPage) - perPage;
                let to_ = (page * perPage);
                return suppl.slice(from_, to_)
            },
        },
        created() {
            this.getSuppliers()
        },
        mounted() {
            //
        },
        watch: {
            suppliers() {
                this.setPages()
            }
        },
        computed: {
            displayedSuppliers() {
                return this.paginate(this.suppliers.result)
            }
        }
    }
</script>
