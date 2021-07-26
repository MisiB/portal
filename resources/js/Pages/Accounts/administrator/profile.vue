<template>
       <userlayout title="Profile">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn> <v-btn text link disabled>Change Password</v-btn>
                    </div>
                </v-card-text>
            </v-card>
           <v-row>
              <v-col md="6" offset-md="3" class="mt-5">
                  <v-card>
                      <v-card-title>Change Password</v-card-title>
                      <v-card-text>
                          <v-text-field
                            v-model="form.oldpassword"
                            outlined
                            label="Current Password"
                            :error-messages="errors.oldpassword"
                            >
                          </v-text-field>
                            <v-text-field
                            v-model="form.password"
                            outlined
                            label="new Password"
                            :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
                            :type="show ? 'text' : 'password'"
                            :error-messages="errors.password"
                             @click:append="show = !show"
                            >
                          </v-text-field>
                          <v-text-field
                            v-model="form.password_confirmation"
                            outlined
                            label="Confirm Password"
                            :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
                            :type="show ? 'text' : 'password'"
                            :error-messages="errors.password_confirmation"
                             
                            >
                          </v-text-field>
                      </v-card-text>
                      <v-card-actions>
                          <v-btn small color="error">
                              Cancel
                          </v-btn>
                          <v-spacer/>
                           <v-btn small color="success" :loading="form.processing" :disabled="form.processing" @click="submit">
                             Change
                          </v-btn>
                      </v-card-actions>
                  </v-card>
              </v-col>
            </v-row> 
           </v-container>
       </userlayout>
</template>
<script>
import  userlayout  from '../../Layouts/administratorlayout';
import Vue from 'vue'
export  default {
    props: ['errors','successMessage','errorMessage'],
    components: {
        userlayout
    },
    data(){
        return{
          show:false,
          
          form:this.$inertia.form({
              oldpassword:'',
              password:'',
              password_confirmation:''
          })
        }
    },methods: {
         submit()
         {

                  Vue.swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Change'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.loading= true
                    this.form.post(this.$route('changepassword.store'),{             
           
                                    onSuccess:(page)=>{
                                    this.loading = false
                                        Vue.swal(
                                            'Changed',
                                            'Password successfully changed.',
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
           
         }
    }
}
</script>