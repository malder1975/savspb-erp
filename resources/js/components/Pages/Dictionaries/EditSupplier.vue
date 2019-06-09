<template>
    <div class="modal fade" id="editSupplier" tabindex="-1" role="dialog" aria-labelledby="supplierEditTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="supplierEditTitle">Поставщик: редактирование</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <vue-form :state="formstate" @submit.prevent="onSubmit">
                        <div>{{supplier.ORG_ID}}</div>
                        <validate auto-label class="form-group" :class="fieldClassName(formstate.name)">
                            <label>Код</label>
                            <input v-model="supplier.KLIENT_KOD" name="supCode" style="width: 40px" required />

                            <field-messages name="supCode" show="$touched || $submitted" class="form-control-feedback">
                                <div>Отлично</div>
                                <div slot="required">Введите код поставщика</div>
                            </field-messages>
                        </validate>
                        <validate auto-label class="form-group" :class="fieldClassName(formstate.name)">
                            <label>Наименование</label>
                            <input v-model="supplier.NAME" name="supName" style="width: 300px" required />

                            <field-messages name="supName" show="$touched || $submited" class="form-control-feedback">
                                <div slot="required">Введите наименование поставщика</div>
                            </field-messages>
                        </validate>
                        <validate auto-label class="form-group" :class="fieldClassName(formstate.name)">
                            <label>Обслуживающая организация</label>
                            <select v-model="supplier.ORG_ID" name="supOrg">
                                <option value="0">Выберите организацию</option>
                                <option v-for="org in organisations" v-bind:value="org.ORG_ID" :key="org.ORG_ID">{{ org.ORG_NAME }}</option>
                            </select>
                        </validate>

                        <validate auto-label class="form-group" :class="fieldClassName(formstate.name)">
                            <label>Товаровед</label>
                            <select v-model="supplier.FSALER_ID" name="supMerch">
                                <option v-for="merchandiser in merchandises" v-bind:value="merchandiser.FSALER_ID" :key="merchandiser.FSALER_ID">{{ merchandiser.FSALER_NAME }}</option>
                            </select>
                        </validate>
                    </vue-form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Отмена</button>
                    <button type="button" class="btn btn-sm btn-outline-success">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "EditSupplier",
        props: ['supplier'],
        data() {
            return {
                organisations: [],
                merchandises: [],
                formstate: {},
                KLIENT_KOD: '',
                NAME: '',
                ORG_ID: 0,
                FSALER_ID: 0
            }
        },
        methods: {
            getOrganisations() {
                axios.get('/auth/organisations/' ).then(response => (
                    this.organisations = response.data
                )).catch((error) =>
                    this.errors = error.response.data.errors || error.message);
            },

            getMerchandises() {
                axios.get('/auth/merchandises/').then(response => (
                    this.merchandises = response.data
                )).catch((error) =>
                    this.errors = error.response.data.errors || error.message);
            },

            fieldClassName(field) {
                if (!field) {
                    return '';
                }
                if ((field.$touched || field.$submitted) && field.$valid) {
                    return 'has-success'
                }
                if ((field.$touched || fiels.$submitted) && field.$invalid) {
                    return 'has-danger'
                }
            },
            onSubmit() {
                console.log(this.formstate.$valid)
            }
        },
        created() {
            this.getOrganisations();
            this.getMerchandises()
        }

    }
</script>

<style scoped>
    .required-field > label::after {
        content: '*';
        color: red;
        margin-left: 0.25rem;
    }
    input {
        font-size: 10px;
    }
    label {
        font-size: 12px;
        font-weight: bold;
    }
</style>