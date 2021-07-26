<template>
    <div>
          <v-btn small depressed color="success" class="ml-2" :loading="loading" :disabled="loading" @click="showPermssions()">
                                            <v-icon>mdi-lock</v-icon>
          </v-btn>
 
            <v-dialog max-width="400" v-model="showModel">
                 <v-card>
                     <v-card-title>
                         <div>Permissions</div>
                         <v-spacer/>
                         <v-btn icon @click="showModel=false"><v-icon>mdi-close</v-icon></v-btn>
                     </v-card-title>
                     <v-card-text>
                         <v-row>
                             <v-col>
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
                            </v-col>
                         </v-row> 
                         <v-simple-table>
                              <template v-slot:default>
                                  <thead>
                                      <tr><th>Name</th><th>Value</th><th></th></tr>
                                  </thead>
                                  <tbody>
                                      <template v-if="submodule.permissions.length >0">
                                      <tr v-for="permission in submodule.permissions" :key="permission.id">
                                          <td>{{permission.name}}</td>
                                          <td>{{permission.value}}</td>
                                          <td class="d-flex pa-4 justify-end">
                                        <v-btn small depressed color="primary" @click="editShow(permission)">
                                            <v-icon>mdi-pencil</v-icon>
                                        </v-btn>
                                          <v-btn small depressed class="ml-2" :loading="loading" :disabled="loading" color="error" @click="deleteRecord(permission.id)">
                                            <v-icon>mdi-delete</v-icon>
                                        </v-btn>
                                          </td>
                                      </tr>
                                      </template>
                                      <template v-else>
                                          <tr>
                                              <td colspan="3" class="pa-5 red--text text-center">No Permissions Found</td>
                                          </tr>
                                      </template>
                                  </tbody>
                              </template>
                         </v-simple-table>                   
                     </v-card-text>
                    
                 </v-card>
              
             </v-dialog>

            <v-dialog max-width="200" v-model="addModel">
                 <v-card>
                     <v-card-title>
                         <div>Permission</div>
                         <v-spacer/>
                         <v-btn icon @click="addModel=false"><v-icon>mdi-close</v-icon></v-btn>
                     </v-card-title>
                     <v-card-text>
                        
                          <v-text-field
                                           v-model="form.name"
                                           label="name"
                                           outlined
                                       >
                                       </v-text-field>
                                       <v-text-field
                                           v-model="form.value"
                                           label="value"
                                           outlined
                                       >
                                       </v-text-field>
                     </v-card-text>
                     <v-card-actions>
                   <v-btn rounded outlined color="red" @click="addModel=false">Cancel</v-btn>
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
    props:['permission','submodule','errors'],
    data(){
        return{
       showModel:false,
       addModel:false,
       loading:false,
       form:this.$inertia.form({
        id:'',
        submodule_id:this.submodule.id,
        name:'',
        value:''
       })
        }
    },methods:{
        showPermssions(){
         
                    this.showModel=true                
            
        },submit(){
                 this.form.post('/administrator/permissions',{
                 onSuccess:(page)=>{
                                    this.loading = false
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
        },editShow(permission){
         this.form=this.$inertia.form({
        id:permission.id,
        submodule_id:permission.submodule_id,
        name:permission.name,
        value:permission.value
       })
       this.addModel = true 
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
                        this.$inertia.delete('/administrator/permissions/'+id,{
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