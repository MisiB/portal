<template>
       <userlayout title="Invoices Awaiting">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn>  <v-btn text link :href="$route('admin.home')" >Invoices</v-btn><v-btn text link disabled>Invoices Awaiting Verification</v-btn>
                    </div>
                </v-card-text>
            </v-card>               
             <v-card flat class="mt-4">
                 <v-card-title>
                      Receipting                 
                 </v-card-title>
                 <v-divider/>
                <v-card-text>
                  <v-simple-table>
                    <template v-slot:default>
                     
                        <tbody>
                            <tr>
                                <th>
                                    Date  
                                </th>
                                 <td>
                                {{invoice.created_at|formatDate}}
                                </td>
                            </tr>
                            <tr>
                                <th>Invoice number</th>
                              <td>
                              {{invoice.invoice_number}}
                             </td>
                            </tr> 
                            <tr>
                                <th>
                                    Description
                                </th>                            
                              <td>
                                 {{invoice.description}}
                             </td>
                            </tr>
                            <tr class="red--text">
                                <th>
                                 Amount Due
                                </th>
                             <td>
                                {{invoice.currency.name}} {{invoice.amount}}
                             </td>
                            </tr>
                            <tr class="green--text">
                                <th>
                                 Receipted
                                </th>
                             <td>
                                {{invoice.currency.name}} {{receipted}}
                             </td>
                            </tr>
                           
                        </tbody>
                    </template>
                 </v-simple-table>
                 <v-card :class="walletclass">
                     <v-card-text>
                 <div class="display-1 mt-5 d-flex">
                     <div>Wallet Balance</div>
                     <v-spacer></v-spacer>
                     <div>{{invoice.currency.name}}{{wallet}}</div>
                </div>
                <div v-if="wallet > 0">
                    <v-btn color="primary" rounded depressed @click="settleInvoice">SETTLE INVOICE</v-btn>
                </div>
                     </v-card-text>
                 </v-card>

                 <v-card class="mt-5">
                    <v-card-title>Rtgs Uploads</v-card-title>
                    <v-card-text>
                         <v-simple-table>
                    <template v-slot:default>
                        <thead>
                            <tr>
                                <th>
                                    Date
                                </th>
                                <th>
                                    Invoice No
                                </th>
                                <th>
                                    Bank
                                </th>
                                <th>

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="rtg in invoice.rtgs" :key="rtg.id" class="pt-2 pb-2">
                              <td>{{rtg.created_at | formatDate}}</td>
                              <td>{{rtg.invoice_number}}</td>
                              <td>{{rtg.name}}</td>
                              <td>
                                 <v-btn small rounded color="primary" @click="download(rtg.id)" depressed>Download</v-btn> 
                                 <v-btn small depressed rounded color="success" @click="showDialog(rtg.id)">Verify</v-btn>
                                 
                                
                              </td>
                            </tr>
                        </tbody>

                    </template>
                </v-simple-table>
                    </v-card-text>
                 </v-card>

                    
                </v-card-text>
           
             </v-card>
            
            <v-dialog v-model="dialogVerify" max-width="900">
                <v-card>
                    <v-card-title>

                    </v-card-title>
                    <v-card-text>
                            <v-row>
                              <v-col cols="12">
                                  <v-text-field
                            v-model="filter"
                            placeholder="Search"
                            dense
                            outlined
                            v-on:keyup.enter="filterData"
                            >
                         </v-text-field>
                              </v-col>
                          </v-row>
                           <v-row>
                              <v-col cols="12">
                                  <v-simple-table dense>
                                      <template v-slot:default>
                                          <tbody>
                                              <template v-if="transactions.length>0">
                                              <tr v-for="transaction in transactions" :key="transaction.id">
                                                  <td>{{transaction.trans_date}}</td>
                                                  <td>{{transaction.description}}</td>
                                                  <td>{{transaction.source_reference}}</td>
                                                  <td>{{transaction.accountnumber}}</td>
                                                  <td>{{transaction.status}}</td>
                                                  <td>{{transaction.currency}}{{transaction.amount}}</td>
                                                  <td>
                                                    <v-btn small depressed color="primary" v-if="transaction.status=='PENDING'" @click="processRtgs(transaction.id)">Use</v-btn>  
                                                  </td>
                                              </tr>
                                              </template>
                                              <template v-else>
                                              <div class="text-center red--text">No data to show</div>

                                              </template>
                                          </tbody>
                                      </template>
                                  </v-simple-table>
                              </v-col>
                          </v-row>
                    </v-card-text>
                </v-card>

            </v-dialog>
               

                
           </v-container>
       </userlayout>
</template>
<script>
import  userlayout  from '../../../Layouts/administratorlayout';
import Vue from 'vue'
export  default {
    props: ['errors','successMessage','errorMessage','total','receipted','invoice','wallet','id','transactions'],
    components: {
        userlayout
    },data(){
        return{
            tab:null,
            filter:'',
            dialogVerify:false,
            rtgs_id:''
        }
    },methods:{
         download(id){
            var url= '/DownloadManager/'+id+'/rtgs'

         window.open(url);
        },  
        filterData(){
            this.$inertia.put(this.$route('awaitinginvoices.update',this.id),{term:this.filter,inv:this.invoice.id},{
                onSuccess:(page)=>{

                }
            })
        },
        showDialog(id){
          this.rtgs_id = id
          this.dialogVerify = true
        },
        processRtgs(id){
                Vue.swal({
                    title: 'Transaction Confirmation',
                    text: "Are you sure you want to  use transaction ",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Proceed'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.loading= true
                          var data ={rtgs:this.rtgs_id,id:id}
                                    this.$inertia.post(this.$route('awaitinginvoices.store'),data,{
                                        onSuccess:(page)=>{
                                           this.loading = false
                                           if(this.successMessage)
                                           {
                                        Vue.swal(
                                            'Allocated',
                                             this.successMessage,
                                            'success'
                                            )
                                            }else{
                                             Vue.swal(
                                            'Oops',
                                            this.errorMessage,
                                            'error'
                                            )  
                                            }
                                        },onError:(error)=>{
                                          this.loading = false                                      
                                        }
                                    })
                     
                    
                    }else{
                        this.loading = false
                    }
                 }) 
          
        },settleInvoice(){
                Vue.swal({
                    title: 'Settle Invoice',
                    text: "Are you sure you want to  use client wallet to settle Invoicr ",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Proceed'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.loading= true
                        this.$inertia.get(this.$route('awaitinginvoices.edit',this.invoice.id))                     
                    
                    }else{
                        this.loading = false
                    }
                 })
        }
    },computed:{
        walletclass(){
             if(this.wallet == 0){
                 return "red"
             }else{
              return "green"   
             }
        }
    }
}
</script>