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
                <v-col md="4" offset-md="4" class="text-center">
                     <div class="display-1">Banking Details</div>   
                </v-col>
            </v-row>

            <v-row class="mt-4">
             <v-col md="6" sm="12" xs="12">
                  <v-card flat class="grey lighten-3">
                      <v-card-title>Refundable FEEs(USD)</v-card-title>
                      <v-card-text>
                           <div class="text-h5 text--primary">BID BONDS only</div>
                            <div>  CURRENCY: UNITED STATES DOLLARS (USD)</div>
                            <div>ACCOUNT NUMBER: 10721064850128</div>
                            <div>BRANCH SORT CODE: 6101</div>
                            <div>SWIFT CODE: COBZZWHAXXX</div>
                      </v-card-text>
                  </v-card>
             </v-col>
             <v-col md="6" sm="12" xs="12">
                  <v-card flat class="grey lighten-3">
                      <v-card-title>Refundable FEEs(ZWL)</v-card-title>
                      <v-card-text>
                           <div class="text-h5 text--primary">BID BONDS only</div>
                            <div>  CURRENCY: ZIM DOLLAR (ZWL)</div>
                            <div>ACCOUNT NUMBER: 10721064850118</div>
                            <div>BRANCH SORT CODE: ---</div>
                            <div>SWIFT CODE: ------</div>
                      </v-card-text>
                  </v-card>
             </v-col>
            </v-row>

             <v-row class="mt-4">
             <v-col md="6" sm="12" xs="12">
                  <v-card flat class="grey lighten-3">
                      <v-card-title>Nonrefundable FEEs(USD)</v-card-title>
                         <v-card-text>
                           <div class="text-h6 text--primary">REGISTRATIONS, BID ESTABLISHMENT FEES; TRAINING FEES; AND ADMIN FEES (Contract, SPOC & Other Admin Fees)</div>
                            <div>  CURRENCY: UNITED STATES DOLLARS (USD)</div>
                            <div>ACCOUNT NUMBER: 10721064850108</div>
                            <div>BRANCH SORT CODE: 6101</div>
                            <div>SWIFT CODE: COBZZWHAXXX</div>
                      </v-card-text>
                  </v-card>
             </v-col>
             <v-col md="6" sm="12" xs="12">
                  <v-card flat class="grey lighten-3">
                      <v-card-title>Nonrefundable FEEs(ZWL)</v-card-title>
                        <v-card-text>
                            <div class="text-h6 text--primary">REGISTRATIONS, BID ESTABLISHMENT FEES; TRAINING FEES; AND ADMIN FEES (Contract, SPOC & Other Admin Fees)</div>
                            <div>  CURRENCY: ZIM DOLLAR (ZWL)</div>
                            <div>ACCOUNT NUMBER: 10721064850020</div>
                            <div>BRANCH SORT CODE: 6101</div>
                            <div>SWIFT CODE: COBZZWHAXXX</div>
                      </v-card-text>
                  </v-card>
             </v-col>
            </v-row>
            <v-row class="mt-4">
                <v-col>
                    <v-card color="success">
                        <v-card-text>
                            <div class="d-flex">
                            <div class="text-h5">Downlod the latest Government Gazette </div>                            
                            <v-spacer/>
                            <v-btn class="primary" href="./gazzates/file.pdf">Download</v-btn>
                            </div>
                            <div>Please note the government gazette might not show real time registrations. To access real time  supplier registrations <v-btn text :href="$route('suppliers')">CLICK HERE</v-btn></div>
                         
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
                                       <td colspan="2" class="pa-5 text-center red--text">No procurement notices found</td>
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
