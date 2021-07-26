<template>
       <userlayout title="Dashboard">
          <v-container>
            <v-alert  border="top"
                color="red lighten-2"
                dark
                v-if="errorMessage"
            >
                {{errorMessage}}
            </v-alert>
            <v-alert
                border="top"
                color="green lighten-2"
                dark
                v-if="successMessage"
            >
                {{successMessage}}
            </v-alert>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link disabled>Dashboard</v-btn>
                    </div>
                </v-card-text>
            </v-card>               
             <v-card flat class="mt-4">
                 <v-card-title>Recent Activities</v-card-title>
                 <v-card-text>
                      <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                   <th>Event</th>
                                   <th>Auditable Type</th>
                                   <th>Old value</th>
                                   <th>New Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="audits.length>0">
                                    <tr v-for="audit in audits" :key="audit.id">
                                      <td>{{audit.created_at | formatDate }}</td>
                                      <td>{{audit.event}}</td>
                                      <td>{{audit.auditable_type}}</td>
                                      <td>{{audit.old_values}}</td>
                                        <td>{{audit.new_values}}</td>
                                    </tr>
                                </template>
                                <template v-else>
                                    <tr>
                                        <td colspan="5" class="pa-5 text-center red--text"> No Recent Activities Found</td>
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
import  userlayout  from '../../Layouts/administratorlayout';
export  default {
    props: ['errors','successMessage','errorMessage','data','audits'],
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