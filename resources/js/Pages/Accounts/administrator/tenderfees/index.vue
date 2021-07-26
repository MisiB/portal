<template>
       <userlayout title="Tender Fees">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn> <v-btn text link disabled>Tender Fees</v-btn>
                    </div>
                </v-card-text>
            </v-card>               
             <v-card flat class="mt-4">
                 <v-card-title>
                    <div class="headline">Tender Fees</div>                  
                 </v-card-title>
                 <v-divider/>
                <v-card-text>
                    <template>
                        <v-tabs v-model="tab">
                            <v-tab>Establishment Fees</v-tab>
                            <v-tab>Contract Fees</v-tab>
                            <v-tab>Spoc Fees</v-tab>
                        </v-tabs>
                          <v-tabs-items v-model="tab">
                              <v-tab-item>
                                  <establishmentfees :currency="currency" :datalist="establishmentfees" :errors="errors"></establishmentfees>
                              </v-tab-item>
                               <v-tab-item>
                                   <contractfees :currency="currency" :datalist="contractfees" :errors="errors"></contractfees>
                              </v-tab-item>
                               <v-tab-item>
                                    <v-card flat class="mt-4">
               
                <v-card-text>
                    <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                   <th>Class</th>
                                   <th>Classification</th>
                                   <th>locality</th>
                                   <th>Value</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="clss in threshold" :key="clss.id">
                                    <td>
                                        {{clss.procurementclass.name}}
                                    </td>
                                     <td>
                                        {{clss.classification.name}}
                                    </td>
                                     <td>
                                        {{clss.locality}}
                                    </td>
                                     <td>
                                        {{clss.currency.name}}{{clss.value}}
                                    </td>
                                    <td class="d-flex pa-4 justify-end">                                       
                                             <spocfees :currency="currency" :datalist="clss" :errors="errors"></spocfees>
                                    </td>
                                </tr>
                            </tbody>
                        </template>
                    </v-simple-table>
                </v-card-text>
             </v-card>
                               
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
import establishmentfees from '../../../../Components/establishment'
import contractfees from '../../../../Components/contractfees'
import spocfees from '../../../../Components/spocfees'
import Vue from 'vue'

export  default {
    props: ['errors','successMessage','errorMessage','currency','contractfees','establishmentfees','threshold'],
    components: {
        userlayout,
        establishmentfees,
        contractfees,
        spocfees
    },
    data(){
        return{
           tab: null,
        }
    }
}
</script>