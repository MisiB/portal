<template>
    <userlayout title="Receipting">
        <v-container>
            <v-alert
                color="error"
                v-if="errorMessage"
            >
                {{errorMessage}}
            </v-alert>
            <v-alert
                class="success"
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
                     <v-row>
                         <v-col md="6" offset-md='3'>
                    <v-card class="mt-5">
                        <v-card-title class="blue white--text">
                            <div>Settle Invoice</div>
                            <v-spacer></v-spacer>
                            <inertia-link :href="$route('Invoicing.index')" class="white--text v-btn v-btn--has-bg v-btn--rounded theme--light v-size--small red">Back</inertia-link>
                        </v-card-title>
                            <v-card-text>
                                <div>
                                     <v-card class="mt-5">
                                        <v-card-text>
                                      <div class="display-1 d-flex justify-between">
                                        <div>Balance Due</div><v-spacer/> <div>{{currency}}{{balance}}</div>
                                      </div>
                                     
                                        </v-card-text>
                                    </v-card>
                                    <v-card class="mt-5">
                                        <v-card-text>
                                      <div class="display-1 d-flex justify-between">
                                        <div>Wallet Balance</div><v-spacer/> <div>{{currency}}{{wallet}}</div>
                                      </div>
                                      <div class="mt-5 text-center">
                                          <v-btn large color="success" v-if='wallet > 0' block :loading="loading" :disabled="loading" @click="settleInvoice">
                                              Settle Invoice
                                          </v-btn>
                                      </div>
                                        </v-card-text>
                                    </v-card>
                                </div>
                                <div v-if="wallet > 0">
                                
                                </div>                               
                                <div v-else>
                                <h5 class="headline mt-5 font-weight-black">Wallet Topup Options</h5>

                                <v-card v-if="currency !=='USD'" class="mt-4">
                                    <v-card-text>
                                <v-row >
                                    <v-col cols="6" sm="3">
                                        <v-img
                                        lazy-src="/img/ecocash.jpg"
                                        max-height="50"
                                        max-width="100"
                                        src="/img/ecocash.jpg"
                                    ></v-img>
                                    </v-col>
                                    <v-col cols="6" sm="6">
                                        <div class="headline">Use ecocash</div>
                                    </v-col>
                                    <v-col cols="12" sm="3" class="text-right">
                                        <inertia-link :href="$route('Mobilepayments.show','ECOCASH')" class="blue white--text v-btn v-btn--small v-btn--has-bg v-btn--rounded theme--light v-size--default">SELECT</inertia-link>

                                    </v-col>
                                </v-row>
                                    </v-card-text>
                                </v-card>
                                <v-card v-if="currency !=='USD'" class="mt-4">
                                    <v-card-text>
                                        <v-row >
                                            <v-col cols="6" sm="3">
                                                <v-img
                                                    lazy-src="/img/onemoney.jpg"
                                                    max-height="50"
                                                    max-width="100"
                                                    src="/img/onemoney.jpg"
                                                ></v-img>
                                            </v-col>
                                            <v-col cols="6" sm="6">
                                                <div class="headline">Use onemonay</div>
                                            </v-col>
                                            <v-col cols="12" sm="3" class="text-right">
                                                <inertia-link :href="$route('Mobilepayments.show','ONEMONEY')" class="blue white--text v-btn v-btn--small v-btn--has-bg v-btn--rounded theme--light v-size--default">SELECT</inertia-link>

                                            </v-col>
                                        </v-row>
                                    </v-card-text>
                                </v-card>
                                <v-card v-if="currency =='USD'" class="mt-4">
                                    <v-card-text>
                                        <v-row>
                                            <v-col cols="6" sm="3">
                                                <v-img
                                                    lazy-src="/img/visa.jpg"
                                                    max-height="50"
                                                    max-width="100"
                                                    src="/img/visa.jpg"
                                                ></v-img> 
                                            </v-col>
                                            <v-col cols="6" sm="6">
                                                <div class="headline">Use our payment gateway</div>
                                            </v-col>
                                            <v-col cols="12" sm="3" class="text-right">
                                                <inertia-link :href="$route('paynow_initiate')" class="blue white--text v-btn v-btn--small v-btn--has-bg v-btn--rounded theme--light v-size--default">SELECT</inertia-link>

                                               
                                            </v-col>
                                        </v-row>
                                    </v-card-text>
                                </v-card>
                                <v-card class="mt-4">
                                    <v-card-text>
                                        <v-row>
                                            <v-col cols="6" sm="3">
                                                <v-img
                                                    lazy-src="/img/upload.jpg"
                                                    max-height="50"
                                                    max-width="100"
                                                    src="/img/upload.jpg"
                                                ></v-img>
                                            </v-col>
                                            <v-col cols="6" sm="6">
                                                <div class="headline">Use bank payments</div>
                                            </v-col>
                                            <v-col cols="12" sm="3" class="text-right">
                                                  <inertia-link :href="$route('Bankpayments.index')" class="blue white--text v-btn v-btn--small v-btn--has-bg v-btn--rounded theme--light v-size--default">SELECT</inertia-link>

                                           
                                            </v-col>
                                        </v-row>
                                    </v-card-text>
                                </v-card>
                                </div>
                            </v-card-text>

                            </v-card>
                            </v-col>
                            </v-row>

              
        </v-container>
    </userlayout>
</template>
<script>
import  userlayout  from '../../../Layouts/userlayout';
import Vue from 'vue'
export  default {
    props: ['errors', 'successMessage', 'errorMessage', 'documents', 'invoices', 'totalinvoiced', 'totalreceipted','currency','link','balance','wallet'],
    components: {
        userlayout
    },data(){
        return{
            loading:false
        }
    },methods: {
        settleInvoice(){
            Vue.swal({
                    title: 'Are you sure?',
                    text: "You want to utilize your wallet balance to settle invoice ",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Use'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.loading= true
                       this.$inertia.get(this.$route('payment.show','1'),{onSuccess:()=>{

                           if(this.successMessage){
                               Vue.swal('Success',this.successMessage,'success')
                           }
                           if(this.errorMessage){
                                  Vue.swal('Error',this.errorMessage,'error')
                           }
                        this.loading = false
                        },onError:()=>{
                        this.loading = false
                        if(this.errorMessage){
                                  Vue.swal('Error',this.errorMessage,'error')
                           }
                        }})
                    
                    }else{
                        this.loading = false
                    }
                 }) 
        }
    },
}
</script>


