<template>
       <userlayout title="Modules">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn>   <v-btn text link :href="$route('modules.index')" >Modules</v-btn> <v-btn text link disabled>submodules</v-btn>
                    </div>
                </v-card-text>
            </v-card>               
       
             <v-card flat class="mt-4">
                 <v-card-title>
                    <div class="display-1">{{module.name}}</div>
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
                                   <th>Url</th>
                                   <th>Icon</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="module.submodules.length >0">
                                <tr v-for="submodule in module.submodules" :key="submodule.id">
                                    <td>
                                        {{submodule.name}}
                                    </td>
                                     <td>
                                        {{submodule.url}}
                                    </td>
                                     <td>
                                       <v-icon>{{submodule.icon}}</v-icon>
                                    </td>
                                    <td class="d-flex pa-4 justify-end">
                                        <v-btn small depressed color="primary" @click="editShow(submodule)">
                                            <v-icon>mdi-pencil</v-icon>
                                        </v-btn>
                                          <v-btn small depressed class="ml-2" :loading="loading" :disabled="loading" color="error" @click="deleteRecord(submodule.id)">
                                            <v-icon>mdi-delete</v-icon>
                                        </v-btn>
                                        <permission :submodule="submodule"></permission>

                                    </td>
                                </tr>
                                </template>
                                <template v-else>
                                  <tr><td colspan="4" class="text-center red--text">No Submodules Added as yet</td></tr>
                                </template>
                            </tbody>
                        </template>
                    </v-simple-table>
                </v-card-text>
             </v-card>
             <v-dialog max-width="600" v-model="addModel">
                 <v-card>
                     <v-card-title>
                         <div>Submodule</div>
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
                                         <v-text-field
                                           v-model="form.url"
                                           label="Url"
                                           outlined
                                           :error-messages="errors.url"
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
import permission from '../../../../Components/permissions'
export  default {
    props: ['errors','successMessage','errorMessage','module'],
    components: {
        userlayout,
        permission
    },
    data(){
        return{
          addModel:false,
          editModel:false,
          deleteModel:false,
          form:this.$inertia.form({
              id:'',
              module_id:this.module.id,
               name:'',
               icon:'',
               url:''
          }),
          loading:false,
          permissions:[]
        }
    },methods: {
        editShow(submodule){
             this.form=this.$inertia.form({
              id:submodule.id,
               name:submodule.name,
               icon:submodule.icon,
               url:submodule.url
          })
            this.addModel = true
        },
        submit(){
            this.loading = true
           this.form.post('/administrator/submodules',{
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
                        this.$inertia.delete('/administrator/submodules/'+id,{
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