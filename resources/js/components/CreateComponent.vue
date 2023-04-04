<template>
    <div class="w-25" style="margin-left: 25px">
        <form>
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" id="name" v-model="name">
            </div>
            <div class="mb-3">
                <label class="form-label">Age</label>
                <input type="number" class="form-control" id="age" v-model="age" min="1">
            </div>
            <div class="mb-3">
                <label class="form-label">Job</label>
                <input type="text" class="form-control" id="job" v-model="job">
            </div>
            <button @click.prevent="addPersons" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "CreateComponent",

    data() {
        return {
            name: null,
            age: null,
            job: null,
        }
    },
    methods: {
        addPersons() {
            axios.post('/api/peoples', {name: this.name, age: this.age, job: this.job})
                .then(res=>{
                    this.name = null
                    this.age = null
                    this.job = null
                    this.$parent.$refs.index.getPeople()
                })
        },
    }
}
</script>

<style scoped>

</style>
