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
                       <div class="headline"> {{customer.company.name}}</div> 
                       <div>{{customer.company.regnumber}}</div>
                   </div> 
                    <v-spacer/> 
                    <inertia-link   class="v-btn ml-2 v-btn--has-bg theme--light v-size--small success" :href="$route('tenderinvoicing.show',customer.company.id)">
                     Tender Receipting                      
                    </inertia-link>                
                 </v-card-title>
                 <v-divider/>
                <v-card-text>  
                 <v-row>
            <v-col cols="6" md="3">
                <v-card flat class="light-blue rounded-none">
                    <v-card-title class="rounded-none d-flex justify-center"><div>Nonrefundable wallet</div></v-card-title>
                    <v-card-text class="text-center">

                          <div class="text-center">                     
                        <div :class="leadClass">
                            <div class="mr-2">ZWL</div><div>{{customer.zwl_nonrefundable_balance}}</div>
                        </div>
                          </div>
                         
                    </v-card-text>
                </v-card>
            </v-col>
             <v-col cols="6" md="3">
                <v-card flat class="red accent-2 rounded-none">
                    <v-card-title class="rounded-none d-flex justify-center"><div>Nonrefundable wallet</div></v-card-title>
                    
                    <v-card-text class="text-center"> 
                        <div class="text-center">                     
                          <div :class="leadClass">
                            <div class="mr-2">USD</div><div>{{customer.usd_nonrefundable_balance}}</div>
                        </div>
                        </div>
                    </v-card-text>
                </v-card>
            </v-col>
             <v-col cols="6" md="3">
                <v-card flat class="indigo rounded-none">
                    <v-card-title class="rounded-none d-flex justify-center"><div>Refundable wallet</div></v-card-title>
                    
                    <v-card-text class="text-center"> 
                      
                        <div class="text-center">
                          <div :class="leadClass">
                            <div class="mr-2">ZWL</div><div>{{customer.zwl_refundable_balance}}</div>
                        </div>
                      
                        </div>
                    </v-card-text>
                </v-card>
            </v-col>
             <v-col  md3 sm12>
                <v-card flat class="green lighten-1 rounded-none">
                    <v-card-title class="rounded-none d-flex justify-center"><div>Refundable wallet</div></v-card-title>
                    
                    <v-card-text class="text-center"> 
                      
                        <div class="text-center">
                          <div :class="leadClass">
                            <div class="mr-2">USD</div><div>{{customer.usd_refundable_balance}}</div>
                        </div>
                        
                        </div>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
        <customer :customer="customer.company" :types="types" :errors="errors"></customer>
          <v-expansion-panels flat>
                <v-expansion-panel>
                <v-expansion-panel-header color="orange">
                   <div>
                       <v-avatar
                            color="black"
                            size="52"
                            class="white--text"
                            >
                            {{customer.company.users.length}}
                     </v-avatar> Users
                     </div>
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                   <users :users="customer.company.users" :errors="errors" :errorMessage="errorMessage" :successMessage="successMessage"></users> 
              </v-expansion-panel-content>
                </v-expansion-panel>
                  <v-expansion-panel>
                <v-expansion-panel-header color="primary">
                      <div>
                       <v-avatar
                            color="green"
                            size="52"
                            class="white--text"
                            >
                            {{customer.company.supplier_invoices.length}}
                     </v-avatar>  Supplier Invoices
                     </div>
                   
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                 <invoices :invoices="customer.company.supplier_invoices"></invoices> 
                </v-expansion-panel-content>
                </v-expansion-panel>
                  <v-expansion-panel>
                <v-expansion-panel-header class="deep-orange">
                    <div>
                       <v-avatar
                            color="green"
                            size="52"
                            class="white--text"
                            >
                            {{customer.company.tenderinvoices.length}}
                     </v-avatar>  Tender Invoices
                     </div>
                   
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                    <tenderinvoices :invoices="customer.company.tenderinvoices"></tenderinvoices>
                </v-expansion-panel-content>
                </v-expansion-panel>
                  <v-expansion-panel>
                <v-expansion-panel-header color="success">
                     <div>
                       <v-avatar
                            color="blue"
                            size="52"
                            class="white--text"
                            >
                            {{customer.company.statement.length}}
                     </v-avatar>  General statement
                     </div>
                   
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                   <statement :statements="customer.company.statement"></statement>
              </v-expansion-panel-content>
                </v-expansion-panel>
                  <v-expansion-panel>
                <v-expansion-panel-header class="red lighten-2">
                     <div>
                       <v-avatar
                            color="blue"
                            size="52"
                            class="white--text"
                            >
                            {{customer.company.suspense.length}}
                     </v-avatar>  Suspense Statement
                     </div>
                    
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                      <suspense :suspenses ="customer.company.suspense"></suspense> 
               </v-expansion-panel-content>
                </v-expansion-panel>
                  <v-expansion-panel>
                <v-expansion-panel-header class="grey lighten-2">
                    <div>
                       <v-avatar
                            color="blue"
                            size="52"
                            class="white--text"
                            >
                            {{customer.company.rtgsuploads.length}}
                     </v-avatar>   Bank Transfers
                     </div>
                  
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                   <rtgs :rtgs="customer.company.rtgsuploads"></rtgs>   
                </v-expansion-panel-content>
                </v-expansion-panel>
                 <v-expansion-panel>
                <v-expansion-panel-header class="deep-purple">
                    <div>
                       <v-avatar
                            color="blue"
                            size="52"
                            class="white--text"
                            >
                            {{customer.company.documents.length}}
                     </v-avatar>   Account Documents
                     </div>
                  
                </v-expansion-panel-header >
                <v-expansion-panel-content>
                  <documents :documents="customer.company.documents"></documents>  
                </v-expansion-panel-content>
                </v-expansion-panel>
                 <v-expansion-panel>
                <v-expansion-panel-header class="blue darken-2">
                      <div>
                       <v-avatar
                            color="green"
                            size="52"
                            class="white--text"
                            >
                            {{customer.company.documentcomments.length}}
                     </v-avatar>  Registration Comments
                     </div>
                 
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                 <comments :comments="customer.company.documentcomments"></comments> 
                </v-expansion-panel-content>
                </v-expansion-panel>
                 <v-expansion-panel>
                <v-expansion-panel-header class="green darken-4">
                      <div>
                       <v-avatar
                            color="green"
                            size="52"
                            class="white--text"
                            >
                            {{customer.company.registrations.length}}
                     </v-avatar>  Supplier Registrations
                     </div>
                  
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                 <registrations :registrations="customer.company.registrations"></registrations>
                        
                </v-expansion-panel-content>
                </v-expansion-panel>
           </v-expansion-panels>

                            
                               
                            
                           
                         
                           
                            
                            
                                     
                     
                                 
                      
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
import customer from '../../../../Components/customer'
import suspense from '../../../../Components/suspense'
import registrations from '../../../../Components/registration'
import tenderinvoices from '../../../../Components/tenderinvoices'
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
        customer,
        suspense,
        registrations,
        tenderinvoices,
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
       
       
    },
    computed:{
         leadClass(){
            switch (this.$vuetify.breakpoint.name)
                {
                case 'xs': return 'd-flex justify-center subtitle-1'
                case 'sm': return 'd-flex justify-center subtitle-1'
                case 'md': return 'd-flex justify-center subtitle-1'
                case 'lg': return 'd-flex justify-center headline'
                case 'xl': return  'd-flex justify-center body-1'
                }
         }
    }
}
</script>