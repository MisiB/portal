<template>
   <div>
          <v-btn small depressed color="primary" @click="addModel=true">
            View
          </v-btn>

           <v-dialog max-width="500" v-model="addModel">
                 <v-card>
                     <v-card-title>
                         <div>Refund Details</div>
                         <v-spacer/>
                         <v-btn icon @click="addModel=false"><v-icon>mdi-close</v-icon></v-btn>
                     </v-card-title>
                     <v-card-text>
                         <h5>Tender details</h5>
                          <v-simple-table>
                              <tbody>
                                  <tr><th>Tender Number</th><td class="text-right">{{bid.tendernumber}}</td></tr>
                                  <tr><th>Amount</th><td class="text-right">{{bid.currency}}{{bid.amount}}</td></tr>
                              </tbody>
                          </v-simple-table>

                          <h5>Refund Details</h5>
                          <v-simple-table>
                              <tbody>
                                  <tr><th>Bank</th><td class="text-right">{{bid.refunddata.bank}}</td></tr>
                                  <tr><th>Account number</th><td class="text-right">{{bid.refunddata.accountnumber}}</td></tr>
                                  <tr><th>Amount</th><td class="text-right">{{bid.refunddata.currency}}{{bid.refunddata.amount}}</td></tr>
                                  <tr><th>Status</th><td class="text-right">{{bid.refund}}</td></tr>
                                   <tr><td colspan="2"><v-btn rounded x-small  color="primary" block  @click="downloadRequestletter(bid.refunddata.requestletter)">Download Request Letter</v-btn></td></tr>
                               
                                  <tr v-if="bid.refund=='AWAITING'"><td colspan="2"><v-btn rounded x-small  color="primary" @click="authorize(bid.refunddata.id)">Authorize</v-btn></td></tr>
                                  <tr v-if="bid.refund=='APPROVED' || bid.refund=='PROCESSED'"><td colspan="2"><v-btn rounded x-small block color="success" @click="showletter(bid.id)">Download Authorization Letter</v-btn></td></tr>
                                  <tr v-if="bid.refund=='APPROVED'"><td colspan="2"><v-btn rounded x-small block color="blue" @click="transferModel=true">Capture Transfer Details</v-btn></td></tr>
                            
                              </tbody>
                          </v-simple-table>
                            
                     </v-card-text>
                 </v-card>
              
             </v-dialog>
             <v-dialog max-width="400" v-model="transferModel">
               <v-card>
                     <v-card-title>
                         <div>Capture Transfer Details</div>
                         <v-spacer/>
                         <v-btn icon @click="transferModel=false"><v-icon>mdi-close</v-icon></v-btn>
                     </v-card-title>
                     <v-card-text>
                      <v-text-field
                                           v-model="form.referencenumber"
                                           label="Reference Number"
                                           :error-messages="errors.referencenumber"
                                           outlined
                                       >
                                       </v-text-field>
                     </v-card-text>
                      <v-card-actions>
                   <v-btn rounded outlined color="red" @click="addModel=false">Cancel</v-btn>
                    <v-spacer/>
                    <v-btn rounded outlined color="green" @click="submit" :loading="form.processing" :disabled="form.processing">Submit</v-btn>
                </v-card-actions>
            </v-card>
             </v-dialog>
   </div>
</template>

<script>
import Vue from 'vue' 
export default {
 props:['bid','errors'],
     data(){
        return{
            addModel:false,
            transferModel:false,
            form:this.$inertia.form({
              referencenumber:""
            })
        }
     },
     methods:{
      authorize(id){
            Vue.swal({
                    title: 'Are you sure?',
                    text: "You want to authorize Bid Bond Refund",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Authorize'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.loading= true
                        this.$inertia.get(this.$route('report-bidbond-refund.show',id),{
                                    onSuccess:(page)=>{
                                    this.loading = false
                                        Vue.swal(
                                            'Authorized',
                                            'Refund Successfully Authorized',
                                            'success'
                                            )
                                    },
                                    onError:(error)=>{
                                        this.loading = false
                                    }
                                }) 
                    
                    }else{
                        this.loading = false
                    }
                 })  
      },
      downloadRequestletter(path){
          window.open("/"+path, "_blank")
      },
      showletter(id){
           window.open(this.$route('report-bidbond-refund.edit',id), "_blank") 
      },
          submit(){
          this.form.put(this.$route('report-bidbond-refund.update',this.bid.refunddata.id),{
              onSuccess:(page)=>{
                  if(this.successMessage){
                      Vue.swal('Success',this.successMessage,'success')
                      this.form.reset()
                      this.addModel = false;
                  }
                  if(this.errorMessage){
                     Vue.swal('Oops',this.errorMessage,'error') 
                  }
              }
          })
       }
     }
}
</script>

<style>

</style>