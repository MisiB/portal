<template>
       <userlayout title="Suppleir">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn> <v-btn text link disabled>Pending Supplier Documents</v-btn>
                    </div>
                </v-card-text>
            </v-card>               
             <v-card flat class="mt-4">
                 <v-card-title>
                    <div class="headline">Pending Supplier Documents</div>
                
                 </v-card-title>
                 <v-divider/>
                <v-card-text>
                    <template>
                        <v-tabs v-model="tab">
                            <v-tab>
                                 <v-badge
                                color="green"
                                :content="latest.length"
                                >
                                 Latest
                                </v-badge>
                              
                                
                        </v-tab>
                            <v-tab class="ml-2">
                                  <v-badge
                                color="red"
                                :content="oldlist.length"
                                >
                                  Awaiting
                                </v-badge>
                              
                              
                        </v-tab>
                        </v-tabs>
                          <v-tabs-items v-model="tab">
                              <v-tab-item>
                                    <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                   <th>Company</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                 <template v-if="latest.length>0">
                                <tr v-for="item in latest" :key="item.id">
                                    <td>
                                        {{item.date}}
                                    </td>
                                    <td>
                                        {{item.company}}
                                    </td>
                                    <td>
                                     
                                    <inertia-link :href="$route('pendingsuppliers.show',item.id)" class="ml-2 v-btn v-btn--has-bg theme--light v-size--small success">
                                            Open
                                     </inertia-link>
                                        

                                    </td>
                                </tr>
                                </template>
                                <template v-else>
                                   <tr>
                                       <td colspan="3" class="text-center red--text">No latest registrations found</td>
                                   </tr>
                                </template>
                            </tbody>
                        </template>
                    </v-simple-table>
                              </v-tab-item>
                               <v-tab-item>
                                      <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                   <th>Company</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="oldlist.length>0">
                                <tr v-for="old in oldlist" :key="old.id">
                                     <td>
                                        {{old.date}}
                                    </td>
                                    <td>
                                        {{old.company}}
                                    </td>
                                    <td>
                                     
                                     <inertia-link :href="$route('pendingsuppliers.show',old.id)" class="ml-2 v-btn v-btn--has-bg theme--light v-size--small success">
                                            Open
                                     </inertia-link>
                                        

                                    </td>
                                </tr>
                                </template>
                                <template v-else>
                                   <tr>
                                       <td colspan="3" class="text-center red--text">No Awaiting registrations found</td>
                                   </tr>
                                </template>
                            </tbody>
                        </template>
                    </v-simple-table>
                              </v-tab-item>
                          </v-tabs-items>
                    </template>
                    
                </v-card-text>
             </v-card>
               

                
           </v-container>
       </userlayout>
</template>
<script>
import  userlayout  from '../../../Layouts/administratorlayout';
import Vue from 'vue'

export  default {
    props: ['errors','successMessage','errorMessage','oldlist','latest'],
    components: {
        userlayout
    },
    data(){
        return{
          addModel:false,
           tab: null
        }
    },methods: {
      
    }
}
</script>