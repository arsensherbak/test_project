<template>
    <div>
        <input v-model="email" type="email" placeholder="email" class="form-control">
        <input v-model="password" type="password" placeholder="password" class="form-control">
        <input @click.prevent="login" type="submit" class="btn btn-primary">
    </div>
</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            email: null,
            password: null,
        }
    },
    methods: {
        login() {
            axios.get('/sanctum/csrf-cookie')
                .then(response => {
                    axios.post('/login', {email: this.email, password: this.password})
                        .then(res => {
                            localStorage.setItem('x_xsrf_token', res.config.headers['X-XSRF-TOKEN'])
                            this.$router.push({name: 'people'})
                        })
                        .catch(err => {
                            console.log(err.response);
                        })
                });

        }
    }
}
</script>

<style scoped>

</style>
