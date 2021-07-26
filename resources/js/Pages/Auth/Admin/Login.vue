<template>
    <welcome_layout title="Admin Login">
        <v-container>
               <v-row>
                <v-col
                    cols="12"
                    md="6"
                    offset-md="3"
                >
                    <v-alert
                        border="top"
                        color="red lighten-2"
                        dark
                        v-if="errors.email"
                    >
                        {{errors.email}}
                    </v-alert>
                       <v-alert
                        dense
                        text
                        type="success"
                        v-if="successMessage"
                    >
                        {{successMessage}}
                    </v-alert>
                    <v-alert
                        dense
                        text
                        type="error"
                        v-if="errorMessage"
                    >
                        {{errorMessage}}
                    </v-alert>
                     <v-row>
                         <v-col cols="12" md="4" offset-md="4">
                             <v-img src="/img/logo.png" width="200"/>
                         </v-col>
                     </v-row>
                      <div class="mt-8">
                    <v-form
                        ref="form"
                        v-model="valid"
                        lazy-validation>
                        <v-card flat outlined>
                            
                            <v-card-text>
                                <v-text-field
                                    v-model="user.username"
                                    label="Username"
                                    outlined
                                    :rules="usernameRules"
                                >

                                </v-text-field>
                                <v-text-field
                                    v-model="user.password"
                                    outlined
                                    :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                                    :rules= PasswordRules
                                    :type="show1 ? 'text' : 'password'"
                                    label="Password"
                                    hint="At least 8 characters"
                                    counter
                                    @click:append="show1 = !show1"
                                >
                                </v-text-field>

                            </v-card-text>
                            <v-card-actions>

                                    <v-btn
                                        outlined
                                        rounded
                                        link
                                        class="red white--text"
                                        :href="$route('welcome')"
                                    >
                                        Cancel
                                    </v-btn>
                                <v-spacer/>
                                    <v-btn
                                        outlined
                                        rounded
                                        text
                                        class="green white--text"
                                        @click="submitForm"
                                        :loading="loading"
                                        :disabled="loading"
                                    >
                                        Submit
                                    </v-btn>

                            </v-card-actions>

                        </v-card>
                       


                    </v-form>
                      </div>
                </v-col>
            </v-row>
        </v-container>

    </welcome_layout>

</template>
<script>
import  welcome_layout  from '../../Layouts/plainlayout'
export  default {
    props:['errors','successMessage','errorMessage'],
    components:{
        welcome_layout
    },data(){
        return{
            valid:true,
            loading:false,
            show1: false,
             usernameRules:[
                v=> !!v || 'Username is required'
            ],
            PasswordRules:[
                v=> !!v || 'Password is required'
            ],
            user:{
                username:'',
                password:'',
            },
        }
    },methods:{
        submitForm(){
            if(this.$refs.form.validate()){
                this.loading = true
                 this.$inertia.post('/administrator/login',this.user)
                     .then(()=>{
                       this.loading = false
                      })
            }
        }
    }
}
</script>
