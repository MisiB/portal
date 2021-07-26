<template>
       <userlayout title="Budgets">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn> <v-btn text link disabled>Budgets View</v-btn>
                    </div>
                </v-card-text>
            </v-card>               
             <v-card flat class="mt-4">
                 <v-card-title>
                      <v-text-field
                            v-model="filter"
                            placeholder="Search"
                            dense
                            outlined
                          
                            >
                         </v-text-field>
                 </v-card-title>
                 <v-divider/>
                <v-card-text>
                    <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th>Entity</th>
                                   <th>Year</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="budget in filterData" :key="budget.id">
                                    <td>
                                        {{budget.entity.name}}
                                    </td>
                                    <td>
                                    
                                      
                                    </td>
                                    <td>
                                        <v-btn small depressed color="primary" @click="download(budget.path)">
                                            <v-icon>mdi-download</v-icon>
                                        </v-btn>
                                    </td>
                                </tr>
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

export  default {
    props: ['errors','successMessage','errorMessage','budgets'],
    components: {
        userlayout
    },data(){
        return{
            filter:''
        }
    },methods: {
       download(path){
            var url = '/'+path
            window.open(url)
        }
    },computed:{
       filterData(){
             var plans = this.budgets
            if(this.filter !='')
            {
                return plans.filter(plan=>(!plan.entity.name.toUpperCase().indexOf(this.filter.toUpperCase())))
            }else{
                return plans
            }
        }
    }
}
</script>