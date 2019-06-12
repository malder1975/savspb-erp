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
                                <Switch v-model="supplier.GRAF" class="mx-1" color="info" size="sm" label outline="alt" variant="pill" v-bind="labelIcon"/>
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
                            <b-col cols="12" sm="6">
                                <validate auto-label class="form-group" :class="fieldClassName(formstate.name)">
                                    <label>Адрес</label>
                                    <input v-model="supplier.KL_ADR" name="supAdr" class="input-sav" style="width: 480px">

                                    <field-messages name="supAdr" show="$touched || $submited" class="form-control-feedback" required>
                                        <div slot="required">Введите адрес организации</div>
                                    </field-messages>
                                </validate>
                            </b-col>
                            <b-col cols="6" sm="3">
                                <validate auto-label class="form-group" :class="fieldClassName(formstate.name)">
                                    <label>ОКПО</label>
                                    <input v-model="supplier.KL_OKPO" name="supOkpo" class="input-sav" type="number">
                                </validate>
                            </b-col>
                            <b-col cols="6" sm="3">
                                <validate auto-label class="form-group" :class="fieldClassName(formstate.name)">
                                    <label>ОКНХ</label>
                                    <input v-model="supplier.KL_OKONH" name="supOknh" class="input-sav" type="number">
                                </validate>
                            </b-col>
                        </b-form-row>
                        <hr/>
                        <b-form-row>
                            <b-col cols="6" sm="3">
                                <validate auto-label class="form-group" :class="fieldClassName(formstate.name)">
                                    <label>ИНН</label>
                                    <input v-model="supplier.KL_INN" name="supInn" class="input-sav" required type="number"/>

                                    <field-messages name="supInn" show="$touched || $submited" class="form-control-feedback" required>
                                        <div slot="required">ИНН должен быть указан</div>
                                    </field-messages>
                                </validate>
                            </b-col>
                            <b-col cols="6" sm="3">
                            <validate auto-label class="form-group" :class="fieldClassName(formstate.name)">
                                <label>КПП</label>
                                <input v-model="supplier.KL_KPP" name="supKpp" class="input-sav" required type="number"/>

                                <field-messages name="supKpp" show="$touched || $submited" class="form-control-feedback" required>
                                    <div slot="required">КПП должен быть указан</div>
                                </field-messages>
                            </validate>
                            </b-col>
                            <b-col cols="6" sm="3">
                                <validate auto-label class="form-group" :class="fieldClassName(formstate.name)">
                                    <label>БИК</label>
                                    <input v-model="supplier.KL_BIK" name="supBik" class="input-sav" required type="number"/>

                                    <field-messages name="supBik" show="$touched || $submited" class="form-control-feedback" required>
                                        <div slot="required">БИК должен быть указан</div>
                                    </field-messages>
                                </validate>
                            </b-col>
                        </b-form-row>
                        <b-form-row>
                            <b-col cols="6" sm="6">
                                <validate auto-label class="form-group" :class="fieldClassName(formstate.name)">
                                    <label>Р/счет</label>
                                    <input v-model="supplier.KL_RS" name="supRs" class="input-sav" required type="number"/>

                                    <field-messages name="supRs" show="$touched || $submited" class="form-control-feedback" required>
                                        <div slot="required">Расчетный счет должен быть указан</div>
                                    </field-messages>
                                </validate>
                            </b-col>
                            <b-col cols="6" sm="6">
                                <validate auto-label class="form-group" :class="fieldClassName(formstate.name)">
                                    <label>К/счет</label>
                                    <input v-model="supplier.KL_KS" name="supKs" class="input-sav" required type="number"/>

                                    <field-messages name="supKs" show="$touched || $submited" class="form-control-feedback" required>
                                        <div slot="required">Корр.счет должен быть указан</div>
                                    </field-messages>
                                </validate>
                            </b-col>
                        </b-form-row>
                        <b-form-row>
                            <b-col cols="12" sm="12">
                                <validate auto-label class="form-group" :class="fieldClassName(formstate.name)">
                                    <label>Банк</label>
                                    <input v-model="supplier.KL_BANK" name="supBank" class="input-sav" required style="width: 750px"/>

                                    <field-messages name="supBank" show="$touched || $submited" class="form-control-feedback" required>
                                        <div slot="required">Банк должен быть указан</div>
                                    </field-messages>
                                </validate>
                            </b-col>
                        </b-form-row>
                        <b-form-row>
                            <b-col cols="8" sm="9">
                                <validate auto-label class="form-group" :class="fieldClassName(formstate.name)">
                                    <label>Примечание</label>
                                    <b-form-textarea v-model="supplier.NOTE" name="supNote" rows="3" cols="150" placeholder="Примечание"></b-form-textarea>
                                </validate>
                            </b-col>
                            <b-col cols="4" sm="3">
                                <validate auto-label class="form-group" :class="fieldClassName(formstate.name)">
                                    <label>Торговая наценка</label>

                                </validate>
                                <validate auto-label class="form-group" :class="fieldClassName(formstate.name)">
                                    <label>Транспортные расходы</label>

                                </validate>
                                <validate auto-label class="form-group" :class="fieldClassName(formstate.name)">
                                    <label>Компенсация</label>

                                </validate>
                            </b-col>
                        </b-form-row>
                        <b-form-row>
                            <b-col cols="12" sm="6">
                                <b-form-file v-model="supplier.logo_url" :state="Boolean(supplier.logo_URL)" placeholder="Выберите логотип" accept="image/jpeg, image/png, image/gif"></b-form-file>
                            </b-col>
                            <b-col cols="12" sm="6">
                                <img src="https://via.placeholder.com/80" alt="Лого" width="120px" height="120px"/>
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
    import Switch  from '../../elements/switch/Switch'
    export default {
        name: "EditSupplier",
        components: {
          Switch
        },
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

    .custom-file-input:lang(en) ~ .custom-file-label::after {
        content: 'Открыть';
    }


    /*input {
        font-size: 10px;
    }*/
    label {
        font-size: 12px;
        font-weight: bold;
    }
</style>