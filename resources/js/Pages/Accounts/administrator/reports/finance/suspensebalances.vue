<template>
       <userlayout title="Audit Bank Transactions">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn> <v-btn text link disabled> Suspense Transfer</v-btn>
                    </div>
                </v-card-text>
            </v-card>   
            <v-card class="mt-4">
                 <v-card-text>
                     <v-text-field outlined label="Enter Customer Reg Number" v-model="search" v-on:keyup.enter="filterData"></v-text-field>
                 </v-card-text>
            </v-card>
            <v-card class="mt-4">
                 <v-card-text>
                           <v-simple-table>
                               <template v-slot:default>
                                    <tbody>
                                        <tr><td>{{customer.name}}</td><td>{{customer.regnumber}}</td></tr>
                                      
                                    </tbody>
                                </template>
                           </v-simple-table>

                           <v-card class="mt-4">
                               <v-card-title>Suspense Balance</v-card-title>
                               <v-card-text>
                                    <v-simple-table class="mt-4">
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th>Suspense ID</th>
                                   <th>Account number</th>
                                   <th>Balance</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="suspense.length >0">
                              <tr v-for=" sus in suspense" :key="sus.id">
                                  <td>{{sus.id}}</td>
                                  <td>{{sus.accountnumber}}</td>
                                  <td>{{sus.currency}}{{sus.total}}</td>
                                  <td>
                                      <template v-if="sus.total>0">

                                       <transferRequest v-if="sus.transfers.length==0" :currency="sus.currency" :errors="errors" :errorMessage="errorMessage" :successMessage="successMessage" :suspense_id="sus.id" :accountnumbers="accountnumbers"></transferRequest>
                                        <transferApproval v-else :errorMessage="errorMessage" :errors="errors" :successMessage="successMessage" :transfer="sus.transfers"></transferApproval>
                                      </template>
                                  </td>
                              </tr>
                              </template>
                              <template v-else>
                                    <tr>
                                        <td colspan="3" class="text-center red--text">No data found</td>
                                    </tr>
                              </template>
                            </tbody>
                            </template>
                            </v-simple-table>
                               </v-card-text>
                           </v-card> 
                         
                          
                 </v-card-text>
            </v-card>
           </v-container>

         </userlayout>
 </template>
 <script>
import  userlayout  from '../../../../Layouts/administratorlayout'
import transferRequest from '../../../../../Components/transferRequest.vue'
import transferApproval from '../../../../../Components/transferApproval.vue'
 export default {
     props: ['errors','successMessage','errorMessage','suspense','customer','accountnumbers'],
     components:{
         userlayout,
         transferRequest,
         transferApproval
     } ,
     data(){
        return{
            search:""
        }
    },methods:{
        filterData(){
            this.$inertia.replace(this.$route('suspense-transfer.index',{regnumber:this.search}))
        }
    }
 }
 </script>
