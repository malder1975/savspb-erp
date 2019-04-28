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
                        <h3 class="text-center forgot-head">
                            Смена пароля
                        </h3>
                    </div>
                </div>
                <li v-for="error in errors" v-bind:key="error">{{ msg }}</li>
                <div class="row forgot-form">
                    <div class="container">
                        <form autocomplete="off" @submit.prevent="resetPassword" method="post">
                            <div class="col-md-12">
                                <p>
                                    * Пароль регистро-зависимый (большие и маленькие буквы различаются)
                                </p>
                            </div>
                            <div class="col-sm-12 mt-3">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" id="email" class="form-control" placeholder="user@example.com" required v-model="email">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="password" id="password" class="form-control" placeholder="" required v-model="password">
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation">E-mail</label>
                                    <input type="password" id="password_confirmation" class="form-control" placeholder="" required v-model="password_confirmation">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block login-submit" >Сменить пароль</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ResetPasswordForm",
        data() {
            return {
                token: null,
                email: null,
                password: null,
                password_confirmation: null,
                has_error: false
            }
        },
        methods: {
            resetPassword() {
                this.$http.post('auth/reset/password', {
                    token: this.$route.params.token,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password_confirmation
                })
                    .then(result => {
                        this.$router.push({name: 'login'})
                    }, error => {
                        console.error(error)
                    })
            }
        }
    }
</script>
