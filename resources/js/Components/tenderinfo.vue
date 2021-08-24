<template>
<div>
    <v-btn small depressed color="primary" @click="getTenderInfo">View</v-btn>
      <v-dialog v-model="showPop" max-width="600">
           <v-card>
               <v-card-title>
                  <div>Transactions</div>
                  <v-spacer/>
                   <v-btn small depressed color="error"  @click="showModel=false">Close</v-btn>
                </v-card-title>
               <v-card-text>
                    <v-simple-table>
                     <template v-slot:default>
                         <thead>
                             <tr>
                                 <th>Entity</th>
                                 <th>Tendernumber</th>
                                 <th>Amount</th>
                             </tr>
                         </thead>
                        <tbody>
                           <tr v-for="trans in transactions" :key="trans.id">
                               <td>{{trans.entity.name}}</td>
                                <td>{{trans.tendernumber}}</td>
                                <td>{{trans.amount}}</td>
                           </tr>
                        </tbody>
                     </template>
                    </v-simple-table>

               </v-card-text>
           </v-card>
      </v-dialog>
</div>
</template>
<script>
import axios from 'axios'
export default {
    props:['id'],
    data(){
        return{
           transactions:[],
           showPop:false
        }
    },methods:{
        getTenderInfo(){
            var formData={id:this.id}
            axios.post('/administrator/report-bankttransactions-audit',formData).then(function(response){
                //this.transactions = response
                this.showPop=true
            })
        }
    }
}
</script>