<template>
    <welcomelayout title="Verifications">
         <v-card flat color="teal">
                <v-card-text>
                    <v-container>
                     <div class="d-flex">
                         <v-btn link text :href="$route('welcome')" class="white--text">Home</v-btn>                         
                         <v-btn text>Tender Fee Verification</v-btn>
                     </div>
                     </v-container>

                </v-card-text>
            </v-card>
        <v-container>
          
           <v-card>
                 <v-card-title>
                     <div>{{type}} Verification</div>
                                    
                </v-card-title>
                 
                 <v-card-text>
                        
                     <v-simple-table>
                        <template v-slot:default>
                           <tbody>
                            <tr><th>Company name</th><td>{{data.name}}</td></tr>
                            <tr><th>Tender Number</th><td>{{data.tendernumber}}</td></tr>
                            <tr><th>Entity</th><td>{{data.entity}}</td></tr>
                            <tr><th>Company</th><td>{{data.company}}</td></tr>
                            <tr><th>Amount</th><td>{{data.currency}}{{data.amount}}</td></tr>
                            <tr><th>Payment Date</th><td>{{data.paymentdate | formatDate}}</td></tr>
                            <tr v-if="data.validityperiod"><th>Validity Period</th><td>{{data.validityperiod}}</td></tr>
                            <tr v-if="data.maturitydate"><th>Maturity Date</th><td>{{data.maturitydate}}</td></tr>
                           </tbody> 
                        </template>
                     </v-simple-table>
                 </v-card-text>
        </v-card>
        </v-container>

    </welcomelayout>

</template>
<script>
import  welcomelayout  from '../Layouts/welcome'
export  default {
    props:['data','type'],
    components:{
        welcomelayout
    }
}
</script>
<style>
  .ACTIVE{
      color: green;
  }
  .EXPIRED{
      color: red;
  }
</style>
