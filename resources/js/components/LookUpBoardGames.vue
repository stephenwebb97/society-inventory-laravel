<template>
    <v-autocomplete
            label="BoardGame LookUp"
            v-model="model"
            :items="results"
            :loading="isLoading"
            :search-input.sync="search"
            item-text="name"
            item-value="id"
            placeholder="Start typing to Search For BoardGame"
            prepend-icon="mdi-dice-multiple"
            :disabled="disable"
            filled
            solo
            clearable
            hide-details
            hide-no-data
    ></v-autocomplete>

</template>

<script>
    import axios from "axios";
    export default {
        data () {
            return{
                descriptionLimit: 60,
                results: [],
                isLoading: false,
                search: "",
                model:"",
                nextSearch:"",
                currentSearch:""
            };
        },

        props:{
            board_game_provider_id: String,
            base_url:String,
            disable:Boolean
        },

        methods: {
            lookup(value,override = false){
                this.nextSearch = value;
                if (this.isLoading||override){
                    return
                }

                const t = this;
                t.isLoading = true;
                this.currentSearch = value;

                axios.get(t.base_url+t.board_game_provider_id+"/search?query="+value).then((response)=>{
                    t.results = response.data
                }).catch((e)=>{
                    console.log(e);
                }).then(()=>{
                    if (t.nextSearch !== t.currentSearch){
                        t.isLoading = false;
                        t.lookup(t.nextSearch);
                    }else {
                        t.isLoading = false;
                    }
                })
            }
        },

        mounted() {
            console.log('Component mounted.')
        },

        watch:{
            search(val){
                this.lookup(val);
            }
        }
    }
</script>
