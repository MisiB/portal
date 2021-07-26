<template>
       <userlayout title="Tender Receipting">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn> <v-btn text link disabled>Tender Receipting</v-btn>
                    </div>
                </v-card-text>
            </v-card> 
                              
             <v-card flat class="mt-4">
                 <v-card-title>
                     <div class="headline">Outstanding Invoices</div>
                    
                 </v-card-title>
                 <v-divider/>
                <v-card-text>                   
                       <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                   <th>Invoice number</th>
                                   <th>tender Number</th>
                                   <th>Type</th>
                                   <th>Description</th>
                                   <th>Year</th>
                                    <th>Amount Due</th>
                                    <th>Receipted</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="inv in invoices" :key="inv.id">
                                    <td>
                                        {{inv.invoice_number}}
                                    </td>
                                    <td>
                                        {{inv.tendernumber}}
                                    </td>
                                    <td>
                                        {{inv.type}}
                                    </td>
                                    <td>
                                        {{inv.description}}
                                    </td>
                                    <td>
                                        {{inv.year}}
                                    </td>
                                    <td>
                                        {{inv.currency.name}}{{inv.amount}}
                                    </td>
                                    
                                    <td class="d-flex pa-4 justify-end">                                      
                                          <v-btn small depressed class="ml-2" @click="removeItem(inv.id)" color="error">
                                            <v-icon>mdi-cancel</v-icon>
                                        </v-btn>
                                         <v-btn small depressed class="ml-2" color="success" @click="showtransactions(inv.id,inv.description)">
                                            <v-icon>mdi-upload</v-icon>
                                        </v-btn>

                                    </td>
                                </tr>
                              
                               
                            </tbody>
                        </template>
                    </v-simple-table>
                    <v-card class="mt-5">
                        <v-card-title>
                    <div class="headline">Receipts </div>
                    <v-spacer/>
                    <div>{{invoices[0].currency.name}}{{totalreceipt}}</div>
                        </v-card-title>
                        <v-card-text>
                     <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                   <th>Date</th>
                                   <th>Invoice number</th>
                                   <th>Receipt number</th>
                                   <th>Type</th>
                                   <th>Description</th>
                                   <th>Method</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="rpt in invoices[0].receipts" :key="rpt.id">
                                 <td>
                                     {{rpt.created_at}}
                                 </td>
                                  <td>
                                     {{rpt.invoicenumber}}
                                 </td>
                                  <td>
                                     {{rpt.receiptnumber}}
                                 </td>
                                 <td>
                                     {{rpt.type}}
                                 </td>
                                 <td>
                                     {{rpt.description}}
                                 </td>
                                  <td>
                                     {{rpt.method}}
                                 </td>
                                  <td>
                                     {{rpt.currency}}{{rpt.amount}}
                                 </td>
                                </tr>
                            </tbody>
                        </template>
                     </v-simple-table>
                        </v-card-text>
                    </v-card>
                </v-card-text>
             </v-card>

                <v-dialog v-model="selectDialog" max-width="400">
              <v-card>
                  <v-card-title>{{title}}<v-spacer/> <v-btn icon @click="selectDialog=false"><v-icon>mdi-close</v-icon></v-btn></v-card-title>
                  <v-card-text>
                      <v-row>
                          <v-col>
                                <v-text-field
                                           v-model="name"
                                           label="Bank Name"
                                           outlined
                                          :error-messages="errors.name"
                                         >
                                       </v-text-field>
                                          <v-text-field
                                           v-model="paymentdate"
                                           label="Payment date"
                                           type="date"
                                           outlined
                                          :error-messages="errors.paymentdate"
                                         >                                           
                                       </v-text-field>
                                       <v-file-input
                                                show-size
                                                counter
                                                outlined
                                                label="Attach POP"
                                                prepend-icon="mdi-pdf-box"
                                                accept=".pdf"
                                                v-model="filename"
                                                :error-messages="errors.filename"
                                            >
                                            </v-file-input>
                          </v-col>
                        </v-row>
                     
                  </v-card-text>
                  <v-card-actions>
                      <v-btn small class="error" rounded depressed @click="selectDialog=false">Cancel</v-btn>
                      <v-spacer/>
                       <v-btn small class="success" rounded depressed @click="submitTransaction" :loading="loading" :disabled="loading">Submit</v-btn>
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
    props: ['errors','successMessage','errorMessage','invoices','transactions','totalinvoice','totalreceipt'],
    components: {
        userlayout
    },
    data(){
        return{
         selectDialog:false,
         id:'',
         name:'',
         paymentdate:'',
         filename:'',
         loading:false,
         title:''
          }
    },methods: {
        showtransactions(id,title){
            this.name = ""
        this.paymentdate=""
        this.filename=null
         this.id = id
         this.title = title
         this.selectDialog = true
        },removeItem(id){
          this.$inertia.delete(this.$route('tenderreceipting.destroy',id))
      },submitTransaction(){
          var formdata = new FormData()
          formdata.append('filename',this.filename)
          formdata.append('name',this.name)
          formdata.append('paymentdate',this.paymentdate)
          formdata.append('id',this.id),
          this.loading = true,
        this.$inertia.post(this.$route('tenderreceipting.store'),formdata,{
            onSuccess:(page)=>{
                 this.loading = false
                 this.selectDialog = false;
                 if(this.successMessage)
                 {
                     Vue.swal(
                                            'Successful',
                                            this.successMessage,
                                            'success'
                                            )
                 }
                 if(this.errorMessage){
                     Vue.swal(
                                            'Ooops',
                                            this.errorMessage,
                                            'error'
                                            ) 
                 }
                                        
                    
            },
            onError:(error)=>{
                this.loading = false
            }
        })
      }


    }
}
</script>