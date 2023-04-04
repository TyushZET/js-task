<template>
    <tr :class="this.$parent.isEdit(person.id) ? '' : 'd-none'">
        <th scope="row">{{ person.id }}</th>
        <td>
            <input type="text" class="form-control" v-model="name">
        </td>
        <td>
            <input type="number" class="form-control" v-model="age">
        </td>
        <td>
            <input type="text" class="form-control" v-model="job">
        </td>
        <td>
            <a href="" @click.prevent="updatePerson(person.id)" class="btn btn-success">Update</a>
        </td>
    </tr>
</template>

<script>
export default {
    name: "EditComponent",

    props:[
        'person'
    ],

    data() {
        return {
            name: null,
            age: null,
            job: null,
        }
    },

    methods: {
        updatePerson(id) {
            this.$parent.editPersonId = null
            console.log(this.name, this.age, this.job);
            axios.patch(`/api/peoples/${id}`, {name: this.name, age: this.age, job: this.job})
                .then(res => {
                    this.$parent.getPeople()
                })
        },
    },
}

</script>

<style scoped>

</style>
