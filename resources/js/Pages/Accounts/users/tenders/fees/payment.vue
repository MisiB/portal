<template>
    <userlayout title="Tender Fees">
        <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('dashboard')" >Dashboard</v-btn> 
                        <v-btn text link :href="$route('Mytenders.index')" >Tender list</v-btn>
                        <v-btn text link disabled>Tender Invoice</v-btn>
                    </div>
                </v-card-text>
            </v-card>
                   <v-alert
                   class="mt-4"
                color="red lighten-2"
                dark
                v-if="errorMessage"
            >
                {{errorMessage}}
            </v-alert>
            <v-alert
            class="mt-4"
                color="green lighten-2"
                dark
                v-if="successMessage"
            >
                {{successMessage}}
            </v-alert>
            <v-card flat class="mt-5">
                <v-card-title>
                    <div>Tender Fees Invoice</div>
                    <v-spacer/>
                    <v-btn color="error" @click="deleteInvoice" :loading="loading" :disabled="loading">Delete</v-btn>
                   
                </v-card-title>
                <v-divider/>
                <v-card-text>
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
                                <small>{{inv.type}}</small>
                            </div>
                            <div class="black--text">{{inv.description}}</div>

                        </v-col>
                        <v-col cols="6" sm="2">
                            <div class="grey--text">
                                <small>Invoice number</small>
                            </div>
                            <div class="black--text">{{inv.invoice_number}}</div>
                        </v-col>
                        <v-col cols="6" sm="3" class="text-right">

                            <div class="subtitle-1">{{inv.currency.name}} {{inv.amount}} </div>

                        </v-col>

                    </v-row>
                    <v-divider></v-divider>

                    </div>
                      <v-row class="mt-4">
                        <v-col  sm="10"><div class="title">Total Due</div></v-col>
                        <v-spacer></v-spacer>
                        <v-col  sm="2" class="text-right">
                            <div class="headline"><small>{{invoices[0].currency.name}}</small> {{totalDue}}</div>
                        </v-col>
                    </v-row>
                    <v-divider></v-divider>
                    <v-row class="mt-4">
                        <v-col  sm="10"><div class="title">Total Paid</div></v-col>
                        <v-spacer></v-spacer>
                        <v-col  sm="2" class="text-right">
                            <div class="headline"><small>{{invoices[0].currency.name}}</small> {{totalPaid}}</div>

                        </v-col>

                    </v-row>
                   
                    </div>
                    <div v-else class="pa-lg-16">
                           <p class=" pa-10 red lighten-5 red--text text-center">
                            No items added to invoice as yet
                          </p>

                    </div>
                </v-card-text>
                <v-card-actions v-if="invoices.length >0">
                    
                        <v-btn color="blue" depressed class="white--text"  link :href="$route('Tenderpayment.show',invoices[0].invoice_number)"  :loading="loading" :disabled="loading">Print Invoice</v-btn>
                          <v-spacer></v-spacer>
                        <v-btn color="success" depressed class="white--text"  link :href="$route('Tenderpayment.edit','REFUNDABLE')" v-if="invoices[0].type=='REFUNDABLE'"  :loading="loading" :disabled="loading">PAY INVOICE</v-btn>
                        <v-btn color="success" depressed class="white--text"  link :href="$route('Tenderpayment.edit','NONREFUNDABLE')" v-else :loading="loading" :disabled="loading">PAY INVOICE</v-btn>
                    
                     </v-card-actions>
                   
                </v-card-text>
            </v-card>
          
        </v-container> 
        
                
    </userlayout> 
        
                
</template>
<script>
import  userlayout  from '../../../../Layouts/userlayout'
export  default {
    props: ['errors','successMessage','errorMessage','invoices','totalDue','totalPaid'],
    components: {
        userlayout
    },data(){
        return{
         loading:false

        }
    },methods:{ 
       deleteInvoice(){
             this.loading = true
            this.$inertia.delete('/bidders/Tenderpayment/'+this.invoices[0].invoice_number,{onSuccess:()=>{
              this.loading = false
               this.confirmDelete=false
            },onError:()=>{
              this.loading = false
            }})
       }
    },computed:{

    }
}
</script>