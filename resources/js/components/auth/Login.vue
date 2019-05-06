<template>
    <div class="container-fluid login-container">
       <!--<div class="container">
            <div class="row">
                <div class="col-lg-4 col-10 col-sm-8 mx-auto login-form">
                    <h2 class="text-center logo-h2">Дом мебели Нарвский</h2>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <vue-form :state="formstate"  @submit.prevent="login" method="post">
                                    <validate tag="label" class="form-group required-field">
                                        <label>E-mail</label>
                                        <input type="email" name="email" id="email" class="form-control" required model="model.email" />

                                        <field-messages name="email" show="$touched || $submitted">
                                            <div slot="required">E-mail должен быть заполнен</div>
                                            <div slot="email">Ошибка в адресе</div>
                                        </field-messages>
                                    </validate>
                                    <button type="submit" class="btn btn-primary">Вход</button>
                                </vue-form>
                                <pre>{{ formstate }}</pre>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <div class="row justify-content-md-center">
            <div class="col-lg-4 offset-lg-4 col-sm-6 offset-sm-3 mt-5 mx-auto login-content">
                <div class="row login-header">
                    <div class="col-sm-12">
                        <h2 class="text-center header-login">
                            <img src="images/logo1.png" class="login-logo" alt="ДМН-Нарвский">
                            <br>
                            Дом мебели Нарвский
                        </h2>
                    </div>

                </div>
                <div class="row login-errors">
                <div class="container alert alert-danger " v-if="has_error && !success">
                    <p v-if="error = 'login_error'">Ошибки проверки данных.</p>
                    <p v-else>Ошибка, невозможно соединиться с этими учетными данными.</p>
                </div>
                </div>
                <div class="row login-form">
                    <div class="container">
                <form autocomplete="off" @submit.prevent="login" method="post">
                    <div class="col-sm-12 mt-3">
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email" required>
                    </div>
                    </div>
                    <div class="col-sm-12 mt-3">
                    <div class="form-group">
                        <label for="password">Пароль</label>
                        <input type="password" id="password" class="form-control" v-model="password" required placeholder="Введите пароль">
                    </div>
                    </div>
                    <div class="row login-remember">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                        <input type="checkbox" id="rememberme" class="form-check-input" v-model="rememberMe"/>
                        <label for="rememberme" class="form-check-label">Запомнить</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 text-right login-forgot">
                        <div class="form-group">
                        <router-link to="reset-password">Забыли пароль?</router-link>
                        </div>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block login-submit">Вход</button>
                </form>
                    </div>
                </div>
                <!--<div class="card card-default">-->

                    <!--<div class="card-body">
                        <div class="alert alert-danger" v-if="has_error && !success">
                            <p v-if="error = 'login_error'">Ошибки проверки данных.</p>
                            <p v-else>Ошибка, невозможно соединиться с этими учетными данными.</p>
                        </div>
                        <form autocomplete="off" @submit.prevent="login" method="post">
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Пароль</label>
                                <input type="password" id="password" class="form-control" v-model="password" required placeholder="Пароль">
                            </div>
                            <button type="submit" class="btn btn-primary">Вход</button>
                        </form>
                    </div>-->
                </div>
            </div>
        </div>

</template>

<script>
    import ForgotPassword from './ForgotPassword'
    export default {
        name: "Login",
        components: {
          ForgotPassword
        },
        /*data: {
            formstate: {},
            model: {
                email: ''
            },
        },*/
        data() {
            return {
                email: null,
                password: null,
                //rememberMe: true,
                success: false,
                has_error: false,
                error: ''
            }
        },
        mounted() {
           // rememberMe: false
        },
        methods: {
          /*  fieldClassName: function(field) {
                if (!field) {
                    return '';
                }
            },*/
            login() {
                /*if(this.formstate.$invalid) {
                    return;
                }*/
                // get the redirect object
                let redirect = this.$auth.redirect();
                let app = this;
                this.$auth.login({
                    data: {
                        email: app.email,
                        password: app.password,
                        //rememberMe: app.rememberMe
                    },
                    success: function() {
                        // handle redirection
                        app.success = true;
                        const redirectTo = 'index';
                        this.$router.push({name: redirectTo})
                    },
                    error: function() {
                        app.has_error = true;
                        app.error = res.response.data.error
                    },
                    rememberMe: true,
                    fetchUser: true
                })
            }
        }
    }
</script>

<style scoped>

</style>
