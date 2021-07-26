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
            <v-stepper alt-labels>
                <v-stepper-header>
                    <v-stepper-step
                        step="1"
                        complete
                        complete-icon="mdi-check"
                    >
                        <small>Document Upload</small>
                    </v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step
                        step="2"
                        complete
                        complete-icon="mdi-check"
                    >
                        <small>Invoicing</small>
                    </v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step
                        step="3"
                    >
                        <small> Payment</small>
                    </v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step step="4">
                        <small>Finish</small>
                    </v-stepper-step>
                </v-stepper-header>
            </v-stepper>
            <v-row class="mt-5">
                <v-col cols="12" md="6" offset-md="3">
                    <v-form ref="form" v-model="isvalid" lazy-validation>
                    <v-card>
                        <v-card-title :class="`${mode}`">{{mode}}</v-card-title>
                        <v-card-text class="pa-4">

                            <v-text-field
                                v-model="phone"
                                label="Mobile Number"
                                outlined
                                :rules="phoneRules"
                            >
                            </v-text-field>

                            <v-text-field
                                v-model="amount"
                                label="Amount"
                                outlined
                                prepend-inner-icon="mdi-currency-usd"
                                :rules="amountRules"
                            >
                            </v-text-field>

                        </v-card-text>
                        <v-card-actions>
                            <inertia-link :href="$route('payment')" class="red white--text v-btn  v-btn--has-bg v-btn--rounded theme--light v-size--default">Cancel</inertia-link>
                            <v-spacer></v-spacer>
                            <v-btn rounded depressed :loading="loading" :disabled="loading"  class="blue white--text" @click="process">Submit</v-btn>

                        </v-card-actions>
                    </v-card>
                    </v-form>

                </v-col>
            </v-row>
        </v-container>
    </userlayout>

</template>

<script>
import  userlayout  from '../../../Layouts/userlayout';
export  default {
    props: ['errors', 'successMessage', 'errorMessage', 'mode','balance'],
    components: {
        userlayout
    },
    data(){
        return{
            amount:'',
            amountRules:[
                v=> !!v || 'Amount required',
                v => (v && v <= this.balance) || 'Amount must be less than '+this.balance,
                v => (v && v < 34500) || 'Amount must be less than 34500',

            ],
            phone:'',
            phoneRules:[v => !!v || this.mode+' Mobile Number Required'],
            isvalid:true,
            loading:false
        }
    },methods:{
        process(){
            if (this.$refs.form.validate()){
                this.loading = true
                 var data = {phone:this.phone,mode:this.mode,amount:this.amount}
                 this.$inertia.post(this.$route('Mobilepayments.store'),data,{
                     onSuccess:(page)=>{
                      this.loading = false
                     },oError:(page)=>{
                          this.false
                     }
                 })
            }
        }
    }
}
</script>

<style scoped>
 .ECOCASH{
     background-color: #00b0ff;
     color: mintcream;
 }
 .ONEMONEY{
     background-color: orange;
     color: white;
 }
</style>
