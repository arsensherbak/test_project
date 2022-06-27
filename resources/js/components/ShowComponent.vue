<template>
<div v-if="person">
    <h3>Имя {{this.person.name}} <img class="m-4" :src="this.person.image" alt="persona"></h3>

    <div>Полныл лет {{this.person.age}} </div>
    <div>Работает {{this.person.job}} </div>
</div>
</template>

<script>
export default {
    name: "ShowComponent",
    data(){
        return {
            person: {}
        }
    },
    mounted() {
        this.getPerson()
    },
    methods:{
        getPerson(){
            axios.get('/api/' + this.$route.params.id)
            .then(res=>{
                this.person = res.data.data;
                console.log(res.data);
            })
        }
    }
}
</script>

<style scoped>

</style>
