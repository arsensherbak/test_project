<template>
    <div>
        <input v-model="name" type="name" placeholder="name" class="form-control">
        <input v-model="email" type="email" placeholder="email" class="form-control">
        <input v-model="password" type="password" placeholder="password" class="form-control">
        <input v-model="password_confirmation" type="password" placeholder="password confirm" class="form-control">
        <input @click.prevent="register" type="submit" class="btn btn-primary">
    </div>
</template>

<script>
export default {
    name: "Registration",
    data() {
        return {
            name: null,
            email: null,
            password: null,
            password_confirmation: null,
        }
    },
    methods: {
        register() {
            axios.get('/sanctum/csrf-cookie')
                .then(response => {
                    axios.post('/register',
                        {
                            name: this.name,
                            email: this.email,
                            password: this.password,
                            password_confirmation: this.password_confirmation
                        })
                        .then(res => {
                            localStorage.setItem('x_xsrf_token', res.config.headers['X-XSRF-TOKEN'])
                            this.$router.push({name: 'people'})
                        })
                })
        }
    }
}
</script>

<style scoped>

</style>
