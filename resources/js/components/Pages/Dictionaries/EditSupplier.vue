<template>
    <div class="modal fade" id="editSupplier" tabindex="-1" role="dialog" aria-labelledby="supplierEditTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="supplierEditTitle">Поставщик: редактирование</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <vue-form :state="formstate" @submit.prevent="onSubmit">
                        <b-form-row>
                            <b-col cols="6" sm="4">
                                <validate auto-label class="form-group" :class="fieldClassName(formstate.name)">
                                    <label>Код</label>
                                    <input v-model="supplier.KLIENT_KOD" name="supCode" style="width: 40px" required  placeholder="Код" class="input-sav"/>

                                    <field-messages name="supCode" show="$touched || $submitted" class="form-control-feedback">
                                        <div>Отлично</div>
                                        <div slot="required">Введите код поставщика</div>
                                    </field-messages>
                                </validate>
                            </b-col>
                            <b-col cols="12" sm="6">
                                <validate auto-label class="form-group" :class="fieldClassName(formstate.name)">
                                    <label>Наименование</label>
                                    <input v-model="supplier.NAME" name="supName" style="width: 300px" required class="input-sav"/>

                                    <field-messages name="supName" show="$touched || $submited" class="form-control-feedback">
                                        <div slot="required">Введите наименование поставщика</div>
                                    </field-messages>
                                </validate>
                            </b-col>
                            <b-col cols="6" sm="2">
                                <div class="switch-label" >
                                    <div class="switch-slider" v-model="supplier.GRAF" color="primary"></div>
                                </div>
                            </b-col>
                        </b-form-row>

                        <b-form-row>
                            <b-col cols="12" sm="12">
                                <validate auto-label class="form-group" :class="fieldClassName(formstate.name)">
                                    <label>Обслуживающая организация</label>
                                    <select v-model="supplier.ORG_ID" name="supOrg" class="input-sav">
                                        <option value="0">Выберите организацию</option>
                                        <option v-for="org in organisations" v-bind:value="org.ORG_ID" :key="org.ORG_ID">{{ org.ORG_NAME }}</option>
                                    </select>
                                </validate>
                            </b-col>
                        </b-form-row>

                        <b-form-row>
                            <b-col cols="6" sm="4">
                                <validate auto-label class="form-group" :class="fieldClassName(formstate.name)">
                                    <label>Товаровед</label>
                                    <select v-model="supplier.FSALER_ID" name="supMerch" class="input-sav">
                                        <option v-for="merchandiser in merchandises" v-bind:value="merchandiser.FSALER_ID" :key="merchandiser.FSALER_ID">{{ merchandiser.FSALER_NAME }}</option>
                                    </select>
                                </validate>
                            </b-col>

                        </b-form-row>
                        <b-form-row>
                            <b-col cols="12" sm="12">
                                <hr>
                                <h5>Адрес организации</h5>
                            </b-col>
                        </b-form-row>
                        <b-form-row>
                                <b-col cols="6" sm="4">
                                    <validate auto-label class="form-group" :class="fieldClassName(formstate.name)">
                                        <label>Город</label>
                                        <input v-model="supplier.KL_CITY" name="supCity" class="input-sav"/>

                                        <field-messages name="supCity" show="$touched || $submited" class="form-control-feedback" required>
                                            <div slot="required">Введите город</div>
                                        </field-messages>
                                    </validate>
                                </b-col>
                            <b-col cols="6" sm="4">
                                <validate auto-label class="form-group" :class="fieldClassName(formstate.name)">
                                    <label>ФИО представителя</label>
                                    <input v-model="supplier.KL_REPRESENT" name="supRepres" class="input-sav"/>

                                </validate>
                            </b-col>
                        </b-form-row>
                        <b-form-row>
                                <b-col cols="12" sm="12">
                                    <validate auto-label class="form-group" :class="fieldClassName(formstate.name)">
                                        <label>Адрес</label>
                                        <input v-model="supplier.KL_ADR" name="supAdr" class="input-sav" style="width: 480px">

                                        <field-messages name="supAdr" show="$touched || $submited" class="form-control-feedback" required>
                                            <div slot="required">Введите адрес организации</div>
                                        </field-messages>
                                    </validate>
                                </b-col>
                        </b-form-row>
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
    import Switch from '../../elements/switch/Switch'
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


    /*input {
        font-size: 10px;
    }
    label {
        font-size: 12px;
        font-weight: bold;
    }*/
</style>