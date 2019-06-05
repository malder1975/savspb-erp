<template>

</template>

<script>
    export default {
        name: "EditSupplier",

        data() {
            return {
                organisations: [],
                merchandises: [],
            }
        },
        methods: {
            getOrganisations() {
                axios.get('/auth/organisations').then((response) => {
                    this.organisations = response.data
                }).catch((error) =>
                    this.errors = error.response.data.errors || error.message);
            },

            getMerchandises() {
                axios.get('/auth/merchandises').then((response) => {
                    this.merchandises = response.data
                }).catch((error) =>
                    this.errors = error.response.data.errors || error.message);
            }
        },
        created() {
            this.getOrganisations()
            this.getMerchandises()
        }

    }
</script>