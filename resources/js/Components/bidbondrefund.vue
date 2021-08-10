<template>
   <div>
          <v-btn small depressed color="success" @click="addModel=true">
            Request refund
          </v-btn>

           <v-dialog max-width="500" v-model="addModel">
                 <v-card>
                     <v-card-title>
                         <div>Request  Refund</div>
                         <v-spacer/>
                         <v-btn icon @click="addModel=false"><v-icon>mdi-close</v-icon></v-btn>
                     </v-card-title>
                     <v-card-text>
                        
                          <v-text-field
                                           v-model="form.bank"
                                           label="Client Bank Name"
                                           :error-messages="errors.bank"
                                           outlined
                                       >
                                       </v-text-field>
                                        <v-text-field
                                           v-model="form.name"
                                           label="Client Account Name"
                                           :error-messages="errors.name"
                                           outlined
                                       >
                                       </v-text-field>
                                       <v-text-field
                                           v-model="form.accountnumber"
                                           label="Client Bank Account number"
                                           :error-messages="errors.accountnumber"
                                           outlined
                                       >
                                       </v-text-field>
                                        <v-file-input
                                        show-size
                                        counter
                                        outlined
                                        label="Attach Request letter"
                                        v-model="form.requestletter"
                                        :error-messages="errors.requestletter"
                                    >
                                    </v-file-input>
                     </v-card-text>
                     <v-card-actions>
                   <v-btn rounded outlined color="red" @click="addModel=false">Cancel</v-btn>
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
 props:['bid','errors'],
     data(){
        return{
            addModel:false,
            form:this.$inertia.form({
              id:this.bid,
              bank:"",
              name:"",
              accountnumber:"",
              requestletter:null
            })
        }
     },
     methods:{
       upload(){
          this.form.post(this.$route('report-bidbond-refund.store'),{
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