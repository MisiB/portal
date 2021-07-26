<template>
       <userlayout title="Tender Invoicing">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn> <v-btn text link disabled>Tender Invoicing</v-btn>
                    </div>
                </v-card-text>
            </v-card> 
                 <v-card flat class="mt-4">
                 <v-card-title>
                     <div>
                     <div class="headline">{{profile.name}}</div>
                     <div>{{profile.regnumber}}</div>
                     </div>
                    <v-spacer/>
                      <v-btn
                        class="mx-2"
                        fab
                        dark
                        depressed
                        color="indigo"
                        @click="selectDialog=true"
                        >
                        <v-icon dark>
                            mdi-plus
                        </v-icon>
                        </v-btn>
                 </v-card-title>
                 </v-card>              
             <v-card flat class="mt-4">
                 <v-card-title>
                     <div class="headline">Refundables</div>
                    
                 </v-card-title>
                 <v-divider/>
                <v-card-text>                   
                       <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                   <th>Entity</th>
                                   <th>tender Number</th>
                                   <th>Closing Date</th>
                                   <th>Validity Period</th>
                                   <th>Maturity Date</th>
                                    <th>Refunded</th>
                                    <th>Payment status</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="bid in profile.bidbonds" :key="bid.id">
                                    <td>
                                        {{bid.entity.name}}
                                    </td>
                                    <td>
                                        {{bid.tendernumber}}
                                    </td>
                                    <td>
                                        {{bid.closing_date}}
                                    </td>
                                    <td>
                                        {{bid.validityperiod}}
                                    </td>
                                    <td>
                                        {{bid.maturitydate}}
                                    </td>
                                    <td>
                                        {{bid.refunded}}
                                    </td>
                                    <td>
                                        {{bid.paymentstatus}}
                                    </td>
                                    <td class="d-flex pa-4 justify-end">                                      
                                          <v-btn class="success" small :href="$route('downloadbidbond.show',bid.uuid)"  v-if="bid.paymentstatus=='PAID'">
                                            <v-icon>mdi-download</v-icon>
                                          </v-btn>

                                    </td>
                                </tr>
                            </tbody>
                        </template>
                    </v-simple-table>
                </v-card-text>
             </v-card>

              <v-card flat class="mt-4">
                 <v-card-title>
                     <div class="headline">Non Refundables</div>
                                     
                 </v-card-title>
                 <v-divider/>
                <v-card-text>                   
                   <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                   <th>Entity</th>
                                   <th>tender Number</th>
                                   <th>Description</th>
                                   <th>Amount</th>
                                  <th>Payment status</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="fee in profile.administrationfees" :key="fee.id">
                                    <td>
                                        {{fee.entity.name}}
                                    </td>
                                    <td>
                                        {{fee.tendernumber}}
                                    </td>
                                    <td>
                                        {{fee.description}}
                                    </td>
                                    <td>
                                        {{fee.amount}}
                                    </td>
                                    <td>
                                        {{fee.paymentstatus}}
                                    </td>                                   
                                    <td class="d-flex pa-4 justify-end">                                      
                                         <v-btn class="success" v-if="fee.paymentstatus=='PAID'" small :href="$route('downloadadminfees.show',fee.uuid)">
                                            <v-icon>mdi-download</v-icon>
                                          </v-btn>

                                    </td>
                                </tr>
                            </tbody>
                        </template>
                    </v-simple-table>  
                </v-card-text>
             </v-card>
           
               
                  <v-dialog v-model="selectDialog" max-width="500">
              <v-card>
                  <v-card-title>Tender Invoicing<v-spacer/> <v-btn icon @click="selectDialog=false"><v-icon>mdi-close</v-icon></v-btn></v-card-title>
                  <v-card-text>
                      <div class=" mb-4 mt-4 red--text d-flex">
                        <v-icon  color="red">mdi-alert</v-icon>
                        <div>Please Make sure you capture details as on tender document</div>
                      </div>
                      <v-row>
                          <v-col>
                                       <v-select
                                           :items="entity"
                                           item-value="id"
                                           item-text="name"
                                           label="Select Entity"
                                           outlined
                                           v-model="form.entity"
                                            :error-messages="errors.entity"
                                       >                                    
                               
                                       </v-select>
                          </v-col>
                      </v-row>
                      <v-row>
                           <v-col>
                                        <v-text-field
                                           v-model="form.tendernumber"
                                           label="Tender Number"
                                           outlined
                                            :error-messages="errors.tendernumber"
                                         >
                                       </v-text-field>
                           </v-col>
                      </v-row>
                      <v-row>
                          <v-col>
                                       <v-select
                                           :items="feetypes"
                                           item-value="value"
                                           item-text="name"
                                           label="Select Fee"
                                           outlined
                                           v-model="form.fee"
                                            :error-messages="errors.fee"
                                       >
                                       </v-select>
                          </v-col>
                      </v-row>
                      <v-row>
                          <v-col>
                                        <v-select
                                        v-if="form.fee=='BIDBOND'"
                                           :items="periodlist"
                                           label="Select Validity Period(Days)"
                                           outlined
                                           v-model="form.period"
                                            :error-messages="errors.period"
                                       >
                                       </v-select>
                          </v-col>
                      </v-row>
                        <v-row>
                            <v-col>
                                        <v-select
                                           :items="currency"
                                           item-value="id"
                                           item-text="name"
                                           label="Select Currency"
                                           outlined
                                           v-model="form.currency"
                                            :error-messages="errors.currency"
                                       >
                                       </v-select>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col>
                                       <v-text-field
                                        v-model="form.amount"
                                        label="Amount"
                                        outlined
                                        prepend-inner-icon="mdi-currency-usd"
                                         :error-messages="errors.amount"
                                    ></v-text-field>
                            </v-col>
                        </v-row>
                        <v-row>
                            <v-col>
                        <v-text-field
                            v-model="form.date"
                            label="Tender Closing Date"
                            outlined
                            type="date"
                            :error-messages="errors.date"
                        ></v-text-field>     
                            </v-col>
                        </v-row>
                        <v-row>
                          <v-col>
                        <v-text-field
                            v-model="form.bank"
                            label="Bank name"
                            outlined
                            :error-messages="errors.bank"
                        ></v-text-field>     
                            </v-col>
                        </v-row>
                        <v-row>
                               <v-col>
                                 <v-file-input label="Attach Proof of Payment" v-model="form.filename" outlined :error-messages="errors.filename"></v-file-input>
   
                                </v-col>
                        </v-row>
                                   
                      
                                 </v-card-text>
                     <v-card-actions>

                                    <v-btn
                                        outlined
                                        rounded
                                        text
                                        class="red  white--text"
                                    >
                                        Cancel
                                    </v-btn>
                                <v-spacer/>
                                    <v-btn
                                        outlined
                                        rounded
                                        text
                                        class="green white--text"
                                        @click="submitFee"
                                        :loading="form.processing"
                                        :disabled="form.processing"
                                    >
                                        Submit
                                    </v-btn>

                            </v-card-actions>
              </v-card>
         
           
        </v-dialog>  
                
           </v-container>
       </userlayout>
</template>
<script>
import  userlayout  from '../../../Layouts/administratorlayout';
import Vue from 'vue'

export  default {
    props: ['errors','successMessage','errorMessage','profile','entity','currency','transactions'],
    components: {
        userlayout
    },
    data(){
        return{
         feetypes:[{'value':'SPOC','name':'SPOC FEE'},{'value':'CONTRACT FEE','name':'CONTRACT FEE'},{'value':'ESTABLISHMENT FEE','name':'BID ESTABLISHMENT FEE'},{'value':'BIDBOND','name':'BID SECURITY FEE'}],
         periodlist:[30,60,90],
         selectDialog:false,
         search:'',
         menu:false,
         transactionarray:[],
          form:this.$inertia.form({
             tendernumber:'',
             entity:'',
             fee:'',
             currency:'',
             amount:'',
             period:'',
             date:'',
             company:this.profile.id,
             filename:null,
             bank:''
          }),
          
        }
    },methods: {
     submitFee(){
         this.form.post(this.$route('tenderinvoicing.store'),{
             onSuccess:(page)=>{
                   if(this.successMessage)
                 {
                     this.form.reset()
                     this.selectDialog= false
                Vue.swal(
                         'Successful',
                          this.successMessage,
                         'success'
                        )

                 }
                 if(this.errorMessage){
                  Vue.swal(
                         'Oops',
                          this.errorMessage,
                         'error'
                        )
                 }
             }
         })
      }

    }
}
</script>