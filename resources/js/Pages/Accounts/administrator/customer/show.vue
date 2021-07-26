<template>
       <userlayout title="Customers">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn> <v-btn text link disabled>Company Profile</v-btn>
                    </div>
                </v-card-text>
            </v-card>    
               <v-alert  border="top"
               class="mt-2"
                color="red lighten-2"
                dark
                v-if="errorMessage"
            >
                {{errorMessage}}
            </v-alert>
            <v-alert
                border="top"
                class="mt-2"
                color="green lighten-2"
                dark
                v-if="successMessage"
            >
                {{successMessage}}
            </v-alert>           
             <v-card flat class="mt-4">
                 <v-card-title>
                   <div> 
                       <div class="headline"> {{customer.name}}</div> 
                       <div>{{customer.regnumber}}</div>
                   </div> 
                    <v-spacer/> 
                    <inertia-link   class="v-btn ml-2 v-btn--has-bg theme--light v-size--small success" :href="$route('tenderinvoicing.show',customer.id)">
                     Tender Receipting                      
                    </inertia-link>                
                 </v-card-title>
                 <v-divider/>
                <v-card-text>  
                 

                            <customer :customer="customer" :types="types" :errors="errors"></customer>
                             <users :users="customer.users" :errors="errors" :errorMessage="errorMessage" :successMessage="successMessage"></users> 
                             
                                 <invoices :invoices="customer.supplier_invoices"></invoices> 
                                   <statement :statements="customer.statement"></statement>
                                     <rtgs :rtgs="customer.rtgsuploads"></rtgs>
                                      <documents :documents="customer.documents"></documents>
                                          <comments :comments="customer.documentcomments"></comments>
                                 
                     
                                 
                      
                </v-card-text>
             </v-card>
               

                
           </v-container>
       </userlayout>
</template>
<script>
import  userlayout  from '../../../Layouts/administratorlayout';
import receipts  from '../../../../Components/receipts'
import invoices  from '../../../../Components/invoices'
import users from '../../../../Components/users'
import statement from '../../../../Components/statement'
import rtgs from '../../../../Components/customerrtgs'
import documents from '../../../../Components/documents'
import banktransactions from '../../../../Components/banktransactions'
import onlinepayments from '../../../../Components/onlinepayments'
import comments from '../../../../Components/customercomments'
import customer from '../../../../Components/customer.vue'
import Vue from 'vue'

export  default {
    props: ['errors','successMessage','errorMessage','customer','types'],
    components: {
        userlayout,
        receipts,
        invoices,
        users,
        statement,
        rtgs,
        documents,
        banktransactions,
        onlinepayments,
        comments,
        customer
    },
    data(){
        return{
          addModel:false,
          tab:null,
          form:this.$inertia.form({
              id:'',
              name:''
          })
        }
    },methods: {
       
       
    }
}
</script>