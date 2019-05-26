<template>
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5">
                <b-card class="info-card-bg">
                    <b-card-body>
                        <div class="profile text-center">
                            <b-img class="circle" :src="user.avatar_url ? '/images/avatars/user1.png' : '/images/avatars/user1.png'" alt="Аватар"></b-img>
                            <h4 class="text-gray">{{ user.PERS_NAME  }}</h4>
                        </div>
                    </b-card-body>
                </b-card>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PersonProfile"
    }
</script>

<style scoped>

</style>
