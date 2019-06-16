<template>
    <div class="fade-in">
        <b-row>
            <b-col sm="6" lg="3">
                <b-card no-body class="bg-primary">

                </b-card>
            </b-col>
            <b-col sm="6" lg="3">
                <router-link to="suppliers">
                <b-card no-body class="bg-primary card-suppliers">
                    <b-card-body class="pb-0">
                        <b-dropdown class="float-right" variant="transparent p-0" right no-caret>
                            <template slot="button-content">
                                <i class="far fa-handshake"></i>
                            </template>
                            <b-dropdown-item>Прайс-листы поставщиков</b-dropdown-item>
                            <b-dropdown-item>Оплаты по реализации</b-dropdown-item>
                            <b-dropdown-item>Оплаты по графику</b-dropdown-item>
                        </b-dropdown>
                        <h4 class="mb-0 counter-suppliers">{{ suppliers.length }}</h4>
                        <p class="counter-suppliers"> Поставщики </p>
                    </b-card-body>
                </b-card>
                </router-link>
            </b-col>
            <b-col sm="6" lg="3">
                <b-card no-body class="bg-primary">

                </b-card>
            </b-col>
        </b-row>
    </div>
</template>

<script>
    export default {
        name: "Dashboard",
        data() {
            return {
                suppliers: []
            }
        },
        mounted() {
            axios.get('/auth/suppliers').then((response) => (
                //console.log(response.data)
                this.suppliers = response.data
            )).catch((error) =>
                this.errors = error.response.data.errors || error.message
            );
        }
    }
</script>

<style scoped>

</style>