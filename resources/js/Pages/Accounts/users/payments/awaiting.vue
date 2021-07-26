<template>
    <userlayout title="Mobile Payments">
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


            <v-row>
                <v-col cols="12" md="10" offset-md="1">
                    <v-card>
                        <v-card-text class="d-flex">
                             <v-btn text link class="blue--text" :href="$route('dashboard')">Dashboard</v-btn><v-btn text disabled>Invoices Awaiting</v-btn>
                        </v-card-text>
                    </v-card>
                    <v-card class="mt-5">
                        <v-card-title>Invioces awaiting verification</v-card-title>
                        <v-card-text>
                            <v-simple-table>
                                <template slot="default">
                                    <thead>
                                        <tr>
                                            <th>Invoice number</th>
                                            <th>Total Due</th>
                                            <th>Total Paid</th>
                                            <th>Balance</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="inv in invoices" :key="inv.id" class="pa-2">
                                            <td>
                                                {{inv.invoicenumber}}
                                            </td>
                                            <td class="blue--text">
                                                {{inv.currency}}
                                               {{inv.total}}
                                            </td>
                                            <td class="green--text">
                                                {{inv.currency}}
                                               {{inv.paid}}
                                            </td>
                                            <td class="red--text">
                                                   {{inv.currency}}
                                               {{inv.balance}}
                                            </td>
                                             <td>
                                              <v-btn rounded small color="primary" depressed @click="showDialog(inv)">View</v-btn>
                                             </td>
 
                                        </tr>
                                    </tbody>
                                </template>
                            </v-simple-table>
                        </v-card-text>
                    </v-card>
                </v-col>
            </v-row>
            <v-dialog v-model="showModel" max-width="700">
                 <v-card>
                  <v-card-title>
                      <div>Transfers</div>
                      <v-spacer/>
                      <v-btn icon @click="showModel=false"><v-icon>mdi-close</v-icon></v-btn>
                  </v-card-title>
                  <v-card-text>
                       <v-simple-table>
                            <template slot="default">
                                    <thead>
                                        <tr>
                                            <th>Invoice number</th>
                                            <th>Reference Number</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <tr v-for="transfer in invoice.transfers" ::key="transfer.id">
                                          <td>
                                              {{transfer.invoicenumber}}
                                          </td>
                                          <td>
                                              {{transfer.referencenumber}}
                                          </td>
                                          <td>
                                            {{transfer.status}}  
                                          </td>
                                          <td class="d-flex">
                                                <v-btn rounded outlined small color="primary" :loading="loading" :disabled="loading" @click=" verify(transfer.id)" class="mr-2">Verify</v-btn>
                                                 <v-btn rounded outlined small color="success" :loading="loading" :disabled="loading" @click="edit(transfer.id,transfer.referencenumber)">Edit</v-btn>
                                          
                                            </td>
                                      </tr>
                                    </tbody>
                            </template>
                        </v-simple-table>
                  </v-card-text>
                </v-card> 
            </v-dialog>

            <v-dialog v-model="editModel" max-width="300">
                <v-form v-model="form" ref="form" lazy-validation>
                <v-card>
                    <v-card-title>
                        <div>Edit Reference Number</div>
                        <v-spacer></v-spacer>
                        <v-btn icon @click="editModel=false"><v-icon>mdi-close</v-icon></v-btn>
                    </v-card-title>
                    <v-card-text>
                         <v-text-field
                                v-model="referencenumber"
                                label="Enter reference number"
                                outlined
                                :rules="referencenumberRules"
                            >
                            </v-text-field>
                    </v-card-text>
                    <v-card-actions>
                        <v-btn rounded outlined color="error">Cancel</v-btn>
                        <v-spacer></v-spacer>
                        <v-btn rounded outlined color="success" :loading="loading" :disabled="loading" @click="updateRef">Update</v-btn>
                    </v-card-actions>
                </v-card>
                </v-form>
            </v-dialog>
        </v-container>
   
    </userlayout>

</template>

<script>
import  userlayout  from '../../../Layouts/userlayout';
import Vue from 'vue'
export  default {
    props: ['errors', 'successMessage', 'errorMessage', 'invoices'],
    components: {
        userlayout
    },data(){
        return{
            loading:false,
            disabled:true,
            id:'',
            editModel:false,
            referencenumber:'',
            referencenumberRules:[v=> !!v || 'Enter reference number'],
            form:true,
            invoice:'',
            showModel:false
             
        }
    },methods:{
          verify(id){
              this.loading = true
               this.$inertia.get(this.$route('awaiting.show',id), {onSuccess: (page)=>{
              this.loading =false
            },onError:(err)=>{
             this.loading = false
            }})
          },edit(id,referencenumber){
              this.id = id
              this.referencenumber=referencenumber
            this.editModel = true

        },updateRef(){
              var data = {referencenumber:this.referencenumber}
              this.loading = true
              this.editModel = false
            this.$inertia.put(this.$route('awaiting.update',this.id),data,{onSuccess:(page)=>{
                this.loading = false
            },onError:(err)=>{
             this.loading = false
            }})
        },showDialog(invoice){
            this.invoice = invoice
            this.showModel = true
        }
    }
}
</script>