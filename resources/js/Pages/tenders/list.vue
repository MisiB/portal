<template>
    <welcomelayout title="Tenders">
          <v-card flat color="teal">
                <v-card-text>
                    <v-container>
                     <div class="d-flex">
                         <v-btn link text :href="$route('welcome')" class="white--text">Home</v-btn>
                         
                         <v-btn text>All Tenders</v-btn>
                     </div>
                     </v-container>

                </v-card-text>
            </v-card>
        <v-container>
          
           <v-card>
                 <v-card-title>
                     <div>Procurement Notices</div>
                         <v-spacer/>
                         <v-text-field
                            label="Search"
                            append-icon="mdi-magnify"
                        ></v-text-field>              
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
                                    <inertia-link class="v-btn v-btn--has-bg theme--light v-size--small primary" :href="$route('notice',notice.uuid)">View</inertia-link>
                                                                       
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
        </v-container>
    </welcomelayout>

</template>
<script>
import  welcomelayout  from '../Layouts/welcome'
export  default {
    props:['notices'],
    data() {
        return {
        items: [
        {
          text: 'Home',
          disabled: false,
          href: '/',
        },
        {
          text: 'All Tenders',
          disabled: true,
          href: 'breadcrumbs_link_1',
        }
      ]
        }
    },
    components:{
        welcomelayout
    }
}
</script>
