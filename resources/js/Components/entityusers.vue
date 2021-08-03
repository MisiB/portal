<template>
    <div>
         <v-btn small depressed class="ml-2" color="success" @click="addModel=true">
                                            <v-icon>mdi-account-group</v-icon>
         </v-btn>
         <v-dialog v-model="addModel" max-width="700">
             <v-card>
                 <v-card-title>
                     <div>Entity Users</div>
                     <v-spacer/>
                        <v-btn
                        class="mx-2"
                        fab
                        dark
                        depressed
                        color="indigo"
                        @click="addUser=true"
                        >
                        <v-icon dark>
                            mdi-plus
                        </v-icon>
                        </v-btn><v-btn icon @click="addModel=false"><v-icon>mdi-close</v-icon></v-btn>
                 </v-card-title>
                 <v-card-text>
                     <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                   <th>Surname</th>
                                   <th>Email</th>
                                    <th>Role</th>
                                   <th>Status</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="entity.users.length > 0">
                                    <tr v-for="user in entity.users" :key="user.id">
                                        <td>{{user.name}}</td>
                                         <td>{{user.surname}}</td>
                                          <td>{{user.email}}</td>
                                          <td>{{user.role.name}}</td>
                                          <td>  
                                            <v-btn small depressed color="primary" @click="editShow(user)">
                                            <v-icon>mdi-pencil</v-icon>
                                        </v-btn>
                                          <v-btn small depressed class="ml-2" color="error" @click="deleteRecord(user.id)">
                                            <v-icon>mdi-delete</v-icon>
                                        </v-btn>
                                        </td>
                                    </tr>
                                </template>
                                <template v-else>
                                  <tr>
                                      <td colspan="6" class="red--text text-center pa-5">No entity users found</td>
                                  </tr>
                                </template>
                            </tbody>
                        </template>
                     </v-simple-table>

                 </v-card-text>
             </v-card>
         </v-dialog>
         <v-dialog v-model="addUser" max-width="300">
             <v-card>
                 <v-card-title>
                     <div>Add User</div>
                     <v-spacer/>
                     <v-btn small icon @click="addUser=false">
                         <v-icon>mdi-close</v-icon>
                     </v-btn>
                 </v-card-title>
                 <v-card-text>
                                    <v-text-field
                                           v-model="form.name"
                                           label="Name"
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
                                        <v-select
                                           v-model="form.role"
                                           :items="roles"
                                           item-value="id"
                                           item-text="name"
                                           label="select role"
                                           outlined
                                           :error-messages="errors.role"
                                       >
                                        </v-select>
                 </v-card-text>
                   <v-card-actions>
                   <v-btn rounded outlined color="red" @click="addUser=false">Cancel</v-btn>
                    <v-spacer/>
                    <v-btn rounded outlined color="green" @click="submit" :loading="form.processing" :disabled="form.processing">Submit</v-btn>
                </v-card-actions>
             </v-card>
         </v-dialog>
    </div>
</template>
<script>
import Vue from 'vue'
export default {
    props:['entity','roles','errors'],
    data(){
        return{
            addModel:false,
            addUser:false,
            form:this.$inertia.form({
                id:'',
                name:'',
                surname:'',
                email:'',
                role:'',
                entity:this.entity.id

            })
        }
    },methods:{
        submit(){
          this.form.post(this.$route('entityusers.store'),{
                onSuccess:(page)=>{
                    this.form.reset();
                    this.addUser = false
                         if(this.successMessage)
                            {
                                this.form.reset()
                                this.selectDialog= false
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
                                        
                    },
                     onError:(error)=>{
                                        this.loading = false
                                         Vue.swal(
                                            'Oops',
                                            this.errorMessage,
                                            'error'
                                            )
                                    }
            })
        },editShow(user){
            this.form =this.$inertia.form({
                id:user.id,
                name:user.name,
                surname:user.surname,
                email:user.email,
                role:user.role.name,
                entity:this.entity.id

            })  

            this.addUser = true
        },deleteRecord(id){   
             Vue.swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.loading= true
                        this.$inertia.delete(this.$route('entityusers.destroy',id),{
                                    onSuccess:(page)=>{
                                    this.loading = false
                                        Vue.swal(
                                            'Deleted!',
                                            'Delete request successfully processed.',
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