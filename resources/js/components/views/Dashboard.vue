<template>
    <div class="fade-in">
        <b-row>
            <b-col sm="6" lg="3">
                <b-card no-body class="bg-primary">

                </b-card>
            </b-col>
            <b-col sm="6" lg="3">
                <b-card no-body class="bg-primary">
                    <b-card-body class="pb-0">
                        <h4 class="mb-0">{{ suppliers.length }}</h4>
                        <p> Поставщики </p>
                    </b-card-body>
                </b-card>
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