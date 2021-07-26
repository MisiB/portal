<template>
    <welcomelayout :title="title">
        <v-container>
            <v-sheet height="300" class="text-center pa-10">
        <div :class="headercss">Procurement Regulatory Authority of Zimbabwe</div>
        <div class="headline">Public Procurement Portal</div>
        <v-row class="mt-2">
            <v-col md="4" offset-md="4">
                <v-row>
                    <v-col>
                        <v-btn color="success" depressed block :href="$route('register')">REGISTER</v-btn>
                    </v-col>
                    <v-col>
                        <v-btn color="primary" depressed block :href="$route('login')">LOGIN</v-btn>
                    </v-col>
                </v-row>
            </v-col>
        </v-row>
            </v-sheet>
               <v-row class="mt-4">
                <v-col>
                    <v-card>
                        
                        <v-card-title>Verify Certificate</v-card-title>
                        <v-card-text>
                          <v-row>
                              <v-col md="4" sm="12">
                                  <v-select outlined label=" Select Certificate Type" :error-messages="errors.type" v-model="form.type" :items="types">

                                  </v-select>
                              </v-col>
                              <v-col md="6" sm="12">
                                  <v-text-field outlined label="Certificate Number" :error-messages="errors.code" v-model="form.code"></v-text-field>
                              </v-col>
                              <v-col md="2" sm="12">
                                  <v-btn outlined x-large block rounded @click="verify" :loading="form.processing" :disabled="form.processing">Verify</v-btn>
                              </v-col>
                          </v-row>

                        </v-card-text>
                    </v-card>
              </v-col>
            </v-row>
           
            <v-row class="mt-4">
                <v-col>
        <v-card>
                 <v-card-title class="indigo darken-3 white--text">
                     <div>Latest Procurement Notices</div>
                                       
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
                </v-col>
            </v-row>
        </v-container>
    </welcomelayout>

</template>
<script>
import  welcomelayout  from './Layouts/welcome'
import Vue from 'vue'
export  default {
    props:['notices','errors','errorMessage','successMessage'],
    components:{
        welcomelayout
    },data() {
        return {
          types:['REGISTRATION','SPOC','ESTABLISHMENT FEE','BIDBOND'],
          form:this.$inertia.form({ type:'',code:''}) ,
          title:'Welcome'
        }
    },methods:{
        verify(){
            this.form.get(this.$route('verifydata'),{
                onSuccess:(page)=>{
                    if(this.errorMessage){
                       Vue.swal(
                            'Warning',
                            this.errorMessage,
                            'error'
                          )
                    }
               
                },onError:(page)=>{

                }
            })
        }
    },computed:{
         headercss(){
              switch (this.$vuetify.breakpoint.name)
               {
                case 'xs': return 'headline mt-4 font-weight-bold'
                case 'sm': return 'headline mt-4 font-weight-bold'
                case 'md': return 'display-2 mt-8 font-weight-bold'
                case 'lg': return 'display-2 mt-8 font-weight-bold'
                case 'xl': return  'display-2 mt-8 font-weight-bold'
                }
          }
    }
}
</script>
