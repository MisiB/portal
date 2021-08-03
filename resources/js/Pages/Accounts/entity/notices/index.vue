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
                                    <th>Notice</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="notices.length>0">
                                <tr v-for="notice in notices" :key="notice.id" >
                                  <td>
                                    <div>  {{notice.title}}</div>
                                    <div> {{notice.close_date}} {{notice.close_time}}</div>
                                    <div> {{notice.active}}</div>
                                    <div>   {{notice.status}}</div>
                                  </td>
                                 
                                 
                                  <td>
                                    <inertia-link class="v-btn v-btn--has-bg theme--light v-size--small primary" :href="$route('procurementnotice.show',notice.uuid)">View</inertia-link>
                                                       <v-btn small rounded color="info" depressed @click="download(notice)">Download</v-btn>
                      <v-btn small rounded color="primary" v-if="notice.status=='PENDING'" depressed class="ml-2">Edit</v-btn>
                      <inertia-link v-if="notice.status=='PENDING'" class="ml-2 v-btn v-btn--has-bg v-btn--rounded theme--light v-size--small success" :href="$route('procurementnotice.edit',notice.uuid)">Publish</inertia-link>
                      <v-btn small rounded color="error" v-if="notice.status=='PENDING'" depressed class="ml-2">Delete</v-btn>
                             
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
          download(notice){
           var path  ='/'+notice.filename
           window.open(path)
       }
    }
}
</script>