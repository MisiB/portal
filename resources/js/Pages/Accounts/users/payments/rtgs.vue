<template>
    <userlayout title="POP Upload">
        <v-container>
            <v-alert
                border="top"
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
            <v-stepper alt-labels>
                <v-stepper-header>
                    <v-stepper-step
                        step="1"
                        complete
                        complete-icon="mdi-check"
                    >
                        <small>Document Upload</small>
                    </v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step
                        step="2"
                        complete
                        complete-icon="mdi-check"
                    >
                        <small>Invoicing</small>
                    </v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step
                        step="3"
                    >
                        <small> Payment</small>
                    </v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step step="4">
                        <small>Finish</small>
                    </v-stepper-step>
                </v-stepper-header>
            </v-stepper>
        </v-container>

        <v-container>
            <v-card>
                <v-toolbar class="grey lighten-4" flat>
                    <v-app-bar-title>Bank Transfers POP</v-app-bar-title>
                    <v-spacer></v-spacer>
                         <v-btn rounded class="primary" depressed @click="addPop=true">Add POP</v-btn>
                </v-toolbar>
                            
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
                                <v-card-actions v-if="transfers.length>0">
                                        <inertia-link :href="$route('Bankpayments.index')" class="white--text v-btn v-btn--has-bg v-btn--rounded theme--light v-size--default red">Back</inertia-link>
                         <v-spacer></v-spacer>
                         <v-btn rounded depressed class="success" @click="upload">Submit</v-btn>
                                </v-card-actions>

                            </v-card>
                                  <v-dialog v-model="addPop" max-width="500">
                                      <v-form v-model="form" ref="form" lazy-validation>
                        
                            <v-card flat outlined>
                                <v-card-title>
                                    <div>New Transfer Details</div>
                                    <v-spacer></v-spacer>
                                    <v-btn icon @click="addPop=false"><v-icon>mdi-close</v-icon></v-btn>
                                </v-card-title>
                                <v-card-text>
                                    <v-row>
                                        <v-col cols="12" md="6">
                                     <v-text-field
                                v-model="referencenumber"
                                label="Reference Number"
                                outlined
                                :rules="referenceRules"
                            >                            
                            </v-text-field>
                                        </v-col>
                                        <v-col cols="12" md="6">
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
                                <v-col cols="12" md="6">
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
                                </v-col>
                                <v-col cols="12" md="6">
                              <v-file-input
                                label="Attach Proof of Payment"
                                v-model="pop"
                                :rules="popRule"
                                outlined
                            ></v-file-input>
                                </v-col>
                            </v-row>
                                </v-card-text>
                                <v-card-actions>
                         <inertia-link :href="$route('Invoicing.index')" class="white--text v-btn v-btn--has-bg v-btn--rounded theme--light v-size--default red">Back</inertia-link>
                         <v-spacer></v-spacer>
                         <v-btn rounded depressed class="success" @click="addtransfer">Submit</v-btn>
                    </v-card-actions>
                            </v-card>
                                      </v-form>
                            </v-dialog>
        </v-container>
        </userlayout>


 </template>
 <script>
 import  userlayout  from '../../../Layouts/userlayout';

export  default {
    props: ['errors', 'successMessage', 'errorMessage', 'online'],
    components: {
        userlayout
    },data(){
        return{
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
                transfers:[]
            



        }
    },methods:{
        upload(){           
       
            this.loading = true
             var formadata = new FormData()
             for (let index = 0; index < this.transfers.length; index++) {
                          console.log(this.transfers[index].bank)         
                 formadata.append('files[' + index + ']',this.transfers[index].proof);
                 formadata.append('referencenumber[' + index + ']',this.transfers[index].referencenumber)
                 formadata.append('date[' + index + ']',this.transfers[index].date)
                 formadata.append('bank[' + index + ']',this.transfers[index].bank)
             }
       
            this.$inertia.post('/bidders/rtgs',formadata,{onSuccess:(page)=>{
             this.loading = false
            },onError:(errors)=>{
              this.loading = false
            }}) 
            
        },addtransfer(){
             if(this.$refs.form.validate())
            {
          
            this.transfers.push({'proof':this.pop,'referencenumber':this.referencenumber,'bank':this.bank,'date':this.date});
            this.addPop = false
            
            }
        },openPop(){
            this.pop=null
            this.referencenumber=''
            this.bank=''
            this.date=''
            this.addPop=true
        },deleteItem(index){
            this.transfers.splice(index)
        }
    }
}
    </script>