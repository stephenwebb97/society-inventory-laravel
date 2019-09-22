<template>
    <v-select
            v-model="select"
            :items="items"
            label="Board Game Provider"
            solo
            item-text="display_name"
            item-value="id"
            :loading="isLoading"
    ></v-select>
</template>

<script>
    import axios from 'axios';
    export default {
        name: "SelectBoardGameProvider",
        data (){
            return {
                items:[],
                isLoading:false,
                select:""
            }
        },
        mounted() {
            this.isLoading = true;
            axios.get('/wapi/bgp').then((response)=>{
                this.items = response.data
            }).catch((e)=>{
                console.log(e);
            }).then(()=>{
                this.isLoading = false;
            })
        },
        watch:{
            select(value){
                this.$emit('update:select',value);
            }
        }
    }
</script>

<style scoped>

</style>