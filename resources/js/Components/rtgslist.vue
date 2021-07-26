<template>
    <div>
        <v-btn small depressed color="primary" @click="invoiceDialog=true">
                                            View
    </v-btn>

    <v-dialog v-model="invoiceDialog" max-width="600">
        <v-card>
            <v-card-title><div>Awaiting Invoices</div>
            <v-spacer/>
            <v-btn icon @click="invoiceDialog=false"><v-icon>mdi-close</v-icon></v-btn></v-card-title>
            <v-card-text>
                 <v-simple-table>
                    <template v-slot:default>
                        <thead>
                            <tr>
                                <th>
                                  Date
                                </th>
                                <th>
                                   Invoice number
                                </th>
                                <th>
                                   Description
                                </th>
                                <th>
                                  Amount
                                </th>
                                <th>

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="dt in data" :key="dt.id">
                                 <td>
                              {{dt.created_at|formatDate}}
                             </td>
                              <td>
                              {{dt.invoice_number}}
                             </td>                             
                              <td>
                                 {{dt.description}}
                             </td>
                             <td>
                                 {{dt.amount}}
                             </td>
                             <td>
                                 <v-btn small depressed color="primary" :href="$route('awaitinginvoices.show',dt.id)">
                                         View
                                 </v-btn>
    
                             </td>
                            </tr>
                        </tbody>
                    </template>
                 </v-simple-table>
            </v-card-text>
        </v-card>
    </v-dialog>

    <v-dialog v-model="showDialog" max-width="600">
        <v-card>
            <v-card-title><div>RTGS List</div>
            <v-spacer/>
            <v-btn icon @click="showDialog=false"><v-icon>mdi-close</v-icon></v-btn></v-card-title>
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
                            <tr v-for="rtg in rtgs" :key="rtg.id" class="pt-2 pb-2">
                              <td>{{rtg.created_at | formatDate}}</td>
                              <td>{{rtg.invoice_number}}</td>
                              <td>{{rtg.name}}</td>
                              <td class="d-flex pa-2">
                                 <v-btn small rounded color="primary" @click="download(rtg.id)" depressed>Download</v-btn> 
                                 <v-btn small depressed rounded color="success">Verify</v-btn>
                              </td>
                            </tr>
                        </tbody>

                    </template>
                </v-simple-table>
            </v-card-text>
        </v-card>
    </v-dialog>
    <v-dialog v-model="searchModel" max-width="900">
         <v-card>
             <v-card-title>
                 <div>Search</div>
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
                                              <template v-if="transactions.data.length>0">
                                              <tr v-for="transaction in transactions.data" :key="transaction.id">
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
    </div>
</template>
<script>
import Vue from 'vue'
export default {
    props:['data','transactions','errors','errorMessage','successMessage'],
    data(){
        return{
            showDialog:false,
            searchModel:false,
            invoiceDialog:false,
            id:'',
            filter:'',
            rtgs:[]
        }
    },methods:{       
            download(id){
         var url= '/DownloadManager/'+id+'/documents'

         window.open(url);
     
        },showSearch(id){
            this.id = id
            this.searchModel = true

        },   
        filterData(){
            this.$inertia.replace(this.$route('awaitinginvoices.index',{term:this.filter}))
        },showRtgs(rtgs){
            this.rtgs = rtgs
            this.showDialog = true

        }
        ,processRtgs(id){
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
                          var data ={rtgs:this.id,id:id}
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
          
        }
    }
}
</script>