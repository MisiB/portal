<template>
    <userlayout title="Profile Settings">
        <v-container>
            <v-row>
                <v-col cols="12" md="10" offset-md="1">
                   
                   <v-alert
                        border="top"
                        color="red lighten-2"
                        dark
                        v-if="errorMessage"
                        >
                        {{errorMessage}}
                        </v-alert>
                    <v-card>
                        <v-card-title>
                           Update Company Details
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
import  userlayout  from '../../Layouts/plainlayout'
import Vue from 'vue'
export  default {
    props: ['errors','successMessage','errorMessage','user','company'],
    components: {
        userlayout
    },data(){
        return{         
            companyform:this.$inertia.form({
            company_name:this.company ? this.company.name :'',
            company_regnumber:this.company ? this.company.regnumber :'',
               emails:this.company.contacts ? this.company.contacts.emails :'',
               address:this.company.contacts ? this.company.contacts.address :'',
               phones:this.company.contacts ? this.company.contacts.phonenumbers :'',

            })
           


        }
    },methods:{
        updateCompany(){
            this.companyform.post(this.$route('profile.company'),{
              onSuccess:(page)=>{
                if(this.successMessage){
                    Vue.swal(
                        'Success',
                        this.successMessage,
                        'success')
                }

               
              }
          })
        }

    }
}
</script>
