<template>
    <userlayout title="Receipting">
        <v-container>
            <v-alert
                color="error"
                v-if="errorMessage"
            >
                {{errorMessage}}
            </v-alert>
            <v-alert
                class="success"
                dark
                v-if="successMessage"
            >
                {{successMessage}}
            </v-alert>
             <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('dashboard')" >Dashboard</v-btn> <v-btn text link :href="$route('Tenderpayment.index')" >Tender Fee Invoice</v-btn> <v-btn text link disabled>Tender Fees</v-btn>
                    </div>
                </v-card-text>
            </v-card>
        
            <v-row>
                <v-col cols="12" class="col-md-8 offset-md-2">
                    <v-card class="mt-5">
                     <v-card-title>  Receipting</v-card-title>
                     <v-divider/>
                            <v-card-text>
                                <v-row class="mt-4">
                                    <v-col  sm="8"><div class="title">Total Due</div></v-col>
                                    <v-spacer></v-spacer>
                                    <v-col  sm="4" class="text-right">
                                        <div class="headline red--text"><small>{{currency}}</small> {{totalDue}}</div>
                                    </v-col>
                                </v-row>

                                 <v-row class="mt-4">
                                    <v-col  sm="8"><div class="title">Total Paid</div></v-col>
                                    <v-spacer></v-spacer>
                                    <v-col  sm="4" class="text-right">
                                        <div class="headline green--text"><small>{{currency}}</small> {{totalPaid}}</div>
                                    </v-col>
                                </v-row>
                                 <v-row class="mt-4">
                                    <v-col  sm="8"><div class="title">Balance</div></v-col>
                                    <v-spacer></v-spacer>
                                    <v-col  sm="4" class="text-right">
                                        <div class="headline red--text"><small>{{currency}}</small> {{due}}</div>
                                    </v-col>
                                </v-row>
                               
                              

                               
                                 <v-card class="text-center mt-4" v-if="due>0">
                                   
                                          <v-card-text class="text-center">                                      
                                     
                                             
                                                    <v-row>
                                                        <v-col cols="6" sm="3">
                                                            <v-img
                                                                lazy-src="/img/upload.jpg"
                                                                max-height="50"
                                                                max-width="100"
                                                                src="/img/upload.jpg"
                                                            ></v-img>
                                                        </v-col>
                                                        <v-col cols="6" sm="6">
                                                            <div class="headline">Upload Proof Of Payment</div>
                                                        </v-col>
                                                        <v-col cols="12" sm="3">
                                                            <v-btn rounded block depressed class="blue white--text" @click="bankDialog=true">CHOOSE</v-btn>
                                                            
                                                        </v-col>
                                                    </v-row>
                                                
                                                    
                                      
                                     </v-card-text>
                                     
                                 </v-card>
                           
                            </v-card-text>

                            </v-card>

                </v-col>
            </v-row>

            <!-- dialog scripts -->

            <v-dialog v-model="bankDialog" max-width="600">
                        <v-form ref="bankform" v-model="bankform" lazy-validation>
                                               <v-card>
                                                   <v-card-title>Capture Bank Transaction Details</v-card-title>
                                                   <v-card-text>
                                                       <div class="red--text">
                                                           Please upload  your bank reference number and proof of payment<br/>
                                                           Please make sure you are capturing funds that you deposited in our {{type}} account in order to complete this transaction
                                                      </div>
                                                       <v-text-field
                                v-model="referencenumber"
                                label="Reference Number"
                                outlined
                                :rules="referenceRules"
                                class="mt-4"
                            >                            
                            </v-text-field>
                                <v-text-field
                                v-model="bank"
                                label="Bank Name"
                                outlined
                                :rules="bankRules"
                            >
                            </v-text-field>
                                  <v-dialog
                                ref="dialog"
                                v-model="modal"
                                :return-value.sync="date"
                                persistent
                                width="290px"
                            >
                                                <template v-slot:activator="{ on, attrs }">
                                                <v-text-field
                                                    v-model="date"
                                                    :rules="dateRules"
                                                    label="Transaction Date"
                                                    prepend-inner-icon="mdi-calendar"
                                                    readonly
                                                    v-bind="attrs"
                                                    v-on="on"
                                                    outlined
                                                ></v-text-field>
                                                </template>
                                                <v-date-picker
                                                v-model="date"
                                                scrollable
                                                >
                                                <v-spacer></v-spacer>
                                                <v-btn
                                                    text
                                                    color="primary"
                                                    @click="modal = false"
                                                >
                                                    Cancel
                                                </v-btn>
                                                <v-btn
                                                    text
                                                    color="primary"
                                                    @click="$refs.dialog.save(date)"
                                                >
                                                    OK
                                                </v-btn>
                                                </v-date-picker>
                                            </v-dialog>

                                                <v-file-input
                                label="Attach Proof of Payment"
                                v-model="pop"
                                :rules="popRule"
                                
                            ></v-file-input>

                                                   </v-card-text>
                                             <v-card-actions>
                                                     <v-btn rounded depressed class="error" @click="bankDialog=false">Cancel</v-btn>
                               <v-spacer></v-spacer>
                         <v-btn rounded depressed class="success" @click="addtransfer">Submit</v-btn>
                    </v-card-actions>
                                               </v-card>
                                               </v-form>
            </v-dialog>


            <!-- Mobile dialog -->

       
        </v-container>
    </userlayout>
</template>
<script>
import  userlayout  from '../../../../Layouts/userlayout';
import Vue from 'vue'

export  default {
    props: ['errors', 'successMessage', 'errorMessage', 'balance', 'totalDue','totalPaid','due', 'ENABLE_ECOCASH','currency','type'],
    components: {
        userlayout
    },
    data() {
        return {
              loading:false,
            disabled:true,
            value:0,
            
                menu: false,
                modal: false,
                menu2: false,
                referencenumber:'',
                referenceRules:[v=>!!v || 'Bank Reference Number Required'],
                bank:'',
                bankRules:[v=>!!v || 'Bank Name Required'],
                date: '',
                dateRules:[v=>!!v || 'transaction date Required'],
                pop:null,
                popRule:[v => !!v || 'Upload proof of payment'],
                form:true,
                alert:true,
                addPop:false,
                bankform:true,
                bankDialog:false,
                mobileDialog:false,
                mobileForm:true,
                mode:''
        }

    },methods:{
        addtransfer(){
               if(this.$refs.bankform.validate()){
                         this.loading = true
                         var formdata = new FormData();
                         formdata.append('proof',this.pop)
                         formdata.append('bank',this.bank)
                         formdata.append('referencenumber',this.referencenumber)
                         formdata.append('date',this.date)
                         formdata.append('type',this.type)
                         this.$inertia.post('/bidders/TenderBankpayments',formdata,{onSuccess:(page)=>{
                           this.loading = false
                         },onError:(error)=>{
                             this.loading = false
                         }})
               }
        },showMobile(mode){
            this.mode = mode
            this.mobileDialog = true
        }
    }
}
</script>


