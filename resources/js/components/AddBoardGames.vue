<template>
    <v-container>
        <v-row>
            <v-col>
                <SelectBoardGameProvider :select.sync="provider" ></SelectBoardGameProvider>
            </v-col>
        </v-row>
        <v-row>
            <v-col>
                <LookUpBoardGames :disable="provider == ''" :board_game_provider_id="provider" base_url="/wapi/bgp/"></LookUpBoardGames>
            </v-col>
        </v-row>

    </v-container>
</template>

<script>
    import LookUpBoardGames from "./LookUpBoardGames";
    import SelectBoardGameProvider from "./SelectBoardGameProvider";
    export default {
        name: "AddItem",
        components:{
            LookUpBoardGames,
            SelectBoardGameProvider
        },
        data(){
            return{
                provider:""
            }
        }
    }
</script>

<style scoped>

</style>