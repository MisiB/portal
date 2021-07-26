<template>
    <userlayout title="Mobile Payments">
        <v-container>
            <v-alert
                border="top"
                color="red lighten-2"
                dark
                v-if="errorMessage"
            >
                {{errorMessage}}
            </v-alert>
            <v-alert
                border="top"
                color="green lighten-2"
                dark
                v-if="successMessage"
            >
                {{successMessage}}
            </v-alert>
            
        </v-container>
        <v-row>
            <v-col cols md="6" offset-md="3">
                <v-card>
                    <v-app-bar class="cyan accent-4 white--text">
                        <v-toolbar-title>Confirm Payment</v-toolbar-title>
                    </v-app-bar>
                     <v-card-text class="text-center">
                         Do you wish add another  proof of payment
                     </v-card-text>
                    <v-card-actions>
                         <inertia-link :href="$route('Tenderpayment.edit',type)" class="white--text v-btn v-btn--has-bg v-btn--rounded theme--light v-size--default red">Add another</inertia-link>
                         <v-spacer></v-spacer>
                         <v-btn rounded depressed class="success" @click="confirmPayment"> Finish </v-btn>
                    </v-card-actions>
                </v-card>
            </v-col>
        </v-row>
    </userlayout>

</template>

<script>
import  userlayout  from '../../../../Layouts/userlayout';
export  default {
    props: ['errors', 'successMessage', 'errorMessage', 'type'],
    components: {
        userlayout
    },data(){
        return{
            loading:false,
            disabled:true,
            value:0
        }
    },methods:{
        confirmPayment(){
            this.loading=true
            this.$inertia.get('/bidders/TenderBankpayments/' + this.type , {onSuccess: (page)=>{
              this.loading =false
            },onError:(err)=>{
             this.loading = false
            }})
        }
    }
}
</script>

<style scoped>

</style>
