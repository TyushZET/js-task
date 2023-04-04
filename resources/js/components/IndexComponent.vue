<template>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Job</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        <template v-for="person in people">
            <tr>
                <th scope="row">{{ person.id }}</th>
                <td>{{ person.name }}</td>
                <td>{{ person.age }}</td>
                <td>{{ person.job }}</td>
                <td>
                    <a href="" @click.prevent="changePersonId(person.id,person.name,person.age,person.job)"
                       class="btn btn-success">Edit</a>
                </td>
                <td>
                    <a href="" @click.prevent="deletePerson(person.id)"
                       class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <EditComponent :person="person" :ref="`edit_${person.id}`"></EditComponent>
        </template>
        </tbody>
    </table>
</template>

<script>
import EditComponent from "./EditComponent.vue";
export default {
    name: "IndexComponent",

    data() {
        return {
            people: null,
            editPersonId: null,
            name: '',
            age: null,
            job: '',
        }
    },

    mounted() {
        this.getPeople()
    },

    components:{
        EditComponent
    },

    methods: {
        getPeople() {
            axios.get('/api/peoples')
                .then(res => {
                    this.people = res.data
                })
        },
        changePersonId(id, name, age, job) {
            this.editPersonId = id
            let editName = `edit_${id}`
            let fullEditName = this.$refs[editName][0]
            fullEditName.name = name
            fullEditName.age = age
            fullEditName.job = job
        },

        isEdit(id) {
            return this.editPersonId === id
        },

        updatePerson(id) {
            this.editPersonId = null
            console.log(this.name, this.age, this.job);
            axios.patch(`/api/peoples/${id}`, {name: this.name, age: this.age, job: this.job})
                .then(res => {
                    this.getPeople()
                })

        },

        deletePerson(id){
            axios.delete(`/api/peoples/${id}`)
                .then(res => {
                    this.getPeople()
                })

        },
    }
}
</script>

<style scoped>

</style>
