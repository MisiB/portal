<template>
       <userlayout title="Dashboard">
          <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                          <v-btn text link :href="$route('dashboard')" >Dashboard</v-btn> <v-btn text link :href="$route('TenderFees.index')" >My Tender Fees</v-btn> <v-btn text link disabled>Manual Request</v-btn>
                   </div>
                </v-card-text>
            </v-card> 
        
           
                                  
                <v-card class="mt-5">
                  <v-card-title>Tender fee Request<v-spacer/> <v-btn icon @click="bidbondDialog=false"><v-icon>mdi-close</v-icon></v-btn></v-card-title>
                  <v-card-text>                     
                      <v-row>
                          <v-col>
                               <v-text-field v-model="tendernumber" label="Tender Number"  outlined  :error-messages="errors.tendernumber"></v-text-field>
                   
                          </v-col>
                          <v-col>
                              <v-select :items="entitylist" item-value="id" item-text="name" label="Select Entity" outlined v-model="entity" :error-messages="errors.entity"></v-select>
                     
                          </v-col>
                      </v-row>
                      <v-row>
                          <v-col>
                                 <v-select :items="feetypes" item-value="value" item-text="name" label="Select Fee Type" outlined v-model="feetype" :error-messages="errors.feetype"></v-select>
                     
                          </v-col>
                          <v-col>
                              <v-text-field v-model="closedate" label="Tender Closing Date" outlined prepend-inner-icon="mdi-calendar" type="date" :error-messages="errors.closedate"></v-text-field>
                   
                          </v-col>
                          </v-row>
                          <v-row>
                          <v-col>
                              <v-alert color="red lighten-2" v-if="feetype=='BIDBOND'">Note your Bid Security will only be processed after your bid establishment fee has been receipted. Please make sure you also upload Bid Establishment Fee Proof of Payment</v-alert>
              
                                <v-select :items="periodlist" item-value="value" item-text="name" v-if="feetype=='BIDBOND'" label="Select Validity Period(Days)" outlined v-model="period" :error-messages="errors.period"></v-select>
                                
                          </v-col>
                         </v-row>
                         <v-row>
                             <v-col>
                                 <v-select :items="currencylist" item-value="id" item-text="name" label="Select Currency" outlined v-model="currency" :error-messages="errors.currency"></v-select>
          
                             </v-col>
                             <v-col>
                                 <v-text-field v-model="amount" label="Amount" outlined prepend-inner-icon="mdi-currency-usd" :error-messages="errors.amount"></v-text-field>
            
                             </v-col>
                         </v-row>
                         <v-card class="mt-3">
                             <v-card-title>
                                 <div>Upload Proof of Payment</div>
                                 <v-spacer/>
                                 <v-btn  color="primary" depressed @click="showDialog">
                                     Add Document
                                 </v-btn>
                             </v-card-title>
                             <v-divider/>
                             <v-card-text>
                                  <p class="pa-10 red--text lighten-3 text-center body-1" v-if="transfers.length ==0">
                                    No bank transfer details added as yet. If you have made more than one bank payment please add them all before clicking the submit button
                                  </p>
                                  <div v-else>
                                    <v-simple-table>
                                        <template v-slot:default>
                                            <thead>
                                                <tr>
                                                    <th>Bank</th>
                                                    <th>Date</th>
                                                    <th>Reference</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(tran,index) in transfers" :key="index">
                                                  <td>
                                                      {{tran.bank}}
                                                  </td>
                                                   <td>
                                                      {{tran.date}}
                                                  </td>
                                                  <td>
                                                      {{tran.referencenumber}}
                                                  </td>
                                                  <td><v-btn icon @click="deleteItem(index)"><v-icon>mdi-close</v-icon></v-btn></td>
                                                </tr>
                                            </tbody>
                                        </template>
                                    </v-simple-table>
                                  </div>
                             </v-card-text>
                         </v-card>
                                                                  
                  </v-card-text>
                    <v-card-actions>
                     <v-btn  outlined rounded text  class="red  white--text" > Cancel  </v-btn>
                    <v-spacer/>
                     <v-btn outlined rounded text class="green white--text"  @click="submit" :loading="loading"  :disabled="loading"> Submit </v-btn>
                  </v-card-actions>
                </v-card>
   

                <v-dialog v-model="popDialog" max-width="500">
                     <v-form v-model="formpop" ref="formpop" lazy-validation>
                    <v-card>
                        <v-card-title>
                            <div>Add Proof of Payment</div>
                            <v-spacer/>
                            <v-btn icon @click="popDialog=false">
                                <v-icon>mdi-close</v-icon>
                            </v-btn>
                        </v-card-title>
                        <v-card-text>
                              <v-row>
                                        <v-col>
                                     <v-text-field
                                v-model="referencenumber"
                                label="Reference Number"
                                outlined
                                :rules="referenceRules"
                            >                            
                            </v-text-field>
                                        </v-col>
                                        </v-row>
                            <v-row>
                                        <v-col>
                             <v-text-field
                                v-model="bank"
                                label="Bank Name"
                                outlined
                                :rules="bankRules"
                            >
                            </v-text-field>
                                        </v-col>
                                    </v-row>
                            <v-row>
                                <v-col>
                                <v-text-field
                                    v-model="date"
                                    :rules="dateRules"
                                    label="Transaction Date"
                                    prepend-inner-icon="mdi-calendar"
                                    outlined
                                    type="date"
                                ></v-text-field>
       
                                </v-col>
                            </v-row>
                                <v-row>
                                <v-col>
                              <v-file-input
                                label="Attach Proof of Payment"
                                v-model="filename"
                                :rules="popRule"
                            ></v-file-input>
                                </v-col>
                            </v-row>
                        </v-card-text>
                        <v-card-actions>
                         <v-btn rounded depressed class="error" @click="popDialog=false">Cancel</v-btn>
                              <v-spacer></v-spacer>
                         <v-btn rounded depressed class="success" @click="addPop">Add</v-btn>
                        </v-card-actions>
                    </v-card>
                    </v-form>
                </v-dialog>
          </v-container>
       </userlayout>
</template>
<script>
import  userlayout  from '../../../../Layouts/userlayout';
import Vue from 'vue'
export  default {
    props: ['errors','successMessage','errorMessage','entitylist','currencylist'],
    components: {
        userlayout
    },
    data(){
        return{
            feetypes:[{'value':'SPOC','name':'SPOC FEE'},{'value':'CONTRACT FEE','name':'CONTRACT FEE'},{'value':'ESTABLISHMENT FEE','name':'BID ESTABLISHMENT FEE'},{'value':'BIDBOND','name':'BID SECURITY FEE'}],
            periodlist:[{'value':30,'name':'30 days'},{'value':60,'name':'60 days'},{'value':90,'name':'90 days'}],
            transfers:[],
            popDialog:false,
            referencenumber:'',
            date:'',
            bank:'',
            filename:null,
            popRule:[v => !!v || 'Upload proof of payment'],
            dateRules:[v => !!v || 'Transfer date required'],
            bankRules:[v => !!v || 'Bank name required'],
            referenceRules:[v => !!v || 'Reference numer required'],
            formpop:true,
            tendernumber:'',
            period:'',
            currency:'',
            closedate:'',
            amount:'',
            entity:'',
            feetype:'',
            loading:false
         
        }
    },methods: {
      submit(){

           if(this.transfers.length > 0)
           {
            var formadata = new FormData()
            
             for (let index = 0; index < this.transfers.length; index++) {
                          console.log(this.transfers[index].bank)         
                 formadata.append('files[' + index + ']',this.transfers[index].proof);
                 formadata.append('referencenumber[' + index + ']',this.transfers[index].referencenumber)
                 formadata.append('date[' + index + ']',this.transfers[index].date)
                 formadata.append('bank[' + index + ']',this.transfers[index].bank)
             }

             formadata.append('tendernumber',this.tendernumber)
             formadata.append('period',this.period)
             formadata.append('currency',this.currency)
             formadata.append('closedate',this.closedate)
             formadata.append('amount',this.amount)
             formadata.append('entity',this.entity)
             formadata.append('feetype',this.feetype)
             this.loading = true
        this.$inertia.post(this.$route('TenderFees.store'),formadata,{
           
           onSuccess:(page)=>{
               this.loading = false
               if(this.successMessage)
               {
              Vue.swal('Successful', this.successMessage,'success')
             
               }

               if(this.errorMessage){
                 Vue.swal('Error',this.errorMessage,'error')
               }
            },
            onError:(error)=>{
                this.loading = false
                if(this.errorMessage)
                {
                     Vue.swal('Ooops', this.errorMessage,'error')
                }
            }
        })
        }else{
           Vue.swal('Validation Error','Please upload your proof of payment','error')
        }
      },
      showDialog(){
      this.popDialog = true,
      this.referencenumber = '',
      this.date='',
      this.bank='',
      this.filename=null
      },
      addPop()
      {
             if(this.$refs.formpop.validate())
            {
            this.transfers.push({'proof':this.filename,'referencenumber':this.referencenumber,'bank':this.bank,'date':this.date});
            this.popDialog= false
            }
      },deleteItem(index){
            this.transfers.splice(index)
        }
    }
}
</script>