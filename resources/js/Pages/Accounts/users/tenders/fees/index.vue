<template>
    <userlayout title="Tender Fees">
        <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('dashboard')" >Dashboard</v-btn> <v-btn text link disabled>My Tender Payments</v-btn><v-spacer/>
                        
                    </div>
                </v-card-text>
            </v-card>
               
           <v-card flat class="mt-5">
                <v-card-title>
                    <div>My Tender Payments</div>
                    <v-spacer/>
                     <inertia-link class="v-btn v-btn--has-bg theme--dark v-size--default" :href="$route('TenderFees.create')">Request Payment</inertia-link>
                      
                </v-card-title>
                <v-divider/>
                <v-card-text>
                     <v-simple-table>
                    <template v-slot:default>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Entity</th>
                                <th>Tender Number</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-if="invoices.length >0">
                            <tr v-for="awt in invoices" :key="awt.id" class="pa-5">
                               <td>{{awt.created_at | formatDate}}</td>
                               <td>{{awt.entity.name}}</td>
                               <td>{{awt.tendernumber}}</td>
                               <td>{{awt.description}}</td>
                                <td>{{awt.currency.name}}{{awt.amount}}</td>
                                <td :class="awt.status">                                   
                                    {{awt.status}}                                  
                                </td>
                                <td>
                                    <div>
                                        <v-btn color="success" rounded depressed small v-if="awt.status=='PAID'" :href="$route('TenderFees.show',awt.id)" >Download</v-btn>
                                         <v-btn color="error" rounded depressed small v-if="showBtn(awt.status)" @click="deleteInvoice(awt.id)" >Cancel</v-btn>
                                     
                                    </div>
                                </td>
                            </tr>
                            </template>
                            <template v-else>
                                <tr>
                                   <td colspan="7" class="text-center red--text">No Invoices found</td>
                               </tr>
                            </template>
                        </tbody>
                    </template>
                    
                    </v-simple-table> 
                   
                </v-card-text>
            </v-card>
         
         
         
        </v-container> 
            
             
    </userlayout> 
        
                
</template> 
<script>
import  userlayout  from '../../../../Layouts/userlayout'
import Vue from 'vue'
export  default {
    props: ['errors','successMessage','errorMessage','currencylist','invoices','entitylist'],
    components: {
        userlayout
    },methods:{
        deleteInvoice(id){
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
                        this.$inertia.delete(this.$route('TenderFees.destroy',id),{
                                    onSuccess:(page)=>{
                                    this.loading = false
                                        Vue.swal(
                                            'Deleted!',
                                            'Invoice has been deleted.',
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
        },showBtn(status){
            if(status =='AWAITING' || status == 'PENDING'){
                return true
            }else{
                return false
            }
        }
    }
}
</script>
<style>
  .AWAITING{
      color: blue;
  }
  .PENDING{
      color: orange;
  }
  .CANCELLED{
      color: red;
  }
  .PAID{
      color: green;
  }
</style>