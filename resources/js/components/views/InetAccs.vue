<template>
    <div class="animated fade-in">
        <b-row>
            <datatable :columns="columns" :data="rows"></datatable>
            <datatable-pager v-model="page" type="abbreviated" :per-page="per-page"></datatable-pager>
        </b-row>
    </div>
</template>

<script>
    //import DatatableFactory from 'vuejs-datatable'
    export default {
        name: "InetAccs",
        components: {
            DatatableFactory
        },
        data(){
            return {
                columns: [
                    {label:'Сч. №', field:'NUM'},
                    {label:'Дата', field:'DAT'},
                    {label:'Покупатель', field:'BUYER_NAME'},
                    {label:'Сумма заказа', field:'S_GOOD'},
                    {label:'Сумма оплаты', field:'S_OPL'},
                    {label:'Состояние', field:'FSTATE'}
                ],
                rows:[],
                page: 1,
                per_page:10
            }
        },
        methods: {
            getInetAccs() {
                axios.get('/auth/inetaccnts').then((response) => {
                    this.rows = response.data;
                }).catch((error) =>
                    this.errors = error.response.data.errors || error.message)
            }
        },
        created () {
            this.getInetAccs()
        }
    }
</script>

<style scoped>

</style>
