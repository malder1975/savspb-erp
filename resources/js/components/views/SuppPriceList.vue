<template>
    <div class="fade-in">
        <b-row class="top-toolbar">
            <b-button-group class="mx-1">
                <b-button variant="outline-info" id="cards"><i class="fas fa-th-large"></i> </b-button>
                <b-tooltip target="cards" triggers="hover">Карточки</b-tooltip>
                <b-button variant="outline-info" id="lists"><i class="fas fa-list-ul"></i> </b-button>
                <b-tooltip target="lists" trigger="hover">Список</b-tooltip>
            </b-button-group>
        </b-row>
    </div>
</template>

<script>
    export default {
        name: "SuppPriceList"
    }
</script>

<style scoped>

</style>
