<template>
    <userlayout title="Invoicing">
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

            <v-card class="mt-5">
                <v-card-title>
                    <v-row  class="pa-3">
                        <v-col cols="12" md="10"><div class="title">Invoicing</div></v-col>
                        <v-col cols="12" md="2">
                            <inertia-link class="white--text v-btn v-btn--block v-btn--has-bg v-btn--rounded theme--light v-size--small blue" :href="$route('Invoicing.create')">Choose Category</inertia-link>
                        </v-col>
                    </v-row>
                </v-card-title>
                <v-divider></v-divider>
                <v-card-text>
                    <div v-if="invoices.length >0">
                    <div v-for="inv in invoices" :key="inv.id">
                    <v-row class="mb-1 mt-1">
                        <v-col cols="12" sm="2">
                            <div class="grey--text"><small>Date</small></div>
                            <div class="black--text">{{inv.created_at|formatDate}}</div>
                        </v-col>
                        <v-col cols="12" sm="5">
                            <div class="grey--text">
                                <small>{{inv.category.name}}</small>
                            </div>
                            <div class="black--text">{{inv.category.code}}</div>

                        </v-col>
                        <v-col cols="6" sm="2">
                            <div class="grey--text">
                                <small>Invoice number</small>
                            </div>
                            <div class="black--text">{{inv.invoice_number}}</div>
                        </v-col>
                        <v-col cols="6" sm="3" class="text-right">

                            <div><small>{{inv.currency.name}}</small> {{inv.cost}} <v-btn small fab color="error" rounded depressed @click="deleteInv(inv.id,inv.category.code)"><v-icon>mdi-close</v-icon></v-btn></div>

                        </v-col>

                    </v-row>
                    <v-divider></v-divider>

                    </div>
                    <v-row class="mt-4">
                        <v-col  sm="10"><div class="title">Total Due</div></v-col>
                        <v-spacer></v-spacer>
                        <v-col  sm="2" class="text-right">
                            <div class="headline"><small>{{invoices[0].currency.name}}</small> {{totalinvoiced}}</div>
                        </v-col>
                    </v-row>
                    <v-divider></v-divider>
                    <v-row class="mt-4">
                        <v-col  sm="10"><div class="title">Total Paid</div></v-col>
                        <v-spacer></v-spacer>
                        <v-col  sm="2" class="text-right">
                            <div class="headline"><small>{{invoices[0].currency.name}}</small> {{totalreceipted}}</div>

                        </v-col>

                    </v-row>
                    <v-divider></v-divider>
                    <v-row class="mt-4">
                        <v-col  sm="10"><div class="title">Balance</div></v-col>
                        <v-spacer></v-spacer>
                        <v-col  sm="2" class="text-right">
                            <div class="headline"><small>{{invoices[0].currency.name}}</small> {{totalinvoiced-totalreceipted}}</div>

                        </v-col>

                    </v-row>
                    <v-divider></v-divider>
                    </div>
                    <div v-else class="pa-lg-16">
                           <p class=" pa-10 red lighten-5 red--text text-center">
                            No items added to invoice as yet
                          </p>

                    </div>
                </v-card-text>
                <v-card-actions v-if="invoices.length >0">
                        <v-btn color="blue" depressed class="white--text" large link :href="$route('Invoicing.show',invoices[0].invoice_number)"  :loading="loading" :disabled="loading">Print Invoice</v-btn>
                    <v-spacer></v-spacer>
                    <inertia-link class="v-btn v-btn--is-depressed v-btn--has-bg theme--light v-size--default  success"  :href="$route('payment')">Make Payment</inertia-link>
                </v-card-actions>
            </v-card>
        </v-container>
        <v-dialog max-width="400" v-model="confirmDelete">
            <v-card>
                <v-card-title>Confirm Delete</v-card-title>
                <v-card-text>
                    <div>Are you sure you want to delete {{code}}  from your invoice</div>
                </v-card-text>
                <v-card-actions>
                    <v-btn rounded depressed color="red" class="white--text" @click="confirmDelete=false">Cancel</v-btn>
                    <v-spacer></v-spacer>
                    <v-btn rounded depressed color="green" class="white--text" @click="deleteInv()" :loading="loading" :disabled="loading">Confirm</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </userlayout>
</template>
<script>
import  userlayout  from '../../../Layouts/userlayout';
import Vue from 'vue'
export  default {
    props: ['errors','successMessage','errorMessage','documents','invoices','totalinvoiced','totalreceipted','wallet','balance'],
    components: {
        userlayout
    },
    data(){
        return {
           loading:false,
           code:'',
           id:'',
           confirmDelete:false
        }

    },methods:{
        printInvoice(inv){
         window.open(this.$route('Invoicing.show',$inv), '_blank')

        },deleteInv(id,code){
               Vue.swal({
                    title: 'Are you sure?',
                    text: "You want to delete "+code,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.loading= true
                       this.$inertia.delete(this.$route('Invoicing.destroy',id),{onSuccess:()=>{
                        this.loading = false
                        },onError:()=>{
                        this.loading = false
                        }})
                    
                    }else{
                        this.loading = false
                    }
                 }) 
           
        }
    }
}
</script>

