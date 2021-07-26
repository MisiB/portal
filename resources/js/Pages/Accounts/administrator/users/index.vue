<template>
       <userlayout title="Users">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn> <v-btn text link disabled>Users</v-btn>
                    </div>
                </v-card-text>
            </v-card>
            
             <v-card flat class="mt-4">
                 <v-card-title>
                    <div>
                        <v-text-field
                            v-model="search"
                            placeholder="Search"
                            dense
                            outlined
                            v-on:keyup.enter="filterData"
                            >
                         </v-text-field>
                    </div>
                    <v-spacer/>
                      <v-btn
                        class="mx-2"
                        fab
                        dark
                        depressed
                        color="indigo"
                        @click="addModel=true"
                        >
                        <v-icon dark>
                            mdi-plus
                        </v-icon>
                        </v-btn>
                 </v-card-title>
                 <v-divider/>
                <v-card-text>
                    <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                   <th>username</th>
                                   <th>Name</th>
                                   <th>Email</th>
                                   <th>Role</th>
                                   <th>Status</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user in users" :key="user.id">
                                    <td>
                                        {{user.username}}
                                    </td>
                                    <td>
                                        {{user.name}} {{user.surname}}
                                    </td>
                                    <td>{{user.email}}</td>
                                     <td>{{user.role.name}}</td>
                                    <td :class="user.status">{{user.status}}</td>
                                    <td class="d-flex pa-4 justify-end">
                                        <v-btn small depressed color="primary" @click="editShow(user)">
                                            <v-icon>mdi-pencil</v-icon>
                                        </v-btn>
                                          <v-btn small depressed class="ml-2" color="error" @click="deleteRecord(user.id)">
                                            <v-icon>mdi-delete</v-icon>
                                        </v-btn>
                                        <v-btn small depressed class="ml-2" color="warning" @click="passwordReset(user.id)">
                                            <v-icon>mdi-refresh-circle</v-icon>
                                        </v-btn>
                                         <v-btn small depressed class="ml-2" v-if="user.status=='ACTIVE'" color="error" @click="changeStatus('BLOCKED',user.id)">
                                            <v-icon>mdi-cancel</v-icon>
                                        </v-btn>
                                          <v-btn small depressed class="ml-2" v-if="user.status=='BLOCKED'" color="success" @click="changeStatus('ACTIVE',user.id)">
                                            <v-icon>mdi-check</v-icon>
                                        </v-btn>

                                    </td>
                                </tr>
                            </tbody>
                        </template>
                    </v-simple-table>
                </v-card-text>
               
             </v-card>
             <v-dialog max-width="400" v-model="addModel">
                
                 <v-card>
                     <v-card-title>
                         <div>User</div>
                         <v-spacer/>
                         <v-btn icon @click="addModel=false"><v-icon>mdi-close</v-icon></v-btn>
                     </v-card-title>
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
                            label="surname"
                            outlined
                            :error-messages="errors.surname"
                            >
                         </v-text-field>
                         <v-text-field
                            v-model="form.email"
                            label="email"
                            outlined
                            :error-messages="errors.email"
                            >
                         </v-text-field>
                         <v-select
                            v-model="form.role"
                            label="Role"
                            :items="roles"
                            item-value="id"
                            item-text="name"
                            outlined
                            :error-messages="errors.role"
                            >
                         </v-select>
                     </v-card-text>
                     <v-card-actions>
                   <v-btn rounded outlined color="red" @click="addModel=false">Cancel</v-btn>
                    <v-spacer/>
                    <v-btn rounded outlined color="green" @click="submit" :loading="form.processing" :disabled="form.processing">Submit</v-btn>
                </v-card-actions>
                 </v-card>
                 
             </v-dialog>
               

                
           </v-container>
       </userlayout>
</template>
<script>
import  userlayout  from '../../../Layouts/administratorlayout';
import Vue from 'vue'

export  default {
    props: ['errors','successMessage','errorMessage','roles','users'],
    components: {
        userlayout
    },
    data(){
        return{
          addModel:false,
         search:'',
          form:this.$inertia.form({
              id:'',
              name:'',
              surname:'',
              email:'',
              role:''
          })
        }
    },methods: {
        editShow(role){
            this.form=this.$inertia.form({
              id:role.id,
              name:role.name,
              surname:role.surname,
              email:role.email,
              role:role.role_id
          })
          this.addModel = true
         
        },
        submit(){

            this.form.post(this.$route('users.store'),{
                onSuccess:(page)=>{
                     this.addModel = false
                     this.form.reset()
                                        Vue.swal(
                                            'Successful',
                                            this.successMessage,
                                            'success'
                                            )
                    },
                     onError:(error)=>{
                                        this.loading = false
                                         Vue.swal(
                                            'Oops',
                                            this.erroMessage,
                                            'error'
                                            )
                                    }
            })
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
                        this.$inertia.delete(this.$route('users.destroy',id),{
                                    onSuccess:(page)=>{
                                    this.loading = false
                                        Vue.swal(
                                            'Deleted!',
                                            'User has been deleted.',
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
          
        },passwordReset(id){   
             Vue.swal({
                    title: 'Are you sure?',
                    text: "You want to reset password ",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, reset it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.loading= true
                        this.$inertia.get(this.$route('users.show',id),{
                                    onSuccess:(page)=>{
                                    this.loading = false
                                        Vue.swal(
                                            'Password Reset',
                                             this.successMessage,
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
          
        },changeStatus(status,id){   
                       var formdata = {status:status,id:id}
                     console.log(formdata)
             Vue.swal({
                    title: 'Are you sure?',
                    text: "You want to change user status ",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, change it!'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.loading= true
                     
                        this.$inertia.put(this.$route('users.update',[id,formdata]),formdata,{
                                    onSuccess:(page)=>{
                                    this.loading = false
                                        Vue.swal(
                                            'Password Reset',
                                             this.successMessage,
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
          
        },filterData(){
            this.$inertia.replace(this.$route('users.index',{term:this.search}))
        }
    }
}
</script>
<style scoped>
  .ACTIVE{
      color: green;
  }.BLOCKED{
      color: red;
  }
</style>