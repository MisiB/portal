<template>
    <userlayout title="Payments Report">
        <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('dashboard')" >Dashboard</v-btn> <v-btn text link disabled>Payments</v-btn>
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
                      <v-tabs v-model="tab">
                    <v-tab><v-icon class="mr-2">mdi-credit-card-check</v-icon> Payments</v-tab>
                    <v-tab><v-icon class="mr-2">mdi-bank-check</v-icon>Bank Payments</v-tab>
                </v-tabs>
                </v-card-title>
                <v-card-text>
                
                <v-tabs-items v-model="tab">
                    <v-tab-item>
                         <v-simple-table>
                       <template v-slot:default>
                           <thead>
                               <tr>
                                   <th>Date</th>
                                   <th>Invoice Number</th>
                                   <th>Mode</th>
                                   <th>Amount</th>
                                   <th>Status</th>
                                   <th></th>
                               </tr>
                           </thead>
                           <tbody>
                               <template v-if="onlinepayments.length>0">
                                   <tr v-for="pay in onlinepayments" :key="pay.id" class="pt-2 pb-2">
                                       <td>{{pay.created_at | formatDate}}</td>
                                       <td>{{pay.invoice_number}}</td>
                                       <td>{{pay.mode}}</td>
                                       <td>{{pay.amount}}</td>
                                       <td>{{pay.status}}</td>
                                       <td> 
                                           <v-btn small rounded depressed color="primary" v-if="pay.status !='paid'" @click="checkPayment(pay.id)">check</v-btn>                                          
                                      </td>
                                   </tr>
                               </template>
                               <template v-else>
                                  <tr>
                                      <td colspan="6" class="text-center red-text">No Online payments found as yet</td>
                                  </tr>
                               </template>
                           </tbody>
                       </template>
                   </v-simple-table>
                    </v-tab-item>
                      <v-tab-item>
                         <v-simple-table>
                       <template v-slot:default>
                           <thead>
                               <tr>
                                   <th>Date</th>
                                   <th>Reference Number</th>
                                   <th>Account</th>
                                   <th>Amount</th>
                                   <th>Status</th>
                                   <th></th>
                               </tr>
                           </thead>
                           <tbody>
                               <template v-if="bankpayments.length>0">
                                   <tr v-for="bank in bankpayments" :key="bank.id" class="pt-2 pb-2">
                                       <td>{{bank.trans_date}}</td>
                                       <td>{{bank.source_reference}}</td>
                                       <td>{{bank.accountnumber}}</td>
                                       <td>{{bank.currency}}{{bank.amount}}</td>
                                       <td>{{bank.status}}</td>
                                       <td class="d-flex">                                           
                                      </td>
                                   </tr>
                               </template>
                               <template v-else>
                                  <tr>
                                      <td colspan="6" class="text-center red-text">No Bank payments found as yet</td>
                                  </tr>
                               </template>
                           </tbody>
                       </template>
                   </v-simple-table>
                    </v-tab-item>
                </v-tabs-items>
                </v-card-text>
            </v-card>
        </v-container>

      
    </userlayout>         
                
</template>
<script>
import  userlayout  from '../../../Layouts/userlayout'
import Vue from 'vue'
export  default {
    props: ['errors','successMessage','errorMessage','bankpayments','onlinepayments'],
    components: {
        userlayout
    },data(){
        return{
            loading:false,
            tab: null,    

        }
    },methods:{     
      checkPayment(id){
          this.$inertia.get(this.$route('reportPayments.show',id),{
             onSuccess:(page)=>{
                 if(this.successMessage){
                     Vue.swal('Success',this.successMessage,'success')
                 }
                 if(this.errorMessage){
                     Vue.swal('Error',this.errorMessage,'error')
                 }
             }
          })
      }
    }
}
</script>