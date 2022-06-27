<template>
    <div class="d-flex justify-content-around">
        <div class="w-25">
            <div class="mb-3">
                <label class="form-label">Ваше имя</label>
                <input v-model="name" type="text" class="form-control" placeholder="Ваше имя">
            </div>
            <div class="mb-3">
                <label class="form-label">Ваш возраст</label>
                <input v-model="age" type="number" class="form-control" placeholder="возраст">
            </div>
            <div class="mb-3">
                <label class="form-label">Ваша работа</label>
                <input v-model="job" type="text" class="form-control" placeholder="ваша работа">
            </div>
            <div class="mb-3">
                <label class="form-label">Ваша аватарка</label>
                <input type="file" @change="onFileUpload" accept="image/*">>
            </div>
            <div class="mb-3">
                <input type="submit" @click.prevent="addPerson" class="btn btn-primary">
            </div>

        </div>
        <div>
            <div class="d-flex justify-content-around w-50" v-for="person in people.data">
                <div class="m-4">
                    <img :src="person.image" alt="avatar">
                </div>
                <div class="m-4">
                    <div>{{ person.name }}</div>
                    <div>{{ person.age }}</div>
                    <div>{{ person.job }}</div>
                    <div><router-link :to="{name: 'person.show', params: {id: person.id}}">Детали</router-link> </div>
                </div>
            </div>
            <pagination :data="people" @pagination-change-page="getPerson" :limit="-1">
                <template #prev-nav>
                    <span> Назад</span>
                </template>
                <template #next-nav>
                    <span>Показать еще</span>
                </template>
            </pagination>
        </div>
    </div>
</template>

<script>
export default {
    name: "PeopleComponent",
    data() {
        return {
            FILE: null,
            name: null,
            age: null,
            job: null,
            people: {},
        }
    },
    mounted() {
        this.getPerson()
    },
    methods: {
        getPerson(page = 1) {
            axios.get('/api?page=' + page)
                .then(r => {
                    this.people = r.data;

                })
        },
        onFileUpload(event) {
            this.FILE = event.target.files[0]
        },
        addPerson() {
            const formData = new FormData();
            formData.append('name', this.name);
            formData.append('job', this.job);
            formData.append('age', this.age);
            formData.append('image', this.FILE, this.FILE.name);
            axios.post('/api', formData)
                .then(r => {
                    this.getPerson();
                    this.FILE = null
                    this.name = null
                    this.age = null
                    this.job = null
                })
        }
    },
}
</script>

<style scoped>

</style>
