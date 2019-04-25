<template>
    <div class="container-fluid forgot-container">
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
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="text-center forgot-head">
                            Восстановление пароля
                        </h2>
                        <p>
                            Пожалуйста введите e-mail, указанный при регистрации.
                            На него будет отправлено письмо с дальнейшими инструкциями по восстановлению.
                        </p>
                    </div>
                </div>
                <div class="row forgot-form">
                    <div class="container">
                        <form autocomplete="off" @submit.prevent="restorepassword" method="post">
                            <div class="col-sm-12 mt-3 forgot-input">
                                <input type="email" id="email" class="form-control" placeholder="E-mail" v-model="email" required />
                            </div>
                            <button type="submit" class="btn btn-primary btn-block login-submit" value="Восстановить пароль">Получить пароль</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ForgotPassword",
        data() {
            return {
                email: null,
                has_error: false
            }
        },
        methods: {
            requestResetPassword() {
                this.$http.post('/auth/reset-password', {email:this.email}).then(result => {this.response = result.data;
                console.log(result.data);}, error => {console.error(error);});
            }
        }
    }
</script>
