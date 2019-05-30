<template>
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <b-card no-body>
                    <b-tabs card>
                        <b-tab title="Поставщики" active>
                            <b-button-toolbar class="mb-2">
                                    <b-button variant="outline-primary" size="sm">Добавить поставщика</b-button>
                                <b-input-group size="sm" class="ml-1">
                                    <b-form-input  placeholder="Поиск" id="serch"></b-form-input>
                                </b-input-group>
                            </b-button-toolbar>
                            <div v-for="supplier in displayedSuppliers" :key="supplier.KLIENT_ID">

                                <b-card header-tag="header" footer-tag="footer" header-bg-variant="primary" header-text-variant="white" class="mb-4">

                                    <h4 slot="header" class="text-center">{{supplier.KLIENT_KOD}} - {{ supplier.NAME }}</h4>
                                    <h5 slot="header" class="text-center">{{supplier.ORG_NAME}}</h5>
                                    <b-card-body>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img src="https://via.placeholder.com/80" alt="Лого" width="80px" height="80px"/>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h5>Адрес поставщика</h5>
                                                        <p class="recv_post">Город: {{ supplier.KL_CITY }}</p>
                                                        <p class="recv_post">Адрес: {{ supplier.KL_ADR }}</p>
                                                        <p class="recv_post">Телефон: {{ supplier.KL_TEL }}</p>
                                                        <p class="recv_post">Факс: {{ supplier.KL_FAX }}</p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h5>Банковские реквизиты</h5>
                                                        <p class="recv_post">ИНН: {{ supplier.KL_INN }}/ КПП: {{ supplier.KL_KPP }}</p>
                                                        <p class="recv_post">БИК: {{ supplier.KL_BIK }}</p>
                                                        <p class="recv_post">К/сч: {{ supplier.KL_KS }}</p>
                                                        <p class="recv_post">Р/сч: {{ supplier.KL_RS }}</p>
                                                        <p class="recv_post">Банк: {{ supplier.KL_BANK }}</p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h5>Финансовая информация</h5>
                                                        <p class="recv_post">Торговая наценка: {{ supplier.PREMIUM}}</p>
                                                        <p class="recv_post">Компенсация: {{supplier.KOMPENS}}</p>
                                                        <p class="recv_post">Трансп. расходы: {{supplier.TRANSP}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </b-card-body>
                                    <div slot="footer" class="text-right">
                                        <div class="ml-auto">
                                            <b-button variant="outline-success" data-toggle="modal" data-target="#editSupplier" size="sm">Редактировать</b-button>
                                            <b-button variant="outline-danger" size="sm">Удалить</b-button>
                                        </div>
                                    </div>
                                </b-card>
                            </div>
                            <b-button-toolbar class="mb-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary" v-if="page != 1" @click="page--"> << </button>
                                <button type="button" class="btn btn-sm btn-outline-secondary" v-for="pageNumber in pages.slice(page-1, page+5)" @click="page = pageNumber"> {{pageNumber}} </button>
                                <button type="button" @click="page++" v-if="page < pages.length" class="btn btn-sm btn-outline-secondary"> >> </button>
                            </b-button-toolbar>
                        </b-tab>
                        <b-tab title="Покупатели">
                            <b-button-toolbar class="mb-2">
                                <b-button variant="outline-primary" size="sm">Добавить покупателя</b-button>
                                <b-input-group size="sm" class="ml-1">
                                    <b-form-input  placeholder="Поиск" id="serch1"></b-form-input>
                                </b-input-group>
                            </b-button-toolbar>
                            <b-button-toolbar class="mb-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary" v-if="page != 1" @click="page--"> << </button>
                                <button type="button" class="btn btn-sm btn-outline-secondary" v-for="pageNumber in pages.slice(page-1, page+5)" @click="page = pageNumber"> {{pageNumber}} </button>
                                <button type="button" @click="page++" v-if="page < pages.length" class="btn btn-sm btn-outline-secondary"> >> </button>
                            </b-button-toolbar>
                        </b-tab>
                    </b-tabs>
                </b-card>
                <!--<b-card header-tag="header" footer-tag="footer">
                    <h4 slot="header">Поставщики</h4>
                    <div slot="header" class="text-right">
                        <b-button variant="outline-primary" >Добавить поставщика</b-button>
                    </div>
                    <b-card-body>
                <div v-for="supplier in displayedSuppliers" :key="supplier.KLIENT_ID">

                    <b-card header-tag="header" footer-tag="footer" header-bg-variant="primary" header-text-variant="white" class="mb-4">

                    <h4 slot="header" class="text-center">{{supplier.KLIENT_KOD}} - {{ supplier.NAME }}</h4>
                        <h5 slot="header" class="text-center">{{supplier.ORG_NAME}}</h5>
                    <b-card-body>
                        <div class="row">
                            <div class="col-md-3">
                                <img src="https://via.placeholder.com/80" alt="Лого" width="80px" height="80px"/>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h5>Адрес поставщика</h5>
                                        <p class="recv_post">Город: {{ supplier.KL_CITY }}</p>
                                        <p class="recv_post">Адрес: {{ supplier.KL_ADR }}</p>
                                        <p class="recv_post">Телефон: {{ supplier.KL_TEL }}</p>
                                        <p class="recv_post">Факс: {{ supplier.KL_FAX }}</p>
                                    </div>
                                    <div class="col-md-4">
                                       <h5>Банковские реквизиты</h5>
                                        <p class="recv_post">ИНН: {{ supplier.KL_INN }}/ КПП: {{ supplier.KL_KPP }}</p>
                                        <p class="recv_post">БИК: {{ supplier.KL_BIK }}</p>
                                        <p class="recv_post">К/сч: {{ supplier.KL_KS }}</p>
                                        <p class="recv_post">Р/сч: {{ supplier.KL_RS }}</p>
                                        <p class="recv_post">Банк: {{ supplier.KL_BANK }}</p>
                                    </div>
                                    <div class="col-md-4">
                                        <h5>Финансовая информация</h5>
                                        <p class="recv_post">Торговая наценка: {{ supplier.PREMIUM}}</p>
                                        <p class="recv_post">Компенсация: {{supplier.KOMPENS}}</p>
                                        <p class="recv_post">Трансп. расходы: {{supplier.TRANSP}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </b-card-body>
                        <div slot="footer" class="text-right">
                            <div class="ml-auto">
                                <b-button variant="outline-success" data-toggle="modal" data-target="#editSupplier">Редактировать</b-button>
                                <b-button variant="outline-danger">Удалить</b-button>
                            </div>
                        </div>
                </b-card>
                </div>
                    </b-card-body>
                    <div slot="footer">
&lt;!&ndash;                        <button type="button" class="btn btn-sm btn-outline-secondary" v-if="page = 1" disabled>Первая</button>&ndash;&gt;
&lt;!&ndash;                        <button type="button" class="btn btn-sm btn-outline-secondary" v-else="page != 1" enabled @click="page = 1">Первая</button>&ndash;&gt;
                        <button type="button" class="btn btn-sm btn-outline-secondary" v-if="page != 1" @click="page&#45;&#45;"> << </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary" v-for="pageNumber in pages.slice(page-1, page+5)" @click="page = pageNumber"> {{pageNumber}} </button>
                        <button type="button" @click="page++" v-if="page < pages.length" class="btn btn-sm btn-outline-secondary"> >> </button>
&lt;!&ndash;                        <button type="button" @click="pages.length" v-if="page = pages.length" disabled class="btn btn-sm btn-outline-secondary">Последняя</button>&ndash;&gt;
                        &lt;!&ndash;<pagination :limit="5" :data="suppliers" @pagination-change-page="getResults"></pagination>&ndash;&gt;
                    </div>
                </b-card>
            </div>-->


        <!-- Модальные окна: Добавить, Редактировать -->
        <div class="modal fade" id="editSupplier" tabindex="-1" role="dialog" aria-labelledby="editSupplierLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">

            </div>
        </div>
            </div>

        </div>
    </div>

</template>

<script>
    import axios from 'axios'
    export default {
        name: "SuppliersList",
        props: {
          showModal: {
              type: Boolean,
              default: false
          }
        },
        data(){
            return {
                suppliers: [],
                errors: [],
                page: 1,
                perPage: 2,
                pages: [],
            }
        },

        methods: {
            getSuppliersData() {

            },
            getSuppliers() {
                //let app = this;
                axios.get('/auth/suppliers').then((response) => (
                    //console.log(response.data)
                        this.suppliers = response.data
                    )).catch((error) =>
                        this.errors = error.response.data.errors || error.message
                    );
               // alert('Не могу показать поставщиков. Ошибка: '.error)
            },
            setPages() {
                let numOfPages = Math.ceil(this.suppliers.length / this.perPage);
                console.log(numOfPages);
                for (let index = 1; index <= numOfPages; index++) {
                    this.pages.push(index)
                }
            },
            paginate(suppliers) {
                let page = this.page;
                let perPage = this.perPage;
                let from = (page * perPage) - perPage;
                let to = (page * perPage);
                return suppliers.slice(from, to)
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
                return this.paginate(this.suppliers)
            }
        }
    }
</script>
