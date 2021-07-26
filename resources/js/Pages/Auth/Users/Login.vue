<template>
    <welcome_layout title="Login">
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

                    <v-form
                        ref="form"
                        v-model="valid"
                        lazy-validation>
                        <v-card>
                            <v-card-title>
                                <h3>Login</h3>
                            </v-card-title>
                            <v-divider/>
                            <v-card-text>
                                <v-text-field
                                    v-model="user.email"
                                    label="Email"
                                    outlined
                                    :rules="EmailRules"
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
                                <v-checkbox
                                    v-model="user.remember_me"
                                    label="Remember me"
                                >
                                </v-checkbox>

                            </v-card-text>
                            <v-card-actions>

                                    <v-btn
                                        outlined
                                        rounded
                                        text
                                        class="red lighten-3 white--text"
                                    >
                                        Cancel
                                    </v-btn>
                                <v-spacer/>
                                    <v-btn
                                        outlined
                                        rounded
                                        text
                                        class="green lighten-3 white--text"
                                        @click="submitForm"
                                        :loading="loading"
                                        :disabled="loading"
                                    >
                                        Submit
                                    </v-btn>

                            </v-card-actions>

                        </v-card>
                        <div  class="text-center mt-4 mb-2">
                            <inertia-link :href="$route('register')">Do not have an acount ??</inertia-link>
                        </div>
                        <div class="text-center">
                            <inertia-link :href="$route('password.request')">Forgot Passowrd ??</inertia-link>
                        </div>


                    </v-form>
                </v-col>
            </v-row>
        </v-container>

    </welcome_layout>

</template>
<script>
import  welcome_layout  from '../../Layouts/welcome'
export  default {
    props:['errors','successMessage','errorMessage'],
    components:{
        welcome_layout
    },data(){
        return{
            valid:true,
            loading:false,
            show1: false,
            EmailRules:[
                v => !!v || 'Email is required',
                v => /.+@.+\..+/.test(v) || 'E-mail must be valid',

            ],
            PasswordRules:[
                v=> !!v || 'Password is required'
            ],
            user:{
                email:'',
                password:'',
                remember_me:''
            },
        }
    },methods:{
        submitForm(){
            if(this.$refs.form.validate()){
                this.loading = true
                 this.$inertia.post('/login',this.user)
                     .then(()=>{
                       this.loading = false
                      })
            }
        }
    }
}
</script>
