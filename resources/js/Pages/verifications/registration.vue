<template>
    <welcomelayout title="Verifications">
         <v-card flat color="teal">
                <v-card-text>
                    <v-container>
                     <div class="d-flex">
                         <v-btn link text :href="$route('welcome')" class="white--text">Home</v-btn>                         
                         <v-btn text>Registration Certificate Verification</v-btn>
                     </div>
                     </v-container>

                </v-card-text>
            </v-card>
        <v-container>
          
           <v-card>
                 <v-card-title>
                     <div>Registration Certificate Verification</div>
                                    
                </v-card-title>
                 
                 <v-card-text>
                    <v-alert
                        border="top"
                        color="red lighten-2"
                        dark
                        v-if="data.status=='EXPIRED'"
                        >
                        This certificate  has expired should not be used for trading
                        </v-alert>
                     <v-simple-table>
                        <template v-slot:default>
                           <tbody>
                            <tr><th>Company name</th><td>{{data.name}}</td></tr>
                            <tr><th>Praz number</th><td>{{data.regnumber}}</td></tr>
                            <tr><th>Registration Date</th><td>{{data.date | formatDate}}</td></tr>
                            <tr><th>Category</th><td>{{data.category}}</td></tr>
                            <tr><th>Status</th><td :class="data.status">{{data.status}}</td></tr>
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
    props:['data'],
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
