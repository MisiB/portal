<template>
    <userlayout title="Awaiting Invoices">
        <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('dashboard')" >Dashboard</v-btn> <v-btn text link :href="$route('TenderFees.index')" >My Tender Fees</v-btn> <v-btn text link disabled>Awaiting Invoices</v-btn><v-spacer/>
                         <bidbondrequest :errors="errors" :successMessage="successMessage"></bidbondrequest>
            
                    </div>
                </v-card-text>
            </v-card>             
          

          
            <v-card flat class="mt-5">
                <v-card-title>
                    <div>Awaiting Tender Invoices</div>
                     </v-card-title>
                <v-divider/>
                <v-card-text>
                     <v-simple-table dense>
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
                            <template v-if="awaiting.length >0">
                            <tr v-for="awt in awaiting" :key="awt.id">
                               <td>{{awt.created_at | formatDate}}</td>
                               <td>{{awt.entity.name}}</td>
                               <td>{{awt.tendernumber}}</td>
                               <td>{{awt.description}}</td>
                                <td>{{awt.currency.name}}{{awt.amount}}</td>
                                <td>{{awt.status}}</td>
                                <td>
                                    <div>
                                        <v-btn color="success" rounded depressed small >View</v-btn>

                                    </div>
                                </td>
                            </tr>
                            </template>
                            <template v-else>
                                <tr>
                                   <td colspan="7" class="text-center red--text">No Awaiting Invoices found</td>
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
import bidbondrequest from '../../../../../Components/bidbondrequest.vue'
export  default {
    props: ['errors','successMessage','errorMessage','awaiting'],
    components: {
        userlayout,
        bidbondrequest
    }
}
</script>