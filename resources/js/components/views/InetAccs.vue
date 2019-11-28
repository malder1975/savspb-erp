<template>
    <div class="animated fade-in">
        <b-container>
            <b-row>
                <vue-bootstrap4-table :rows="rows" :columns="columns" :config="config" :actions="actions" @on-change-query="onChangeQuery"
                                      :total-rows="rows.length">
                    <template slot="refresh-button-text">
                        <i class="fas fa-sync-alt"></i> Обновить
                    </template>
                    <template slot="reset-button-text">
                        <i class="fas fa-broom"></i> Сбросить
                    </template>
                </vue-bootstrap4-table>
            </b-row>
        </b-container>
    </div>
</template>

<script>

    import VueBootstrap4Table from 'vue-bootstrap4-table'
    import FieldsDef from '../../fielddefs/netpayacc.js'
    import _ from 'lodash'
    import moment from 'moment'
    import axios from 'axios'
    import accounting from 'accounting'
    export default {
        name: "InetAccs",
        components: {
             VueBootstrap4Table,
        },
        data(){
            return {
                rows: [],
                columns: [
                    {
                        label: '№ заказа',
                        name: 'NUM',
                        sort: true,
                    },
                    {
                        label: 'Дата',
                        name: 'DAT',
                        sort: true
                    },
                    {
                        label: 'ФИО покупателя',
                        name: 'BUYER_NAME',
                        sort: true
                    },
                    {
                        label: 'Сумма заказа',
                        name: 'S_GOOD'
                    },
                    {
                        label: 'Сумма оплаты',
                        name: 'S_OPL'
                    },
                    {
                        label: 'Статус',
                        name: 'FSTATE',
                        sort: true,
                        initial_sort: true,
                        initial_sort_order: 'ASC'
                    }
                ],
                classes: {
                  cell: {
                      "my-cell my-cell2" : true,
                      "text-danger" : function(row,column,cellValue) {
                          return column.name == "FSTATE" && cellValue == 0
                      }
                  }
                },
                actions: [
                    {
                        btn_text: 'Изменить',
                        class: "btn btn-secondary my-custom-class",
                    },
                    {
                        btn_text: 'Новый заказ',
                        class: "btn btn-primary my-custom-class",
                    },
                    {
                        btn_text: 'Отменить заказ'
                    }
                ],
                config: {
                    server_mode: false,
                    show_Loader: true,
                    pagination_info: false,
                    num_of_visibile_pagination_buttons: 7,
                    page: 1,
                    per_page: 10,
                    selected_rows_info: true,
                    checkbox_rows: true,
                    rows_selectable: true,
                    preservePageOnDataChange: true

                },
                queryParams: {
                    sort: [],
                    filters: [],
                    global_search: "",
                    page: 1,
                    per_page: 10
                },
                total_rows: 0,
                fields: FieldsDef,
                page: 1,
                per_page: 10,
                perPage: 10,
                data: [],
                mydata: [],
                sortOrder: [
                    {
                        field: 'FSTATE',
                        direction: 'ASC'
                    }
                ]
            }
        },
        watch: {
            /*data(newVal, oldVal) {
                this.$refs.vuetable.refresh()
            }*/
        },
        methods: {
            onPaginationData(paginationData) {
                this.$refs.paginationTop.setPaginationData(paginationData);
                this.$refs.paginationInfoTop.setPaginationData(paginationData);

                this.$refs.pagination.setPaginationData(paginationData);
                this.$refs.paginationInfo.setPaginationData(paginationData);
            },
            onChangePage(page) {
                this.$refs.vuetable.changePage(page);
            },

            onActionClicked(action, data) {
                console.log("slot actions: on-click", data.name);
            },
            formatDate(value, fmt = 'DD.MM.YYYY') {
                return (value == null) ? '' : moment(value, 'YYYY-MM-DD').format(fmt)
            },

            zakazState(value) {
                return value === 0 ? '<span class="badge badge-primary">Новый заказ</span>' : '<span class="badge badge-success">Реализован</span>'
            },

            formatNumber(value) {
                return accounting.formatMoney(value,2)
            },

            onChangeQuery(queryParams) {
                this.queryParams = queryParams;
                this.getAccnts()
            },
            getAccnts() {
                axios.get('/auth/inetaccnts', {
                    params: {
                        "queryParams": this.queryParams,
                        "page": this.queryParams.page
                    }
                })
                    .then(function(response)
                {
                    self.rows = response.data.data;
                    self.total_rows = this.rows.length;
                }).catch(function (error) {
                    console.log(error)
                })

            },
            getAsscs() {
                axios.get('/auth/inetaccnts').then((response) => {
                    this.data = response.data;
                    this.rows = response.data;
                }).catch((error) =>
                    this.errors = error.response.data.errors || error.message)
            },

            transformData: function(data) {
                var transformed = {}

                transformed.pagination = {
                    total: this.data.total,
                    per_page: this.data.per_page,
                    current_page: this.data.current_page,
                    last_page: this.data.last_page,
                    next_page_url: this.data.next_page_url,
                    prev_page_url: this.data.prev_page_url,
                    from: this.data.from,
                    to: this.data.to
                }

                transformed.mydata = []

                for (var i=0; i < this.data.length; i++) {
                    transformed.mydata.push({
                        NUM: this.data[i].NUM,
                        DAT: this.data[i].DAT,
                        BUYER_NAME: this.data[i].BUYER_NAME,
                        S_GOOD: this.data[i].S_GOOD,
                        S_OPL: this.data[i].S_OPL,
                        FSTATE: this.data[i].FSTATE
                    })
                }

                return transformed
            }


        },
        mounted() {
            this.getAccnts();

        },

        created () {
            this.getAsscs();

        }
    }
</script>

<style scoped>
    .vuetable th.sortable:hover {
        color: #2185d0;
        cursor: pointer;
    }
</style>
