<template>
    <userlayout title="Profile Settings">
        <v-container>
             <v-alert
                border="top"
                color="red lighten-2"
                dark
                v-if="errorMessage"
                >
                {{errorMessage}}
                </v-alert>
            <v-row>
                <v-col cols="12" md="10" offset-md="1">
                   
                    <v-card>
           <v-card-title>User Profile</v-card-title>
           <v-card-text>


               <v-row>
                   <v-col cols="12">
                       <v-text-field
                           v-model="form.name"
                           label="Name"
                           outlined
                           :error-messages="errors.name"
                       >
                       </v-text-field>
                   </v-col>
               </v-row>
               <v-row>
                   <v-col cols="12">
                       <v-text-field
                           v-model="form.surname"
                           label="Surname"
                           outlined
                           :error-messages="errors.surname"
                       >
                       </v-text-field>
                   </v-col>
               </v-row>
               <v-row>
                   <v-col cols="12">
                       <v-text-field
                           v-model="form.email"
                           label="Email"
                           outlined
                           :error-messages="errors.email"
                       >
                       </v-text-field>

                   </v-col>
               </v-row>
               <v-row>
                   <v-col cols="12">
                       <v-text-field
                           v-model="form.password"
                           outlined
                           :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                           :type="show1 ? 'text' : 'password'"
                           label="Password"
                           hint="At least 8 characters"
                           counter
                           @click:append="show1 = !show1"
                           :error-messages="errors.password"
                       >
                       </v-text-field>
                   </v-col>
               </v-row>
               <v-row>
                   <v-col cols="12">
                       <v-text-field
                           v-model="form.password_confirmation"
                           outlined
                           :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
                           :type="show2 ? 'text' : 'password'"
                           label="ConfirmPassword"
                           hint="At least 8 characters"
                           counter
                           @click:append="show2 = !show2"
                       >
                       </v-text-field>
                   </v-col>
               </v-row>


           </v-card-text>
           <v-card-actions>
               <v-spacer/> <v-btn outlined rounded :loading="form.processing" :disabled="form.processing" color="green" @click="updateUser">Update</v-btn>
           </v-card-actions>
       </v-card>
                  
                </v-col>
            </v-row>
            <v-row>
                <v-col cols="12" md="10" offset-md="1">
                    <v-card>
                        <v-card-title>
                            Company Details
                        </v-card-title>
                        <v-card-text>
                            <v-text-field readonly outlined label="Company Name" v-model="companyform.company_name"/>
                            <v-text-field readonly outlined label="Praz Number" v-model="companyform.company_regnumber"/>
                            <v-text-field
                                v-model="companyform.emails"
                                label="Company Contact Emails"
                                outlined
                               :error-messages="errors.emails"
                            />
                            <v-text-field
                                v-model="companyform.phones"
                                label="Company Contact Phones"
                                outlined
                                :error-messages="errors.phones"
                            />
                            <v-textarea
                                v-model="companyform.address"
                                label="Company Contact Address"
                                outlined
                                :error-messages="errors.address"
                            >

                            </v-textarea>
                        </v-card-text>
                        <v-card-actions>
                            <v-spacer/> <v-btn outlined rounded :loading="companyform.processing" :disabled="companyform.processing" color="green" @click="updateCompany">Update</v-btn>
                        </v-card-actions>
                    </v-card>
                   

                </v-col>
            </v-row>
        </v-container>

    </userlayout>
</template>
<script>
import  userlayout  from '../../Layouts/userlayout'
import Vue from 'vue'
export  default {
    props: ['errors','successMessage','errorMessage','user','company'],
    components: {
        userlayout
    },data(){
        return{
            show1:false,
            show2:false,           
            form:this.$inertia.form({
            name:this.user ?  this.user.name :'',
            surname: this.user ? this.user.surname : '',
            email: this.user ? this.user.email : '',
            phone: this.user ? this.user.phonenumbers : '',
            password:'',
            password_confirmation:'',
            }),         
            companyform:this.$inertia.form({
            company_name:this.company ? this.company.name :'',
            company_regnumber:this.company ? this.company.regnumber :'',
               emails:this.company.contacts ? this.company.contacts.emails :'',
               address:this.company.contacts ? this.company.contacts.address :'',
               phones:this.company.contacts ? this.company.contacts.phonenumbers :'',

            })
           


        }
    },methods:{
        updateUser(){
          this.form.post(this.$route('profile.user'),{
              onSuccess:(page)=>{
                if(this.successMessage){
                    Vue.swal(
                        'Success',
                        this.successMessage,
                        'success')
                }

                if(this.errorMessage){
                  Vue.swal(
                        'Oops',
                        this.errorMessage,
                        'error')
                }
              }
          })
        },
        updateCompany(){
            this.companyform.post(this.$route('profile.company'),{
              onSuccess:(page)=>{
                if(this.successMessage){
                    Vue.swal(
                        'Success',
                        this.successMessage,
                        'success')
                }

                if(this.errorMessage){
                  Vue.swal(
                        'Oops',
                        this.errorMessage,
                        'error')
                }
              }
          })
        }

    }
}
</script>
