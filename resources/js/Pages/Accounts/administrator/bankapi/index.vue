<template>
       <userlayout title="bankapi">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn> <v-btn text link disabled>Bank Transactons</v-btn>
                    </div>
                </v-card-text>
            </v-card>  

            <v-card class="mt-4">
              <v-card-title>
                  <div>BANK API Transactions</div>
                  <v-spacer/>
                     <v-btn
                        class="mx-2"
                        fab
                        dark
                        depressed
                        color="indigo"
                        @click="addModel=true"
                        >
                        <v-icon dark>
                            mdi-plus
                        </v-icon>
                        </v-btn>
              </v-card-title>
              <v-card-text>
                  <v-text-field
                            v-model="search"
                            placeholder="Search"
                            dense
                            outlined
                            v-on:keyup.enter="filterData"
                            >
                         </v-text-field>
              </v-card-text>
             </v-card>             
             <v-card flat class="mt-4">
                 <v-card-title>
                    Latest Transactions                    
                    
                 </v-card-title>
                 <v-divider/>
                <v-card-text>
                    <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                   <th>Description</th>
                                   <th>Referecnce Number</th>
                                   <th>Account Number</th>
                                   <th>Status</th>  
                                   <th>Amount</th>
                                    <th>Company</th> 
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="transaction in transactions" :key="transaction.id">
                                    <td>
                                        {{transaction.trans_date}}
                                    </td>
                                    <td>
                                     {{transaction.description}}
                                    </td>
                                      <td>
                                     {{transaction.source_reference}}
                                    </td>
                                      <td>
                                        {{transaction.accountnumber}}
                                     </td>
                                       <td>
                                     {{transaction.status}}
                                    </td>
                                    <td>
                                        {{transaction.currency}} {{transaction.amount}}  
                                    </td>
                                      <td>
                                          <template v-if="transaction.company">
                                            {{transaction.company.name}}
                                          </template>
                                    </td>
                                    <td>

                                       
                                    </td>
                                
                                </tr>
                            </tbody>
                        </template>
                    </v-simple-table>

                    <div class="headline">Manual Awaiting Approval</div>

                     <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                   <th>Description</th>
                                   <th>Referecnce Number</th>
                                   <th>Account Number</th>
                                   <th>Status</th>  
                                   <th>Amount</th>
                                    <th>Company</th> 
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="aw in awaiting" :key="aw.id">
                                    <td>
                                        {{aw.trans_date}}
                                    </td>
                                    <td>
                                     {{aw.description}}
                                    </td>
                                      <td>
                                     {{aw.source_reference}}
                                    </td>
                                      <td>
                                        {{aw.accountnumber}}
                                     </td>
                                       <td>
                                     {{aw.status}}
                                    </td>
                                    <td>
                                        {{aw.currency}} {{aw.amount}}  
                                    </td>
                                      <td>
                                          <template v-if="aw.company">
                                            {{aw.company.name}}
                                          </template>
                                    </td>
                                    <td>

                                        <v-btn small color="success" rounded depressed v-if="aw.status=='AWAITING'" @click="approve(aw.id)" :loading="loading" :disabled="loading">Approve</v-btn>

                                    </td>
                                
                                </tr>
                            </tbody>
                        </template>
                    </v-simple-table>
                    
                </v-card-text>
             
             </v-card>
             <v-dialog max-width="600" v-model="addModel">
                
                 <v-card>
                     <v-card-title>
                         <div>Add Transaction</div>
                         <v-spacer/>
                         <v-btn icon @click="addModel=false"><v-icon>mdi-close</v-icon></v-btn>
                     </v-card-title>
                     <v-card-text>
                         <v-row>
                             <v-col>
                                   <v-select
                            v-model="form.bank"
                            label="Select Bank"
                            outlined
                            :items="banks"
                            item-value="id"
                            item-text="name"
                            :error-messages="errors.bank"
                            >
                          </v-select>
                             </v-col>
                             <v-col>
                                  <v-text-field
                            v-model="form.paymentdate"
                            label="paymentdate"
                            outlined
                            type="date"
                            :error-messages="errors.paymentdate"
                            >
                         </v-text-field>
                             </v-col>
                         </v-row>
                         <v-row>
                             <v-col>
                                  <v-text-field
                            v-model="form.accountnumber"
                            label="accountnumber"
                            outlined
                            :error-messages="errors.accountnumber"
                            >
                         </v-text-field>
                             </v-col>
                             <v-col>
                                     <v-text-field
                            v-model="form.description"
                            label="description"
                            outlined
                            :error-messages="errors.description"
                            >
                         </v-text-field>
                             </v-col>
                         </v-row>
                         <v-row>
                             <v-col>
                                  <v-text-field
                            v-model="form.referencenumber"
                            label="Reference number"
                            outlined
                            :error-messages="errors.referencenumber"
                            >
                         </v-text-field>
                             </v-col>
                             <v-col>
                                  <v-text-field
                            v-model="form.sourcereference"
                            label="Source Reference number"
                            outlined
                            :error-messages="errors.sourcereference"
                            >
                         </v-text-field>
                             </v-col>
                         </v-row>
                         <v-row>
                             <v-col>
                                 <v-select
                            v-model="form.currency"
                            label="curreny"
                            :items="currency"
                            item-text="name"
                            item-value="id"
                            outlined
                            :error-messages="errors.currency"
                            >
                          </v-select>
                             </v-col>
                             <v-col>
                                 <v-text-field
                            v-model="form.amount"
                            label="Amount"
                            outlined
                            :error-messages="errors.amount"
                            >
                         </v-text-field>
                             </v-col>
                         </v-row>                 
                          </v-card-text>
                     <v-card-actions>
                   <v-btn rounded outlined color="red" @click="addModel=false">Cancel</v-btn>
                    <v-spacer/>
                    <v-btn rounded outlined color="green" @click="submit" :loading="form.processing" :disabled="form.processing">Submit</v-btn>
                </v-card-actions>
                 </v-card>
                 
             </v-dialog>
               

                
           </v-container>
       </userlayout>
</template>
<script>
import  userlayout  from '../../../Layouts/administratorlayout';
import Vue from 'vue'

export  default {
    props: ['errors','successMessage','errorMessage','transactions','awaiting','banks','currency'],
    components: {
        userlayout
    },
    data(){
        return{
          addModel:false,
          search:"",
          loading:false,
          form:this.$inertia.form({
              id:'',
              bank:'',
              currency:'',
              description:'',
              accountnumber:'',
              amount:'',
              sourcereference:'',
              referencenumber:'',
              paymentdate:''
          })
        }
    },methods: {
        editShow(type){
            this.form=this.$inertia.form({
              id:type.id,
              name:type.name
          })
          this.addModel = true
        },
        submit(){

            this.form.post(this.$route('bankapi.store'),{
                onSuccess:(page)=>{
                    this.form.reset();
                    this.addModel = false
                     Vue.swal(
                                            'Successful',
                                            this.successMessage,
                                            'success'
                                            )
                                        
                    },
                     onError:(error)=>{
                                        this.loading = false
                                         Vue.swal(
                                            'Oops',
                                            this.errorMessage,
                                            'error'
                                            )
                                    }
            })
        },deleteRecord(id){   
             Vue.swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.loading= true
                        this.$inertia.delete(this.$route('bankapi.destroy',id),{
                                    onSuccess:(page)=>{
                                    this.loading = false
                                        Vue.swal(
                                            'Deleted!',
                                            'Delete request successfully processed.',
                                            'success'
                                            )
                                    },
                                    onError:(error)=>{
                                        this.loading = false
                                    }
                                }) 
                    
                    }else{
                        this.loading = false
                    }
                 })  
          
        },filterData(){
            this.$inertia.replace(this.$route('bankapi.index',{term:this.search}))
        },
        approve(id){

             Vue.swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Approve'
                    }).then((result) => {
                    if (result.isConfirmed) {                 
                      var data ={id:id,status:'PENDING'}
                      this.loading = true
            this.$inertia.put(this.$route('bankapi.update',id),data,{           
                onSuccess:(page)=>{
                         this.loading = false
                    if(this.successMessage)
                    {
                    Vue.swal(
                             'Successful',
                             this.successMessage,
                            'success'
                             )
                    }

                    if(this.errorMessage){
                           Vue.swal(
                             'Ooops',
                             this.errorMessage,
                            'error'
                             )
                    }
                },onError:(error)=>{

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