<template>
    <b-container>
        <b-row class="mt-3">
            <b-col md="12">
                <b-card no-body>
                    <b-tabs card>
                        <b-tab title="Поставщики" active>
                            <b-button-toolbar class="mb-3">
                                    <b-button variant="outline-primary" size="sm" class="mr-2">Добавить поставщика</b-button>
                                <b-input-group size="sm" class="ml-1">
                                    <b-form-input  placeholder="Поиск" id="search" v-model="searchSuppl"></b-form-input>
                                </b-input-group>

                                <!--span class="ml-2"> Всего поставщиков - {{ suppliers.length }}</span-->
                                <div class="float-right">
                                    <div class="btn-group btn-group-sm btn-group-toggle mx-2" data-toggle="buttons">
                                        <label class="btn btn-outline-info ">
                                            <input type="radio" name="filter" data-toggle="tooltip" title="Все" id="all" autocomplete="off" value="-1" v-model="fdel"> <i class="fas fa-hourglass"></i>
                                        </label>
                                        <label class="btn btn-outline-success active">
                                            <input type="radio" name="filter1" data-toggle="tooltip" title="Действующие" id="allw" autocomplete="off" value="0" checked v-model="fdel"> <i class="fas fa-hourglass-end"></i>
                                        </label>
                                        <label class="btn btn-outline-warning">
                                            <input type="radio" name="filter2" data-toggle="tooltip" title="Неактуальные" id="alld" autocomplete="off" value="1" v-model="fdel" > <i class="far fa-hourglass"></i>
                                        </label>
                                    </div>
                                </div>
                            </b-button-toolbar>
                            <div v-for="supplier in displayedSuppliers" :key="supplier.KLIENT_ID">

                                <b-card header-tag="header" footer-tag="footer" header-bg-variant="primary" header-text-variant="white" class="mb-4">

                                    <h4 slot="header" class="text-center">{{supplier.KLIENT_KOD}} - {{ supplier.NAME }}</h4>
                                    <h5 slot="header" class="text-center">{{supplier.ORG_NAME}}</h5>
                                    <p>{{ supplier.FDEL}}</p>
                                    <b-card-body>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p class="text-right">Товаровед: <span class="text-info">{{supplier.FSALER_NAME}}</span> </p>
                                            </div>
                                        </div>
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
                                                        <p class="recv_post">Торговая наценка: {{ (Math.round(supplier.PREMIUM) == NaN ? 0 : Math.round(supplier.PREMIUM)) }}%</p>
                                                        <p class="recv_post">Компенсация: {{ (Math.round(supplier.KOMPENS) == Nan ? 0 : Math.round(supplier.KOMPENS)) }}%</p>
                                                        <p class="recv_post">Трансп. расходы: {{ Math.round(supplier.TRANSP) == Nan ? 0 : Math.round(supplier.TRANSP) }}%</p>
                                                        <hr>
                                                        <p class="recv_post">Сумма задолженности по реализации: <span class="text-warning">0.00</span> </p>
                                                        <p class="recv_post">Сумма задолженности по графику: <span class="text-danger">0.00</span> </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </b-card-body>
                                    <div slot="footer" class="text-right">
                                        <div class="ml-auto">
                                            <router-link class="btn btn-outline-info" :to="'/supplier/${supplier.KLIENT_ID}'"></router-link>
                                            <b-button variant="outline-info" size="sm"><i class="far fa-newspaper"></i> Прайс-лист поставщика</b-button>
                                            <b-button variant="outline-success" size="sm" data-toggle="modal" data-target="#editSupplier"
                                                      @click="getEditSuppl(supplier.KLIENT_ID)"><i class="fas fa-edit"></i> Редактировать</b-button>
                                            <b-button variant="outline-danger" size="sm"><i class="fas fa-trash-alt"></i> Удалить</b-button>
                                        </div>
                                    </div>
                                </b-card>
                            </div>
                            <b-button-toolbar class="mb-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary" v-if="page != 1" @click="page--"> <i class="fas fa-angle-double-left"></i> </button>
                                <button type="button" class="btn btn-sm btn-outline-secondary" v-for="pageNumber in pages.slice(page-1, page+5)" @click="page = pageNumber"> {{pageNumber}} </button>
                                <button type="button" @click="page++" v-if="page < pages.length" class="btn btn-sm btn-outline-secondary"> <i class="fas fa-angle-double-right"></i> </button>
                            </b-button-toolbar>
                        </b-tab>
                        <b-tab title="Покупатели">
                            <b-button-toolbar class="mb-2">
                                <b-button variant="outline-primary" size="sm">Добавить покупателя</b-button>
                                <b-input-group size="sm" class="ml-1">
                                    <b-form-input  placeholder="Поиск" id="serch1"></b-form-input>
                                </b-input-group>
                            </b-button-toolbar>
                            <div v-for="customer in displayedCustomers" :key="customer.KLIENT_ID">

                                <b-card header-tag="header" footer-tag="footer" header-bg-variant="primary" header-text-variant="white" class="mb-4">

                                    <h4 slot="header" class="text-center">{{customer.KLIENT_KOD}} - {{ customer.NAME }}</h4>
                                    <h5 slot="header" class="text-center">{{customer.ORG_NAME}}</h5>
                                    <b-card-body>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img src="https://via.placeholder.com/80" alt="Лого" width="80px" height="80px"/>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <h5>Адрес поставщика</h5>
                                                        <p class="recv_post">Город: {{ customer.KL_CITY }}</p>
                                                        <p class="recv_post">Адрес: {{ customer.KL_ADR }}</p>
                                                        <p class="recv_post">Телефон: {{ customer.KL_TEL }}</p>
                                                        <p class="recv_post">Факс: {{ customer.KL_FAX }}</p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h5>Банковские реквизиты</h5>
                                                        <p class="recv_post">ИНН: {{ customer.KL_INN }}/ КПП: {{ customer.KL_KPP }}</p>
                                                        <p class="recv_post">БИК: {{ customer.KL_BIK }}</p>
                                                        <p class="recv_post">К/сч: {{ customer.KL_KS }}</p>
                                                        <p class="recv_post">Р/сч: {{ customer.KL_RS }}</p>
                                                        <p class="recv_post">Банк: {{ customer.KL_BANK }}</p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h5>Финансовая информация</h5>
                                                        <p class="recv_post">Торговая наценка: {{ customer.PREMIUM}}</p>
                                                        <p class="recv_post">Компенсация: {{customer.KOMPENS}}</p>
                                                        <p class="recv_post">Трансп. расходы: {{customer.TRANSP}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </b-card-body>
                                    <div slot="footer" class="text-right">
                                        <div class="ml-auto">
                                            <b-button variant="outline-success" data-toggle="modal" data-target="#editCustomer" size="sm">Редактировать</b-button>
                                            <b-button variant="outline-danger" size="sm">Удалить</b-button>
                                        </div>
                                    </div>
                                </b-card>
                            </div>
                            <b-button-toolbar class="mb-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary" v-if="pageCust != 1" @click="pageCust--"> << </button>
                                <button type="button" class="btn btn-sm btn-outline-secondary" v-for="pageNumber in pagesCust.slice(pageCust-1, pageCust+5)" @click="pageCust = pageNumber"> {{pageNumber}} </button>
                                <button type="button" @click="pageCust++" v-if="pageCust < pagesCust.length" class="btn btn-sm btn-outline-secondary"> >> </button>
                            </b-button-toolbar>
                        </b-tab>
                    </b-tabs>
                </b-card>


        <!-- Модальные окна: Добавить, Редактировать -->
       <!-- <div class="modal fade" id="editSupplier" tabindex="-1" role="dialog" aria-labelledby="editSupplierLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">

            </div>
        </div>-->


            </b-col>

        </b-row>
        <EditSupplier :supplier="editSuppl"></EditSupplier>
    </b-container>


</template>

<script>
    import axios from 'axios'
    import EditSupplier from './EditSupplier'
    export default {
        name: "SuppliersList",
        props: {
          //
        },
        components: {
          EditSupplier
        },
        data(){
            return {
                suppliers: [],
                customers: [],
                errors: [],
                errorsCust: [],
                searchSuppl: '',
                fdel: 0,
                page: 1,
                pageCust: 1,
                perPage: 2,
                perPageCust: 2,
                pages: [],
                pagesCust: [],
                showModal: '',
                suppliersCount: null,
                editSuppl: []
            }
        },

        methods: {
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

            getCustomers() {
              axios.get('/auth/customers').then((response) => {
                  this.customers = response.data
              }).catch((error) =>
              this.errors = error.response.data.errors || error.message);
            },

            getEditSuppl(id) {
                axios.get('/auth/supplier/' + id).then((response) => {
                    this.editSuppl = response.data
                }).catch((error) =>
                this.errors = error.response.data.errors || error.message)
            },

            setPages() {
                let numOfPages = Math.ceil(this.filteredSuppliers.length / this.perPage);
                console.log(numOfPages);
                for (let index = 1; index <= numOfPages; index++) {
                    this.pages.push(index)
                }
            },
            setPagesCust() {
              let numOfPages = Math.ceil(this.customers.length / this.perPageCust);
              for (let index = 1; index <= numOfPages; index++) {
                  this.pagesCust.push(index)
              }
            },

            paginate(suppliers) {
                let page = this.page;
                let perPage = this.perPage;
                let from = (page * perPage) - perPage;
                let to = (page * perPage);
                return suppliers.slice(from, to)
            },
            paginateCust(customers) {
                let pageCust = this.pageCust;
                let perPageCust = this.perPageCust;
                let from = (pageCust * perPageCust) - perPageCust;
                let to = (pageCust * perPageCust);
                return customers.slice(from, to)
            },

            showEdit() {
                this.showModal = 'is-active'
            }

        },
        created() {
            this.getSuppliers()
            this.getCustomers()
            //this.suppliersCount = this.countSuppliers;
        },
        mounted() {
            //
        },
        watch: {
            suppliers() {
                this.setPages()
            },
            customers() {
                this.setPagesCust()
            },

        },
        computed: {
            filteredSuppliers() {
              let klCod = this.searchSuppl;
                return this.suppliers.filter((supplier) => {
                    if (klCod === '') return true;
                else return supplier.KLIENT_KOD && supplier.KLIENT_KOD.toUpperCase().indexOf(klCod.toUpperCase()) > -1})
            },

            displayedSuppliers() {
                return this.paginate(this.filteredSuppliers)
            },
            displayedCustomers() {
                return this.paginateCust(this.customers)
            },
            countSuppliers() {
                return this.filteredSuppliers.length;
            },
        }
    }
</script>

<style>
    .fl-right {
        float: right;
    }
</style>
