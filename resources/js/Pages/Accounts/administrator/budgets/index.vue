<template>
       <userlayout title="Budgets">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn> <v-btn text link disabled>Budgets</v-btn>
                    </div>
                </v-card-text>
            </v-card>               
             <v-card flat class="mt-4">
                 <v-card-title>
                     <div>Budgets</div>                  
                 </v-card-title>
                 <v-divider/>
                <v-card-text>
                    <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th>Year</th>
                                   <th>Total Uploaded</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="budgets.length >0">
                                <tr v-for="(budget,index) in budgets" :key="index">
                                    <td>
                                        {{budget.year}}
                                    </td>
                                    <td>
                                    
                                     {{budget.upload}}

                                    </td>
                                    <td>
                                       <v-btn small depressed  color="success" :href="$route('procurementbudgets.show',budget.year)">
                                            View
                                        </v-btn>
                                    </td>
                                </tr>
                                </template>
                                <template v-else>
                                    <tr>
                                        <td colspan="3" class="pa-5 text-center red--text">
                                            No Budgets found
                                        </td>
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
import  userlayout  from '../../../Layouts/administratorlayout';
import Vue from 'vue'

export  default {
    props: ['errors','successMessage','errorMessage','budgets'],
    components: {
        userlayout
    }
}
</script>