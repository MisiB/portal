<template>
    <userlayout title="Users Report">
        <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('dashboard')" >Dashboard</v-btn> <v-btn text link disabled>Users</v-btn>
                    </div>
                </v-card-text>
            </v-card>
                   <v-alert
                   class="mt-4"
                color="red lighten-2"
                dark
                v-if="errorMessage"
            >
                {{errorMessage}}
            </v-alert>
            <v-alert
            class="mt-4"
                color="green lighten-2"
                dark
                v-if="successMessage"
            >
                {{successMessage}}
            </v-alert>
            <v-card flat class="mt-5">
                <v-card-title>
                    Users <v-spacer/> <v-btn rounded depressed color="primary" @click="userDialog=true" small>Add New</v-btn>
                </v-card-title>
                <v-card-text>
                   <v-simple-table>
                       <template v-slot:default>
                           <thead>
                               <tr>
                                   <th>Name</th>
                                   <th>Surname</th>
                                   <th>Email</th>
                                   <th>Status</th>
                                   <th></th>
                               </tr>
                           </thead>
                           <tbody>
                               <template v-if="users.length>0">
                                   <tr v-for="user in users" :key="user.id" class="pt-2 pb-2">
                                       <td>{{user.name}}</td>
                                       <td>{{user.surname}}</td>
                                         <td>{{user.email}}</td>
                                          <td>{{user.status}}</td>
                                       <td class="d-flex">                                           
                                           <v-btn color="green" depressed class="white--text mt-1" small>Edit</v-btn>
                                       </td>
                                   </tr>
                               </template>
                               <template v-else>
                                  <tr>
                                      <td colspan="3" class="text-center red-text">No Company Documents Found</td>
                                  </tr>
                               </template>
                           </tbody>
                       </template>
                   </v-simple-table>
                </v-card-text>
            </v-card>
        </v-container>

        <v-dialog v-model="userDialog" max-width="600">
             <v-form ref="form" lazy-validation v-model="isValid">
           <v-card>
            <v-card-title>
               New User
                <v-spacer/>
                <v-btn icon @click="userDialog=false"><v-icon>mdi-close</v-icon></v-btn>
            </v-card-title>
            <v-card-text>
            <v-text-field outlined label="Name" v-model="name" :rules="nameRule"/>
            <v-text-field outlined label="Surname" v-model="surname" :rules="surnameRule"/>
            <v-text-field outlined label="Email" v-model="email" :rules="emailRule"/>
             <v-text-field
                                           v-model="password"
                                           outlined
                                           :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                                           :rules="[rules.required, rules.min]"
                                           :type="show1 ? 'text' : 'password'"
                                           label="Password"
                                           hint="At least 8 characters"
                                           counter
                                           @click:append="show1 = !show1"
                                       >
                                       </v-text-field>
               <v-text-field
                                           v-model="password_confirmation"
                                           outlined
                                           :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
                                           :rules="[rules.required, rules.min,rules.passwordMatch]"
                                           :type="show2 ? 'text' : 'password'"
                                           label="ConfirmPassword"
                                           hint="At least 8 characters"
                                           counter
                                           @click:append="show2 = !show2"
                                       >
                                       </v-text-field>
            </v-card-text>
               <v-card-actions>
                    <v-btn small outlined rounded color="red" @click="userDialog=false">Close</v-btn>
                    <v-spacer/>
                    <v-btn small outlined rounded color="green" @click="process" :loading="loading" :disabled="loading">Create</v-btn>
                </v-card-actions>
           </v-card>
             </v-form>   
        </v-dialog>    
    </userlayout>         
                
</template>
<script>
import  userlayout  from '../../../Layouts/userlayout'
export  default {
    props: ['errors','successMessage','errorMessage','users'],
    components: {
        userlayout
    },data(){
        return{
            loading:false ,
            valid:true,
            show1: false,
            show2: false,
            userDialog:false,
            isValid:true,
            nameRule:[v=>!!v || 'Name is required'],
            surnameRule:[v => !!v || 'Surname is required'],            
             emailRule:[
                v => !!v || 'Email is required',
                v => /.+@.+\..+/.test(v) || 'E-mail must be valid',

            ],
            rules: {
                required: value => !!value || 'Required.',
                min: v => v.length >= 8 || 'Min 8 characters',
                passwordMatch: v =>(!!v && v)=== this.password || `The passwords you entered don't match`,
            },
                name:'',
                surname:'',
                email:'',
                password:'',
                password_confirmation:''
          

        }
    },methods:{ 
     process(){
             var formdata =new FormData()
            formdata.append('name',this.name)
            formdata.append('surname',this.surname)
            formdata.append('email',this.email)
            if(this.$refs.form.validate()){
                this.loading=true
                this.$inertia.post('/bidders/reportUsers',formdata).then(()=>{
                    this.loading=false
                    this.uploadModel =false
                    this.filename=null
                })
            }
      }

    }
}
</script>