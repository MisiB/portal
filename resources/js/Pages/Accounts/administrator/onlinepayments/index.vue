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
             <v-card flat class="mt-4">
                 <v-card-title>
                      <v-text-field
                            v-model="search"
                            placeholder="Search"
                            dense
                            outlined
                            v-on:keyup.enter="filterData"
                            >
                         </v-text-field>
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
                 <v-divider/>
                <v-card-text>
                    <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                   <th>Company</th>
                                   <th>Invoice</th>
                                   <th>Mode</th>
                                   <th>Status</th>  
                                    <th>Amount</th> 
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="transaction in transactions.data" :key="transaction.id">
                                    <td>
                                        {{transaction.created_at}}
                                    </td>
                                    <td>
                                        <template v-if="transaction.company">
                                            {{transaction.company.name}}
                                        </template>
                                    </td>
                                      <td>
                                     {{transaction.invoice_number}}
                                    </td>
                                        <td>
                                        {{transaction.mode}}
                                     </td>
                                      <td>
                                        {{transaction.status}}
                                     </td>
                                       <td>
                                     {{transaction.amount}}
                                    </td>                                   
                                    <td>

                                        <v-btn small color="success" rounded depressed v-if="transaction.status=='PENDING'" :loading="loading" :disabled="loading">Check</v-btn>

                                    </td>
                                
                                </tr>
                            </tbody>
                        </template>
                    </v-simple-table>
                    
                </v-card-text>
                <v-card-actions class="text-center">
                         <template v-if="transactions.links.length > 0">
                     <inertia-link v-for="(link,index) in transactions.links" :key="index" class="v-btn v-btn--has-bg theme--light v-size--small success" :href="link.url" v-html="link.label"/>
                    </template>
                           </v-card-actions>
             </v-card>
         
               

                
           </v-container>
       </userlayout>
</template>
<script>
import  userlayout  from '../../../Layouts/administratorlayout';
import Vue from 'vue'

export  default {
    props: ['errors','successMessage','errorMessage','transactions','banks','currency'],
    components: {
        userlayout
    },
    data(){
        return{
          addModel:false,
          search:"",
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