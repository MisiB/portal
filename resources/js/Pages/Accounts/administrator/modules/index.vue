<template>
       <userlayout title="Modules">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn> <v-btn text link disabled>Modules</v-btn>
                    </div>
                </v-card-text>
            </v-card>               
       
             <v-card flat class="mt-4">
                 <v-card-title>
                    <div class="display-1">Modules</div>
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
                                   <th>Icon</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="module in modules" :key="module.id">
                                    <td>
                                        {{module.name}}
                                    </td>
                                     <td>
                                       <v-icon>{{module.icon}}</v-icon>
                                    </td>
                                    <td class="d-flex pa-4 justify-end">
                                        <v-btn small depressed color="primary" @click="editShow(module)">
                                            <v-icon>mdi-pencil</v-icon>
                                        </v-btn>
                                          <v-btn small depressed class="ml-2" :loading="loading" :disabled="loading" color="error" @click="deleteRecord(module.uuid)">
                                            <v-icon>mdi-delete</v-icon>
                                        </v-btn>
                                       <inertia-link  class="ml-2 v-btn v-btn--has-bg theme--light v-size--small success" :href="$route('submodules.show',module.uuid)">                                       
                                            <v-icon>mdi-link</v-icon>
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
                         <div>Module</div>
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
                                           v-model="form.icon"
                                           label="icon"
                                           outlined
                                           :error-messages="errors.icon"
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
               

                
           </v-container>
       </userlayout>
</template>
<script>
import Vue from 'vue';
import  userlayout  from '../../../Layouts/administratorlayout';
export  default {
    props: ['errors','successMessage','errorMessage','modules'],
    components: {
        userlayout
    },
    data(){
        return{
          addModel:false,
          editModel:false,
          deleteModel:false,
          form:this.$inertia.form({
              id:'',
               name:'',
               icon:''
          })
         
         ,
          loading:false
        }
    },methods: {
        editShow(module){
             this.form=this.$inertia.form({
              id:module.id,
               name:module.name,
               icon:module.icon
          })
            this.addModel = true
        },
        submit(){
            this.loading = true
           this.form.post('/administrator/modules',{
                 onSuccess:(page)=>{
                                    this.loading = false
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
                        this.$inertia.delete('/administrator/modules/'+id,{
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