<template>
    <div class="fade-in">
        <b-row>
            <b-col sm="6" lg="3" md="3">
                <b-card no-body class="bg-info">
                    <b-card-body class="pb-0">
                        <b-dropdown class="float-right" variant="transparent p-0" right no-caret>
                            <b-dropdown-item>1111</b-dropdown-item>
                        </b-dropdown>
                        <b-row>
                            <b-col sm="4">

                            </b-col>
                            <b-col sm="8">

                            </b-col>
                        </b-row>
                        <p class="cart-title"> Карты товара </p>
                    </b-card-body>
                </b-card>
            </b-col>
            <b-col sm="6" lg="3" md="3" >
                <router-link to="suppliers" class="card-suppliers">
                    <b-card no-body class="bg-primary dashboard-card">
                        <b-card-body class="pb-0">
                            <b-dropdown class="float-right" variant="transparent p-0" right no-caret>
                                <template slot="button-content">
                                    <i class="far fa-handshake"></i>
                                </template>
                                <b-dropdown-item>Прайс-листы поставщиков</b-dropdown-item>
                                <b-dropdown-item>Оплаты по реализации</b-dropdown-item>
                                <b-dropdown-item>Оплаты по графику</b-dropdown-item>
                            </b-dropdown>
                            <b-row>
                                <b-col sm="4">
                                    <i class="fas fa-handshake fa-4x"></i>
                                </b-col>
                                <b-col sm="8">
                                    <h2 class="mb-0 counter-suppliers float-right">{{ suppliers.length }}</h2>
                                </b-col>
                            </b-row>
                            <p class="cart-title"> Поставщики </p>
                        </b-card-body>
                        <div slot="footer">
                            <small><p>Задолженность по реализации:</p>
                                <p>Задолженность по графику:</p></small>
                        </div>
                    </b-card>
                </router-link>
            </b-col>
            <b-col sm="6" lg="3" md="3">
                <b-card no-body class="bg-primary">

                </b-card>
            </b-col>
        </b-row>
    </div>
</template>

<script>
    export default {
        name: "Dashboard"
    }
</script>

<style scoped>

</style>
