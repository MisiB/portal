<template>
    <div>
          <v-btn color="primary" fab depressed rounded @click="bidbondDialog=true"><v-icon>mdi-plus</v-icon></v-btn>
           <v-dialog v-model="bidbondDialog" max-width="600">
            
              <v-card>
                  <v-card-title>Enter Tender Number<v-spacer/> <v-btn icon @click="bidbondDialog=false"><v-icon>mdi-close</v-icon></v-btn></v-card-title>
                  <v-card-text>
                      <div class="d-flex">
                                     <v-text-field
                                           v-model="form.tendernumber"
                                           label="Tender Number"
                                           outlined
                                           dense
                                           :error-messages="errors.tendernumber"
                                       >
                                       </v-text-field>
                                       <v-btn  depressed class="ml-1" color="primary" :loading="form.processing" :disabled="form.processing" @click="submit">Search</v-btn>
                      </div>

                               
                  </v-card-text>
              
              </v-card>
               
        </v-dialog> 
    </div>
</template>
<script>
export default {
    props:['errorMessage','successMessage','errors'],
    data(){
        return{
           form:this.$inertia.form({tendernumber:''}), 
            bidbondDialog:false
             }
          },methods:{
              submit(){
                this.form.post(this.$route('Mytenders.store'))
              }
          }

}
</script>