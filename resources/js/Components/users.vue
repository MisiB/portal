<template>
    <div>
        <v-card flat class="mt-4" >
            <v-card-title class="indigo">
                <div class="white--text">Users</div>
                <v-spacer/>
                <v-btn icon class="white--text" @click="createModel=true">
                    <v-icon>mdi-plus</v-icon>
                </v-btn>
                </v-card-title>
            <v-card-text class="grey lighten-4">
                 <v-simple-table class="grey lighten-4">
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>email</th>
                                    <th>status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="users.length >0">
                                <tr v-for="user in users" :key="user.id">
                                     
                                     <td>
                                        {{user.name}}  {{user.surname}}
                                    </td>
                                    <td>
                                       {{user.email}}
                                    </td>
                                     <td>
                                       {{user.status}}
                                    </td>
                                     <td class="d-flex pa-2">
                                        <v-btn small rounded color="info" depressed @click="editShow(user)">Edit</v-btn>
                                          <v-btn small rounded color="success" depressed @click="resetpassword(user.id)">reset</v-btn>
                                    </td>
                                </tr>
                                </template>
                                <template v-else>
                                  <tr><td colspan="5" class="pa-5 text-center red--text"> No Users found</td></tr>
                                </template>
                            </tbody>
                        </template>
                    </v-simple-table>
            </v-card-text>
        </v-card>
        <v-dialog v-model="createModel" max-width="600">
            <v-card>
                <v-card-title>User Management</v-card-title>
                <v-card-text>
                  <v-text-field
                            v-model="form.name"
                            label="name"
                            outlined
                            :error-messages="errors.name"
                            >
                            
                         </v-text-field>
                          <v-text-field
                            v-model="form.surname"
                            label="Surname"
                            outlined
                            :error-messages="errors.surname"
                            >
                            
                         </v-text-field>
                          <v-text-field
                            v-model="form.email"
                            label="Email"
                            outlined
                            :error-messages="errors.email"
                            >                            
                         </v-text-field>
                </v-card-text>
                 <v-card-actions>
                <v-btn color="error" small rounded depressed @click="createModel=false">Cancel</v-btn>
                <v-spacer/>
                <v-btn color="success" small rounded depressed @click="submitForm" :loading="form.processing" :disabled="form.processing">Submit</v-btn>
            </v-card-actions>
            </v-card>
           
        </v-dialog>
    </div>
</template>
<script>
import Vue from 'vue'
export default {
    props:['users','errorMessage','successMessage','errors'],
    data(){
        return{
            createModel:false,
            form:this.$inertia.form({
                id:'',
                name:'',
                surname:'',
                email:''
            })
        }
    },methods:{
        submitForm(){
         this.form.post(this.$route('customerusers.store'),{
             onSuccess:(page)=>{
                 if(this.successMessage)
                 {
                Vue.swal(
                         'Successful',
                          this.successMessage,
                         'success'
                        )
                 }
                 if(this.errorMessage){
                  Vue.swal(
                         'Oops',
                          this.errorMessage,
                         'error'
                        )
                 }
             }
         })
        },resetpassword(id){
           this.$inertia.get(this.$route('customerusers.show',id),{
             onSuccess:(page)=>{
                 if(this.successMessage)
                 {
                Vue.swal(
                         'Successful',
                          this.successMessage,
                         'success'
                        )
                 }
                 if(this.errorMessage){
                  Vue.swal(
                         'Oops',
                          this.errorMessage,
                         'error'
                        )
                 }
             }
         })  
        },editShow(user){
             this.createModel=false,
            this.form=this.$inertia.form({
                id:user.id,
                name:user.name,
                surname:user.surname,
                email:user.email
            })
        }
    }
}
</script>