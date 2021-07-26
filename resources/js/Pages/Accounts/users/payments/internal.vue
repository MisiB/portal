<template>
    <userlayout title="Bank Payments">
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
        </v-container>
        <v-row>
            <v-col cols md="8" offset-md="2">
                <v-form ref="form" v-model="form" lazy-validation>
                <v-card>
                    <v-app-bar class="cyan accent-4 white--text" flat>
                        <v-toolbar-title>Bank Payments</v-toolbar-title>
                        <v-spacer></v-spacer>
                            <inertia-link :href="$route('Invoicing.index')" class="white--text v-btn v-btn--has-bg v-btn--rounded theme--light v-size--small red">Back</inertia-link>
                            
                    </v-app-bar>
                    <v-card-text>
         
                      
                        <v-card flat outlined>
                              <v-card-subtitle>Total Invoice</v-card-subtitle>
                            <v-card-text class="headline red--text">
                                <v-row>
                                    <v-col cols="12" md="8">Amount Due</v-col>
                                    <v-col cols="12" md="4" class="text-right">{{currency}}{{due}}</v-col>
                                </v-row>
                            </v-card-text>
                        </v-card>
                        <div v-if="balance > 0">
                        <v-card flat outlined class="mt-5">
                            <v-card-subtitle>Funds available in your suspense account</v-card-subtitle>
                            <v-card-text class="headline green--text">
                                <v-row>
                                    <v-col cols="12" md="8">Balance</v-col>
                                    <v-col  cols="12" md="4" class="text-right">{{currency}}{{balance}}</v-col>
                                </v-row>
                            </v-card-text>
                        </v-card>
                        <v-card flat outlined class="mt-5">
                            <v-card-actions>
                                <inertia-link :href="$route('Invoicing.index')" class="white--text v-btn v-btn--has-bg v-btn--rounded theme--light v-size--default red">Back</inertia-link>
                                <v-spacer></v-spacer>
                                <v-btn rounded color="success" depressed :loading="loading" :disabled="loading" @click="processPayment">Continue</v-btn>
                            </v-card-actions>
                        </v-card>
                        </div>
                        <div class="mt-5" v-else>
                                <v-alert
                                v-model="alert"
                                border="left"
                                close-text="Close Alert"
                                color="white"
                                class="red--text"
                                dark
                                dismissible
                                v-if="balance == 0"
                                >
                                
                                <ol>
                                <li> In order for us to quickly identify your payment please enter your Bank transaction reference, for non cbz account holders this usually starts with your bank initials and for CBZ bank holders enter Host reference number from your proof of payment</li>
                                <li>For payments done using ZIPIT please enter your STANCODE as your bank reference</li>
                                <li>International Clients can enter reference from their proof of transfer</li>
                                 </ol>
                                </v-alert>

                             <v-text-field
                                v-model="referencenumber"
                                label="Reference Number"
                                outlined
                                :rules="referenceRules"
                            >                            
                            </v-text-field>  
                            <p>
                               
                            </p>

                      
                        </div>
                    </v-card-text>
                    <v-card-actions v-if="balance == 0">
                         <inertia-link :href="$route('Invoicing.index')" class="white--text v-btn v-btn--has-bg v-btn--rounded theme--light v-size--default red">Back</inertia-link>
                         <v-spacer></v-spacer>
                         <v-btn rounded depressed class="success" :loading="loading" :disabled="loading" @click="upload">Submit</v-btn>
                  
                    </v-card-actions>
                    
                     </v-card>
                </v-form>
            </v-col>
        </v-row>
    </userlayout>

</template>

<script>
import  userlayout  from '../../../Layouts/userlayout';
export  default {
    props: ['errors', 'successMessage', 'errorMessage', 'currency','balance','due'],
    components: {
        userlayout
    },data(){
        return{
            loading:false,
            disabled:true,
            value:0,
            
                menu: false,
                modal: false,
                menu2: false,
                referencenumber:'',
                referenceRules:[v=>!!v || 'Bank Reference Number Required'],
                bank:'',
                bankRules:[v=>!!v || 'Bank Name Required'],
                date: '',
                dateRules:[v=>!!v || 'transaction date Required'],
                pop:null,
                popRule:[v => !!v || 'Upload proof of payment'],
                form:true,
                alert:true,
                addPop:false,
                transfers:[]
            



        }
    },methods: {
        processPayment(){
            this.loading = true
          this.$inertia.put('/bidders/Bankpayments/1',{onSuccess:(page)=>{
           this.loading = false
          },onError:(errors)=>{
            this.loading  = false
          }}
          )
        },upload(){           
       
            this.loading = true
             var formadata = new FormData()
                    formadata.append('referencenumber',this.referencenumber)
            this.$inertia.post('/bidders/Bankpayments',formadata,{onSuccess:(page)=>{
             this.loading = false
            },onError:(errors)=>{
              this.loading = false
            }}) 
            
        }
        
    },
}
</script>

<style scoped>

</style>
