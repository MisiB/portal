<template>
       <userlayout title="Budgets">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn> <v-btn text link disabled>Procurement Returns View</v-btn>
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
                    <v-alert color="info">
                        {{returns.name}}
                    </v-alert>
                    <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th>Entity</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="returns.uploads.length >0">
                                <tr v-for="rtn in filterData" :key="rtn.id">
                                    <td>
                                        {{rtn.entity.name}}
                                    </td>                                   
                                    <td>
                                        <v-btn small depressed color="primary" @click="download(rtn.path)">
                                            <v-icon>mdi-download</v-icon>
                                        </v-btn>
                                    </td>
                                </tr>
                                </template>
                                <template v-else>
                                    <tr>
                                        <td colspan="2" class="text-center red--text">No returns uploaded as yet</td>
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

export  default {
    props: ['errors','successMessage','errorMessage','returns'],
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
             var returns = this.returns.uploads
            if(this.filter !='')
            {
                return returns.filter(rtrn=>(!rtrn.entity.name.toUpperCase().indexOf(this.filter.toUpperCase())))
            }else{
                return returns
            }
        }
    }
}
</script>