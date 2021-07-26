<template>
       <userlayout title="Dashboard">
          <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('entity.home')" >Dashboard</v-btn> <v-btn text link disabled>Procurement Notices</v-btn>
                    </div>
                </v-card-text>
            </v-card> 
        
            <v-row class="mt-4">
                <v-col>              
             <v-card flat >
                 <v-card-title>
                     <div>Procurement Notices</div>
                     <v-spacer/>
                       <inertia-link class="mx-2 v-btn v-btn--fab v-btn--has-bg v-btn--round theme--dark v-size--default indigo" :href="$route('procurementnotice.create')">
                        <v-icon dark>
                            mdi-plus
                        </v-icon>
                       </inertia-link>
                     </v-card-title>
                 
                 <v-card-text>
                     <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th>Title</th>
                                   <th>Closing Date</th>
                                   <th>Active Status</th>
                                   <th>Status</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="notices.length>0">
                                <tr v-for="notice in notices" :key="notice.id" >
                                  <td>
                                      {{notice.title}}
                                  </td>
                                  <td>
                                      {{notice.close_date}} {{notice.close_time}}
                                  </td>
                                  <td>
                                      {{notice.active}}
                                  </td>
                                  <td>
                                      {{notice.status}} 
                                  </td>
                                  <td>
                                    <inertia-link class="v-btn v-btn--has-bg theme--light v-size--small primary" :href="$route('procurementnotice.show',notice.uuid)">View</inertia-link>
                                    
                                    <template v-if="notice.status=='PUBLISHED'">
                                     <inertia-link class="v-btn v-btn--has-bg theme--light v-size--small success" :href="$route('procurementnotice.show',notice.uuid)" v-if="notice.active=='N'">Award</inertia-link>
                                    </template>
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
import  userlayout  from '../../../Layouts/entityLayout';
export  default {
    props: ['errors','successMessage','errorMessage','notices','currency','procurementtypes','categories'],
    components: {
        userlayout
    },
    data(){
        return{

        }
    },methods: {

    }
}
</script>