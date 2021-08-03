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
                                    <th>Notie</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="notices.length>0">
                              <tr v-for="notice in notices" :key="notice.id" >
                                  <td>
                                    <div class="headline">{{notice.title}}</div>
                                    <div> <b>Closing Date:</b> {{notice.close_date}} {{notice.close_time}}</div>
                                    <div> <b>Active:</b> {{notice.active}}</div>
                                  </td>
                                  <td class="text-right">
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
