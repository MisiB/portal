<template>
    <div>
        
                 <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th>Create date</th>
                                     <th>Update date</th>
                                    <th>Invoice number</th>
                                    <th>Category</th>
                                    <th>Year</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="invoices.length >0">
                                <tr v-for="invoice in invoices" :key="invoice.id">
                                     <td>
                                       {{invoice.created_at | formatDate}}
                                    </td>
                                    <td>
                                       {{invoice.updated_at | formatDate}}
                                    </td>
                                     <td>
                                       {{invoice.invoice_number}}
                                    </td>
                                     <td>
                                         <div>
                                       {{invoice.category.code}}
                                         </div>
                                         <div>
                                       <small>{{invoice.category.name}}</small>
                                         </div>
                                    </td>
                                     <td>
                                       {{invoice.year}}
                                    </td>
                                     <td>
                                       {{invoice.status}}
                                    </td>
                                     <td>
                                       {{invoice.currency.name}}{{invoice.cost}}
                                    </td>
                                    <td><v-btn depressed rounded color="primary" small @click="showInfo(invoice)">View</v-btn></td>
                                </tr>
                                </template>
                                <template v-else>
                                  <tr><td colspan="6" class="pa-5 text-center red--text"> No Invoices found</td></tr>
                                </template>
                            </tbody>
                        </template>
                    </v-simple-table>
          
         <v-dialog max-width="900" v-model="viewDialog">
             <v-card>
                 <v-card-title><div>Invoice</div><v-spacer/><v-btn icon @click="viewDialog=false"><v-icon>mdi-close</v-icon></v-btn></v-card-title>
                 <v-card-text>
                     <v-card>
                         <v-card-title color="green">
                     <div class="title">Receipts</div>
                         </v-card-title>
                         <v-card-text>
                     <v-simple-table>
                         <template v-slot:default>
                             <thead>
                             <tr>
                                 <th>Date</th>
                                 <th>Receipt number</th>
                                 <th>Method</th>
                                 <th>Amount</th>
                             </tr>
                             </thead>
                             <tbody>
                                 <template v-if="inv.receipts.length>0">
                                <tr v-for="receipt in inv.receipts" :key="receipt.id">
                                   <td>{{receipt.created_at | formatDate}}</td>
                                   <td>{{receipt.receiptnumber}}</td>
                                   <td>{{receipt.method}}</td>
                                   <td>{{receipt.currency}}{{receipt.amount}}</td>
                                </tr>
                                 </template>
                                 <template v-else>
                                  <tr>
                                      <td colspan="4" class="red--text text-center">No receipts found</td>
                                  </tr>
                                 </template>

                             </tbody>

                         </template>
                     </v-simple-table>
                         </v-card-text>
                     </v-card>
                     <v-card class="mt-4">
                         <v-card-title>
                     <div class="title">Online Payments</div>
                         </v-card-title>
                         <v-card-text>
                       <v-simple-table>
                         <template v-slot:default>
                             <thead>
                             <tr>
                                 <th>Date</th>
                                 <th>Mode</th>
                                 <th>Status</th>
                                 <th>Amount</th>
                             </tr>
                             </thead>
                             <tbody>
                                 <template v-if="inv.onlinepayments.length>0">
                                <tr v-for="onlinepayment in inv.onlinepayments" :key="onlinepayment.id">
                                   <td>{{onlinepayment.created_at | formatDate}}</td>
                                   <td>{{onlinepayment.mode}}</td>
                                   <td>{{onlinepayment.status}}</td>
                                   <td>{{onlinepayment.amount}}</td>
                                </tr>
                                 </template>
                                 <template v-else>
                                  <tr>
                                      <td colspan="4" class="red--text text-center">No Online payments found found</td>
                                  </tr>
                                 </template>

                             </tbody>

                         </template>
                     </v-simple-table>
                         </v-card-text>
                     </v-card>

                     <v-card class="mt-4">
                         <v-card-title>
                        <div class="title mt-4">Bank Reference numbers</div>
                         </v-card-title>
                         <v-card-text>
                       <v-simple-table>
                         <template v-slot:default>
                             <thead>
                             <tr>
                                 <th>Date</th>
                                 <th>Reference number</th>
                                 <th>Description</th>
                                 <th>Amount</th>
                                 <th>Company</th>
                                 <th>Status</th>
                             </tr>
                             </thead>
                             <tbody>
                                 <template v-if="inv.transfers.length>0">
                                <tr v-for="transfer in inv.transfers" :key="transfer.id">
                                   <td>{{transfer.created_at | formatDate}}</td>
                                   <td>{{transfer.referencenumber}}</td>
                                    <template v-if="transfer.bank">
                                      <td>
                                       {{transfer.bank.description}}    
                                      </td>
                                      <td>
                                       {{transfer.bank.currency}}  {{transfer.bank.amount}} 
                                      </td>
                                      <td>
                                          <template v-if="transfer.bank.company">
                                          {{transfer.bank.company.name}} 
                                          </template>
                                          <template v-else class="text-center red--text">
                                            Not Found
                                          </template>
                                      </td>
                                      <td>
                                        {{transfer.bank.status}} 
                                      </td>
                                    </template>
                                    <template v-else>
                                        <td colspan="4" class="text-center red--text">Reference number not found</td>
                                    </template>
                                </tr>
                                 </template>
                                 <template v-else>
                                  <tr>
                                      <td colspan="6" class="red--text text-center">No Bank references found found</td>
                                  </tr>
                                 </template>

                             </tbody>

                         </template>
                     </v-simple-table>
                         </v-card-text>
                     </v-card>
                 </v-card-text>
             </v-card>
         </v-dialog>
    </div>
</template>
<script>
export default {
    props:['invoices'],
    data() {
        return {
             inv:"",
             viewDialog:false

        }
    },
    methods:{
       showInfo(invoice){
        this.inv = invoice
        this.viewDialog = true
       }
    },
    computed:{
     invoiceSummary(){

         var totalinvoices = 0;

         this.invoices.forEach((invoice)=>{
             totalinvoices = totalinvoices+invoice.cost;
         })
         return totalinvoices;
     }
    },
    receiptSummary(){
       var totalreceipts = 0;
       
       if(this.invoices[0].receipts.length>0){
          this.invoices[0].receipts.forEach((receipt)=>{
              totalreceipts = totalreceipts+receipt.amount
          })     
       }

       return totalreceipts;
    }



}
</script>