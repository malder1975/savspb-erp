<template>
    <div class="animated fade-in">
        <b-container>
        <b-row>
            <vuetable ref="vuetable"
                :api-mode="false"
                :data="data"
                :fields="fields"
                :multi-sort="true"
                :per-page="perPage"
                :data-manager="dataManager"
                :sort-order="sortOrder"
                no-data-template="Нет данных для отображения"
                pagination-path="pagination"
                @vuetable:pagination-data="onPaginationData">
            </vuetable>
            <!--vuetable-pagination-info ref="paginationInfo"></vuetable-pagination-info-->
            <vuetable-pagination ref="pagination" @vuetable-pagination:change-page="onChangePage">
            </vuetable-pagination>
        </b-row>
        </b-container>
    </div>
</template>

<script>
    //import DatatableFactory from 'vuejs-datatable'
    import Vuetable from 'vuetable-2'
    import VuetablePagination from 'vuetable-2/src/components/VuetablePagination'
    //import VueTablePaginationDropDown from 'vuetable-2/src/components/VuetablePaginationDropdown'
   // import TablePaginationInfo from 'vuetable-2/src/components/VuetablePaginationInfo'
    import FieldsDef from '../../fielddefs/netpayacc.js'
    import _ from 'lodash'
    import moment from 'moment'
    import axios from 'axios'
    import accounting from 'accounting'
    export default {
        name: "InetAccs",
        components: {
            Vuetable,
            VuetablePagination,
            //VueTablePaginationDropDown,
            //TablePaginationInfo
        },
        data(){
            return {
                fields: FieldsDef,
                perPage: 10,
                data: [],
                sortOrder: [
                    {
                        field: 'FSTATE',
                        direction: 'ASC'
                    }
                ]
            }
        },
        watch: {
            data(newVal, oldVal) {
                this.$refs.vuetable.refresh()
            }
        },
        methods: {
            onPaginationData(paginationData) {
                this.$refs.pagination.setPaginationData(paginationData);
                this.$refs.paginationInfo.setPaginationData(paginationData);
            },
            onChangePage(page) {
                this.$refs.vuetable.changePage(page);
            },

            onActionClicked(action, data) {
                console.log("slot actions: on-click", data.name);
            },
            dataManager(sortOrder, pagination) {
                if(data.length < 1) return;
                //let local = this.data;

                if (sortOrder.length > 0) {
                    console.log("OrderBy:", sortOrder[0].sortField, sortOrder[0].direction);
                    data = _.orderBy(
                        data,
                        sortOrder[0].sortField,
                        sortOrder[0].direction
                    );
                }

                pagination = this.$refs.vuetable.makePagination(
                    this.data.length,
                    this.perPage
                );
                console.log('pagination:', pagination)
                let from = pagination.from - 1;
                let to = from + this.perPage;

                return {
                    pagination: pagination,
                    data: _.slice(this.data, from, to)
                };
            },



            formatDate(value, fmt = 'DD.MM.YYYY') {
                return (value == null) ? '' : moment(value, 'YYYY-MM-DD').format(fmt)
            },

            zakazState(value) {
                return value === 0 ? 'Новый заказ' : 'Реализован'
            },

            formatNumber(value) {
                return accounting.formatMoney(value,2)
            },

            getAsscs() {
                axios.get('/auth/inetaccnts').then((response) => {
                    this.data = response.data;
                }).catch((error) =>
                    this.errors = error.response.data.errors || error.message)
            }
        },
        mounted() {

        },

        created () {
            this.getAsscs()
        }
    }
</script>

<style scoped>
    .vuetable th.sortable:hover {
        color: #2185d0;
        cursor: pointer;
    }
</style>
