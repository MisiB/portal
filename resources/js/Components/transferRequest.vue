<template>
<div>
    <v-btn small depressed color="primary" @click="showPop=true">New Request</v-btn>
      <v-dialog v-model="showPop" max-width="600">
           <v-card>
               <v-card-title>
                  <div>Transfer Request</div>
                  <v-spacer/>
                   <v-btn small depressed color="error"  @click="showPop=false">Close</v-btn>
                </v-card-title>
               <v-card-text>
                                    <v-select
                                            v-model="form.accountnumber"
                                           label="Bank Account number"
                                           :items="accountlist"
                                           :error-messages="errors.accountnumber"
                                           outlined
                                       >
                                    </v-select>
                                      <v-text-field
                                            v-model="form.regnumber"
                                           label="Destination Company (Leave empty if its same company)"
                                           :error-messages="errors.regnumber"
                                           outlined
                                       >
                                       </v-text-field>
                                     <v-text-field
                                            v-model="form.amount"
                                           label="Amount"
                                           :error-messages="errors.accountnumber"
                                           outlined
                                       >
                                       </v-text-field>
                                        <v-file-input
                                        show-size
                                        counter
                                        label="Attach Request letter"
                                        v-model="form.filename"
                                        :error-messages="errors.filename"
                                       >
                                    </v-file-input>

               </v-card-text>
                 <v-card-actions>
                   <v-btn rounded outlined color="red" @click="showPop=false">Cancel</v-btn>
                    <v-spacer/>
                    <v-btn rounded outlined color="green" @click="upload" :loading="form.processing" :disabled="form.processing">Submit</v-btn>
                </v-card-actions>
           </v-card>
      </v-dialog>
</div>
</template>
<script>
import Vue from 'vue' 
export default {
    props:['errors','accountnumbers','suspense_id','currency','successMessage','errorMessage'],
    data(){
        return{
           showPop:false,
            form:this.$inertia.form({
              suspense_id:this.suspense_id,
              amount:"",
              regnumber:"",
              accountnumber:"",
              filename:null
            })
        }
    },methods:{
        upload(){
           this.form.post(this.$route('suspense-transfer.store'),{
              onSuccess:(page)=>{
                  if(this.successMessage){
                      Vue.swal('Success',this.successMessage,'success')
                      this.form.reset()
                      this.showPop = false;
                  }
                  if(this.errorMessage){
                     Vue.swal('Oops',this.errorMessage,'error') 
                  }
              }
          })
        }
    },computed:{
        accountlist(){
            var array = []
             this.accountnumbers.forEach(element => {
                 if(element.currency == this.currency){
                     array.push(element.accountnumber)
                 }
             });

             return array
        }
    }
}
</script>