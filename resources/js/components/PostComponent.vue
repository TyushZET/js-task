<template>
    <div>
        <create-component></create-component>
        <index-component ref="index"></index-component>
    </div>
</template>

<script>
import CreateComponent from "./CreateComponent.vue";
import IndexComponent from "./IndexComponent.vue";
import EditComponent from "./EditComponent.vue";
export default {
    name: "PostComponent",


    mounted() {

    },
    methods: {

    },


    components:{
        CreateComponent,
        IndexComponent,
        EditComponent,
    }
}
</script>

<style scoped>

</style>
