<template>
       <userlayout title="Dashboard">
          <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('dashboard')" >Dashboard</v-btn> <v-btn text link disabled>My Tenders</v-btn>
                    </div>
                </v-card-text>
            </v-card> 
        
            <v-row class="mt-4">
                <v-col>
                    <v-alert
                    prominent
                    type="info"
                    >
                    <v-row align="center">
                        <v-col class="grow">
                          Please search for a tender you wish to participate in, If you fail to find on our list click on the Manual Request button
                        </v-col>
                        <v-col class="shrink">
                        <inertia-link class="v-btn v-btn--is-elevated v-btn--has-bg theme--dark v-size--default" :href="$route('TenderFees.create')">Manual Request</inertia-link>
                        </v-col>
                    </v-row>
                    </v-alert>
                    <v-card class="mt-2">
                        <v-card-title>
                             <v-text-field
                                v-model="search"
                                label="Search"
                                outlined
                            >
                            </v-text-field>
                        </v-card-title>
                        <v-card-text>
                              <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th>Title</th>
                                     <th>Type</th>
                                   <th>Closing Date</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="tenders.length>0">
                                <tr v-for="notice in tenders" :key="notice.id" >
                                  <td>
                                     <div>{{notice.title}}</div>
                                     <div v-if="notice.recommended=='Y'"> recommended</div>
                                  </td>
                                  <td>
                                      {{notice.type}}
                                  </td>
                                  <td>
                                      {{notice.close_date}}
                                  </td>
                                  <td>
                                    <inertia-link class="v-btn v-btn--has-bg theme--light v-size--small primary" :href="$route('Mytenders.show',notice.uuid)">View</inertia-link>
                                  </td>
                                </tr>
                                </template>
                                <template v-else>
                                   <tr>
                                       <td colspan="4" class="pa-5 text-center red--text">No procurement notices found</td>
                                   </tr>
                                </template>
                            </tbody>
                        </template>
                     </v-simple-table>
                        </v-card-text>
                        
                    </v-card>
                 
                    
                </v-col>
            </v-row>
          
          </v-container>
       </userlayout>
</template>
<script>
import  userlayout  from '../../../Layouts/userlayout';
import Vue from 'vue'
export  default {
    props: ['errors','successMessage','errorMessage','tenders'],
    components: {
        userlayout
    },
    data(){
        return{
            search:''
            }
         
    },methods: {
       
       


    }

}

</script>