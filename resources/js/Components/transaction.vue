<template>
    <div>
       <v-btn small depressed color="primary" @click="showModel=true">View</v-btn>
       <v-dialog v-model="showModel" fullscreen>
           <v-card>
               <v-card-title>
                  <div>Transactions</div>
                  <v-spacer/>
                   <v-btn small depressed color="error"  @click="showModel=false">Close</v-btn>
                </v-card-title>
               <v-card-text>
                    <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                   <th>Date</th>
                                   <th>Description</th>
                                   <th>Source Reference</th>
                                   <th>Statement Reference</th>
                                   <th>Account number</th>
                                   <th>Claimee Reg </th>
                                   <th>Claimee Name </th>
                                   <th>Status</th>
                                   <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                              <tr>
                                  <td>{{data.trans_date}}</td>
                                  <td>{{data.description}}</td>
                                  <td>{{data.source_reference}}</td>
                                  <td>{{data.statement_reference}}</td>
                                  <td>{{data.accountnumber}}</td>
                                  <td>
                                      <template v-if="data.company">
                                     <div>{{data.company.regnumber}}</div>
                                      </template>
                                      <template v-else>
                                            <div>----</div>
                                      </template>
                                  </td>
                                  <td>
                                        <template v-if="data.company">
                                     <div>{{data.company.name}}</div>
                                      </template>
                                      <template v-else>
                                            <div>----</div>
                                      </template>
                                  </td>
                                  <td>
                                      {{data.status}}
                                  </td>
                                  <td>
                                      {{data.currency}}
                                      {{data.amount}}
                                  </td>
                              </tr>
                             
                            </tbody>
                            </template>
                            </v-simple-table>
                            <div class="headline mt-4 mb-4">Suspense Statement</div>
                            <div v-if="data.suspense">
                             <v-expansion-panels>
                                <v-expansion-panel>
                                <v-expansion-panel-header>
                                 <v-simple-table>
                                   <template v-slot:default>
                                    <tr>
                                         <td>
                                            {{data.suspense.updated_at | formatDate}}
                                        </td>
                                        <td>
                                            {{data.suspense.accountnumber}}
                                        </td>
                                        <td>
                                            {{data.suspense.currency}}{{data.suspense.amount}}
                                        </td>
                                        <td>
                                          {{data.suspense.status}}
                                        </td>
                                    </tr>
                                    </template>
                                 </v-simple-table>
                                </v-expansion-panel-header>
                                <v-expansion-panel-content>
                                   
                                   <div class="headline mt-4 mb-4">Suspense Receipts</div>
                                      <v-expansion-panels>
                                <v-expansion-panel v-for="suspensereceipt in data.suspense.suspense_receipts" :key="suspensereceipt.id">
                                <v-expansion-panel-header>
                                 <v-simple-table>
                                   <template v-slot:default>
                                    <tr>
                                         <td>
                                            {{suspensereceipt.updated_at | formatDate}}
                                        </td>
                                        <td>
                                            {{suspensereceipt.receiptnumber}}
                                        </td>
                                        <td>
                                          {{suspensereceipt.uuid}}
                                        </td>
                                        <td>
                                          {{suspensereceipt.currency}}{{suspensereceipt.amount}}
                                        </td>
                                    </tr>
                                    </template>
                                 </v-simple-table>
                                </v-expansion-panel-header>
                                <v-expansion-panel-content>
                                    <div class="headline mt-4 mb-4">Settled Receipt</div>
                                    <v-expansion-panels>
                                        <v-expansion-panel>
                                        <v-expansion-panel-header>
                                            <v-simple-table>
                                              <template v-slot:default>
                                    <tr>
                                         <td>
                                            {{suspensereceipt.receipt.updated_at | formatDate}}
                                        </td>
                                        <td>
                                            {{suspensereceipt.receipt.receiptnumber}}
                                        </td>
                                        <td>
                                          {{suspensereceipt.receipt.invoicenumber}}
                                        </td>
                                        <td>
                                         {{suspensereceipt.receipt.type}}
                                        </td>
                                        <td>
                                         {{suspensereceipt.receipt.description}}
                                        </td>
                                         <td>
                                         {{suspensereceipt.receipt.method}}
                                        </td>
                                        <td>
                                         {{suspensereceipt.receipt.currency}}{{suspensereceipt.receipt.amount}}
                                        </td>
                                    </tr>
                                    </template>
                                 </v-simple-table>
                                        </v-expansion-panel-header>
                                        <v-expansion-panel-content>
                                           
                                           <v-card>
                                               <v-card-title class="primary">
                                                   Registration Invoice Details
                                               </v-card-title>
                                               <v-card-text>
                                                   <v-simple-table>
                                                    <template v-slot:default>
                                                         <tbody>
                                                             <template v-if="suspensereceipt.receipt.supplierinvoices.length > 0">
                                                                 <tr v-for="invoice in suspensereceipt.receipt.supplierinvoices" :key="invoice.id">
                                                                     <td>{{invoice.updated_at | formatDate}}</td>
                                                                     <td>{{invoice.invoice_number}}</td>
                                                                     <td>{{invoice.category.code}}</td>
                                                                     <td>{{invoice.year}}</td>
                                                                     <td>{{invoice.status}}</td>
                                                                     <td>{{invoice.currency.name}}</td>
                                                                     <td>{{invoice.cost}}</td>

                                                                 </tr>
                                                             </template>
                                                             <template v-else>
                                                               <tr>
                                                                   <td colspan="6" class="text-center red--text"> No Suppliers invoices</td>
                                                               </tr>
                                                             </template>
                                                            
                                                         </tbody>
                                                    </template>
                                                    </v-simple-table>
                                               </v-card-text>

                                           </v-card>

                                            <v-card class="mt-4">
                                               <v-card-title class="success">
                                                   Tender Invoice Details
                                               </v-card-title>
                                               <v-card-text>
                                                     <v-simple-table>
                                                    <template v-slot:default>
                                                         <tbody>
                                                             <template v-if="suspensereceipt.receipt.tenderinvoices.length > 0">
                                                                 <tr v-for="tenderinvoice in suspensereceipt.receipt.tenderinvoices" :key="tenderinvoice.id">
                                                                     <td>{{tenderinvoice.updated_at | formatDate}}</td>
                                                                     <td>{{tenderinvoice.tendernumber}}</td>
                                                                     <td>{{tenderinvoice.type}}</td>
                                                                     <td>{{tenderinvoice.description}}</td>
                                                                     <td>{{tenderinvoice.currency.name}}{{tenderinvoice.amount}}</td>
                                                                     <td>{{tenderinvoice.status}}</td>
                                                                     <td>
                                                                       <v-btn small depressed color="primary" @click="getTenderInfo(tenderinvoice.id)">View</v-btn>
                                                                     </td>

                                                                 </tr>
                                                             </template>
                                                             <template v-else>
                                                               <tr>
                                                                   <td colspan="6" class="text-center red--text"> No tender invoices</td>
                                                               </tr>
                                                             </template>
                                                            
                                                         </tbody>
                                                    </template>
                                                    </v-simple-table>
                                               </v-card-text>

                                           </v-card>
                                           
                                        </v-expansion-panel-content>
                                        </v-expansion-panel>
                                    </v-expansion-panels>


                                </v-expansion-panel-content>
                                </v-expansion-panel>
                            </v-expansion-panels>
                                   
                                </v-expansion-panel-content>
                                </v-expansion-panel>
                            </v-expansion-panels>
                            </div>
                            <div v-else>
                                <v-alert  color="red lighten-2">Not found in suspense wallet</v-alert>
                            </div>




                            <div v-if="data.receipts.length>0">

                                <div class="headline mt-4 mb-4">Direct Receipts</div>
                                     <v-simple-table>
                                              <template v-slot:default>
                                    <tr v-for="receipt in data.receipts" :key="receipt.id">
                                         <td>
                                            {{receipt.updated_at | formatDate}}
                                        </td>
                                        <td>
                                            {{receipt.receiptnumber}}
                                        </td>
                                        <td>
                                          {{receipt.invoicenumber}}
                                        </td>
                                        <td>
                                         {{receipt.type}}
                                        </td>
                                        <td>
                                         {{receipt.description}}
                                        </td>
                                         <td>
                                         {{receipt.method}}
                                        </td>
                                        <td>
                                         {{receipt.currency}}{{receipt.amount}}
                                        </td>
                                    </tr>
                                    </template>
                                 </v-simple-table>
                            </div>
               </v-card-text>
            </v-card>
            </v-dialog>

             <v-dialog v-model="showPop" max-width="600">
           <v-card>
               <v-card-title>
                  <div>Transactions</div>
                  <v-spacer/>
                   <v-btn small depressed color="error"  @click="showModel=false">Close</v-btn>
                </v-card-title>
               <v-card-text>
                    <v-simple-table>
                     <template v-slot:default>
                         <thead>
                             <tr>
                                 <th>Entity</th>
                                 <th>Tendernumber</th>
                                 <th>Amount</th>
                             </tr>
                         </thead>
                        <tbody>
                           <tr v-for="trans in transactions" :key="trans.id">
                               <td>{{trans.entity.name}}</td>
                                <td>{{trans.tendernumber}}</td>
                                <td>{{trans.amount}}</td>
                           </tr>
                        </tbody>
                     </template>
                    </v-simple-table>

               </v-card-text>
           </v-card>
      </v-dialog>
    </div>
 </template>
 <script>
import tenderinfo from './tenderinfo.vue'
 export default {

        props:['data','transactions','errors','errorMessage','successMessage'],
        components:{
        tenderinfo
        },
       data(){
           return{
            showModel:false,
            showPop:false,
            filter:'',
            loading:false,
            tenderdata:[],
           }
       },methods:{
        getTenderInfo(id){
          window.open('/administrator/report-bankttransactions-audit/'+id,'popUpWindow','height=700,width=700,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes')
        }
    
       }
 }
 </script>