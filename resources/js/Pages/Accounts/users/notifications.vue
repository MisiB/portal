<template>
    <userlayout title="User Notifications">
        <v-container>
            <v-row>
                <v-col cols="12" md="10" offset-md="1">
                    <v-alert
                        border="top"
                        color="red lighten-2"
                        dark
                        v-if="errors.email"
                    >
                        {{errors.email}}
                    </v-alert>
                    <v-alert
                        border="top"
                        color="red lighten-2"
                        dark
                        v-if="errorMessage"
                    >
                        {{errorMessage}}
                    </v-alert>
                     
                    <v-card flat>
           <v-card-title>User Notifications</v-card-title>
           <v-card-text>
                <v-simple-table>
              <template v-slot:default>
                           <thead>
                               <tr>
                                   <th>Date</th>
                                   <th>Message</th>
                                   
                               </tr>
                           </thead>
                           <tbody>
                               <template v-if="notificationlist.length>0">

                                   <tr v-for="notification in notificationlist" :key="notification.id">
                                       <td>{{notification.created_at | formatDate }}</td>
                                       <td>{{notification.data.message}}</td>
                                       
                                   </tr>
                               </template>
                               <template v-else>
                                   <tr>
                                       <td colspan="3" class="text-center red--text"> No Notifications found as Yet</td>
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
import  userlayout  from '../../Layouts/userlayout'
export  default {
    props: ['errors','successMessage','errorMessage','notificationlist'],
    components: {
        userlayout
    },data(){
        return{
            loading:false,
          

        }
    },methods:{
      

    }
}
</script>
