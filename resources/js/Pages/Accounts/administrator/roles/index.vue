<template>
       <userlayout title="Roles">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn> <v-btn text link disabled>Roles</v-btn>
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
             <v-card flat class="mt-4">
                 <v-card-title>
                    <div class="display-1">Roles</div>
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
                                   <th>Name</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="role in roles" :key="role.id">
                                    <td>
                                        {{role.name}}
                                    </td>
                                    <td class="d-flex pa-4 justify-end">
                                        <v-btn small depressed color="primary" @click="editShow(role)">
                                            <v-icon>mdi-pencil</v-icon>
                                        </v-btn>
                                          <v-btn small depressed class="ml-2" color="error" @click="deleteRecord(role.id)">
                                            <v-icon>mdi-delete</v-icon>
                                        </v-btn>
                                        <inertia-link class="v-btn v-btn--has-bg theme--light v-size--small success ml-2" :href="$route('assignfunctions.show',role.id)">
                                            <v-icon>mdi-lock</v-icon>
                                        </inertia-link>

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
                         <div>Role</div>
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
                          <v-select
                            v-model="form.level"
                            label="Select level"
                            outlined
                            :items="levellist"
                            :error-messages="errors.level"
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
    props: ['errors','successMessage','errorMessage','roles'],
    components: {
        userlayout
    },
    data(){
        return{
          addModel:false,
          levellist:['admin','entity','bidder'],
          form:this.$inertia.form({
              id:'',
              name:'',
              level:''
          })
        }
    },methods: {
        editShow(role){
            this.form=this.$inertia.form({
              id:role.id,
              name:role.name,
              level:role.level
          })
          this.addModel = true
        },
        submit(){

            this.form.post(this.$route('roles.store'),{
                onSuccess:(page)=>{
                if(this.successMessage)
                {
                     Vue.swal(
                                            'Successful',
                                            this.successMessage,
                                            'success'
                                            )
                }

                 if(this.erroMessagee)
                {
                     Vue.swal(
                                            'Oops',
                                            this.erroMessage,
                                            'error'
                                            )
                }
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
                        this.$inertia.delete('/administrator/roles/'+id,{
                                    onSuccess:(page)=>{
                                    this.loading = false
                                        Vue.swal(
                                            'Deleted!',
                                            'Module has been deleted.',
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