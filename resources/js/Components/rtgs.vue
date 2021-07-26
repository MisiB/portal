<template>
    <div>
       <v-btn small depressed color="primary" @click="showModel=true">View</v-btn>
       <v-dialog v-model="showModel" fullscreen>
           <v-card>
               <v-card-title>
                  <div> Rtgs Verification</div>
                  <v-spacer/>
                   <v-btn small depressed color="success"  @click="download()">Download</v-btn> <v-btn small depressed color="error"  @click="showModel=false">Close</v-btn>
                </v-card-title>
               <v-card-text>
                   {{errorMessage}}
                   <v-simple-table>
                        <template v-slot:default>
                            <tbody>
                                <tr><th>Company</th><td>{{data.company}}</td></tr>
                                <tr><th>Payment</th><td>{{data.paymentdate}}</td></tr>
                                <tr><th>Uploaded</th><td>{{data.created_at}}</td></tr>
                                 <tr><th>Status</th><td>{{data.status}}</td></tr>
                            </tbody>
                        </template>
                   </v-simple-table>
                   <v-card>
                       <v-card-title>Search for bank transaction</v-card-title>
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
                                  <v-simple-table>
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
                                          </tbody>
                                      </template>
                                  </v-simple-table>
                              </v-col>
                          </v-row>
                          
                       </v-card-text>
                   </v-card>
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
            showModel:false,
            filter:'',
            loading:false 
           }
       },methods:{
           filterData(){
            this.$inertia.replace(this.$route('rtgsprocessing.index',{term:this.filter}))
        },processRtgs(id){
                Vue.swal({
                    title: 'Transaction Confirmation',
                    text: "Are you sure you want to allocate funds to  company ",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Proceed'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.loading= true
                          var data ={rtgs:this.data.id,company_id:this.data.company_id,id:id}
                                    this.$inertia.post('/administrator/rtgsprocessing',data,{
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
          
        },download(){
            var path = '/'+this.data.path
             window.open(path)
        }
       }
}
</script>