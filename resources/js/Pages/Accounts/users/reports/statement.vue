<template>
    <userlayout title="Statement Report">
        <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('dashboard')" >Dashboard</v-btn> <v-btn text link disabled>Statement</v-btn>
                    </div>
                </v-card-text>
            </v-card>
                   <v-alert
                   class="mt-4"
                color="red lighten-2"
                dark
                v-if="errorMessage"
            >
                {{errorMessage}}
            </v-alert>
            <v-alert
            class="mt-4"
                color="green lighten-2"
                dark
                v-if="successMessage"
            >
                {{successMessage}}
            </v-alert>
            <v-card flat class="mt-5">
                <v-card-text>
                   <v-simple-table>
                       <template v-slot:default>
                           <thead>
                               <tr>
                                   <th>Date</th>
                                   <th>Description</th>
                                   <th>flag</th>
                                   <th>Amount</th>
                               </tr>
                           </thead>
                           <tbody>
                               <template v-if="statements.length>0">
                                   <tr v-for="statement in statements" :key="statement.id" class="pt-2 pb-2">
                                       <td>{{statement.created_at | formatDate}}</td>
                                       <td>{{statement.description}}</td>
                                       <td>{{statement.flag}}</td>
                                       <td>{{statement.currency}}{{statement.amount}}</td>
                                     
                                   </tr>
                               </template>
                               <template v-else>
                                  <tr>
                                      <td colspan="4" class="text-center red-text">No Statement found as yet</td>
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
import  userlayout  from '../../../Layouts/userlayout'
export  default {
    props: ['errors','successMessage','errorMessage','statements'],
    components: {
        userlayout
    },data(){
        return{
            loading:false     

        }
    },methods:{     
    

    }
}
</script>