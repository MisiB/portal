<template>
       <userlayout title="Customers">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn> <v-btn text disabled>Customers</v-btn>
                    </div>
                </v-card-text>
            </v-card>  
            <v-card class="mt-4">
                <v-card-text>
                       <v-text-field
                            v-model="search"
                            class="mt-4"
                            full-width
                            placeholder="Search for Customer"                        
                            outlined
                            v-on:keyup.enter="filterData"
                            >
                         </v-text-field>
                </v-card-text>
            </v-card>             
             <v-card flat class="mt-4">
                 <v-card-title>
                    <div class="display-1">Customers</div>
                   
                 </v-card-title>
                 <v-divider/>
                <v-card-text>
                    <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                   <th>Regnumber</th>
                                   <th>Name</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="customer in customers" :key="customer.id">
                                     <td>
                                        {{customer.regnumber}}
                                    </td>
                                    <td>
                                        {{customer.name}}
                                    </td>
                                    <td class="d-flex pa-4 justify-end">
                                        <inertia-link   class="v-btn v-btn--has-bg theme--light v-size--small primary" :href="$route('customer.show',customer.id)">
                                            <v-icon>mdi-account-arrow-right</v-icon> View
                                        </inertia-link>
                                      

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
import Vue from 'vue'

export  default {
    props: ['errors','successMessage','errorMessage','customers'],
    components: {
        userlayout
    },
    data(){
        return{
          search:''
        }
    },methods: {       
          filterData()
          {
            this.$inertia.replace(this.$route('customer.index',{term:this.search}));
          }
        }
    }

</script>