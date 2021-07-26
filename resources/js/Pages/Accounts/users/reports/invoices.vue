<template>
    <userlayout title="Invoices Report">
        <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('dashboard')" >Dashboard</v-btn> <v-btn text link disabled>Invoices</v-btn>
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
                <v-card-text>
                   <v-simple-table>
                       <template v-slot:default>
                           <thead>
                               <tr>
                                   <th>Date</th>
                                   <th>Invoice Number</th>
                                   <th>Description</th>
                                   <th>Amount</th>
                                   <th>Status</th>
                                   <th></th>
                               </tr>
                           </thead>
                           <tbody>
                               <template v-if="invoices.length>0">
                                   <tr v-for="inv in invoices" :key="inv.id" class="pt-2 pb-2">
                                       <td>{{inv.created_at | formatDate}}</td>
                                       <td>{{inv.invoice_number}}</td>
                                       <td>{{inv.category.name}}</td>
                                       <td>{{inv.currency.name}}{{inv.cost}}</td>
                                       <td>{{inv.status}}</td>
                                       <td class="d-flex">                                           
                                           <v-btn color="green" depressed class="white--text mt-1" small link :href="$route('Invoicing.show',inv.invoice_number)" v-if="inv.status !='CANCELLED'">Print Invoice</v-btn>
                                           <v-btn color="blue" depressed class="white--text mt-1 mb-1" small link :href="$route('reportInvoices.show',inv.invoice_number)">Check</v-btn>
                                            <v-btn  depressed v-if="inv.receipts.length >0" small class="mt-1 mb-1 ml-2" link :href="$route('reportReceipts.show',inv.invoice_number)">Print receipts</v-btn>
                                       </td>
                                   </tr>
                               </template>
                               <template v-else>
                                  <tr>
                                      <td colspan="6" class="text-center red-text">No invoices found as yet</td>
                                  </tr>
                               </template>
                           </tbody>
                       </template>
                   </v-simple-table>
                </v-card-text>
            </v-card>
        </v-container>

        <v-dialog v-model="receiptModel" max-width="800">
           <v-card>
            <v-card-title>
                <div>Receipts</div>
                <v-spacer/>
                <v-btn icon @click="receiptModel=false"><v-icon>mdi-close</v-icon></v-btn>
            </v-card-title>
            <v-card-text>
                 <v-simple-table>
                       <template v-slot:default>
                           <thead>
                               <tr>
                                   <th>Date</th>
                                   <th>Recipt Number</th>
                                   <th>Type</th>
                                   <th>Method</th>
                                   <th>Amount</th>
                                   <th></th>
                               </tr>
                           </thead>
                           <tbody>
                               <tr v-for="rcpt in receipts" :key="rcpt.id">
                                   <td>{{rcpt.created_at | formatDate}}</td>
                                     <td>{{rcpt.receiptnumber}}</td>
                                      <td>{{rcpt.type}}</td>
                                      <td>{{rcpt.method}}</td>
                                      <td>{{rcpt.currency}}{{rcpt.amount}}</td>
                                      <td>
                                           <v-btn color="green" depressed class="white--text mt-1" small link :href="$route('reportReceipts.show',rcpt.receiptnumber)">Print</v-btn>
                                        
                                      </td>
                               </tr>
                           </tbody>
                       </template>
                 </v-simple-table>
            </v-card-text>
           </v-card>   
        </v-dialog>    
    </userlayout>         
                
</template>
<script>
import  userlayout  from '../../../Layouts/userlayout'
export  default {
    props: ['errors','successMessage','errorMessage','user','invoices'],
    components: {
        userlayout
    },data(){
        return{
            loading:false ,
            receiptModel:false ,
            receipts:[]     

        }
    },methods:{     
      openReceipts(receipts){
          this.receiptModel = true
          this.receipts = receipts
      }

    }
}
</script>
