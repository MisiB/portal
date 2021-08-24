<template>
       <userlayout title="Audit Bank Transactions">
           <v-container fluid>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn> <v-btn text link disabled> Tender Revenue Reports</v-btn>
                    </div>
                </v-card-text>
            </v-card>   
            <v-card class="mt-4">
                 <v-card-text>
                     <v-text-field outlined label="Enter Source Reference" v-model="search" v-on:keyup.enter="filterData"></v-text-field>
                 </v-card-text>
            </v-card>
            <v-card class="mt-4">
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
                                   <th>Status</th>
                                   <th>Amount</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="transactions.length >0">
                              <tr v-for=" transaction in transactions" :key="transaction.id">
                                  <td>{{transaction.trans_date}}</td>
                                  <td>{{transaction.description}}</td>
                                  <td>{{transaction.source_reference}}</td>
                                  <td>{{transaction.statement_reference}}</td>
                                  <td>{{transaction.accountnumber}}</td>    
                                  <td>{{transaction.status}}</td>                              
                                  <td>
                                      {{transaction.currency}}
                                      {{transaction.amount}}
                                  </td>
                                  <td>
                                      <transaction :data="transaction"></transaction>
                                  </td>
                              </tr>
                              </template>
                              <template v-else>
                                    <tr>
                                        <td colspan="7" class="text-center red--text">No Transactions searched</td>
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
import  userlayout  from '../../../../Layouts/administratorlayout'
import transaction from '../../../../../Components/transaction.vue'
 export default {
   props: ['errors','successMessage','errorMessage','transactions'],
   components: {
        userlayout,
        transaction
    },data(){
        return{
            search:""
        }
    },methods:{
        filterData(){
            this.$inertia.replace(this.$route('report-bankttransactions-audit.index',{reference:this.search}))
        }
    }
 }
 </script>