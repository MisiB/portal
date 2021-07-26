<template>
       <userlayout title="Roles">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn> <v-btn text link :href="$route('roles.index')" >Roles</v-btn> <v-btn text link disabled>Assign Functions</v-btn>
                    </div>
                </v-card-text>
            </v-card>          
                  
                   <v-card class="mt-2" flat v-for="module in modules" :key="module.id">
                        <v-card-title>
                            <div>{{module.name}}</div>
                            <v-spacer/>
                              <div>
                                  <v-btn small class="success" depressed rounded @click="assign(module.id,'assign','modules')"  v-if="module.roles.length ==0"> Assign</v-btn>
                                  <v-btn small class="error" depressed rounded @click="assign(module.id,'unassign','modules')" v-else> Unassign</v-btn>
                              </div>
                        </v-card-title>
                        <v-card-text>
                            <div v-if="module.roles.length > 0">
                            <v-card  class="mt-2" v-for="submodule in module.submodules" :key="submodule.id">
                                <v-card-title>
                                 <div>
                                    {{submodule.name}}
                                </div>
                                <v-spacer/>
                                <div>
                                    <v-btn small class="primary" depressed rounded @click="assign(submodule.id,'assign','submodules')"  v-if="submodule.roles.length ==0"> Assign</v-btn>
                                  <v-btn small class="error" depressed rounded @click="assign(submodule.id,'unassign','submodules')" v-else> Unassign</v-btn>
                                </div>
                                </v-card-title>
                                <v-card-text>
                                  <v-simple-table  v-if="submodule.roles.length > 0">
                                       <template v-slot:default>
                                           <thead>
                                               <tr>
                                                   <th>Name</th>
                                                   <th class="text-right">Assigned</th>
                                                    <th class="text-right">Unassigned</th>
                                                   <th></th>
                                               </tr>
                                           </thead>
                                           <tbody>
                                               <tr v-for="permission in submodule.permissions" :key="permission.id">
                                                <td>{{permission.name}}</td>
                                                <td class="text-right">
                                                    <v-icon v-if="permission.roles.length > 0">mdi-check</v-icon>
                                                </td>
                                                <td class="text-right">
                                                    <v-icon v-if="permission.roles.length == 0" class="red--text">mdi-close</v-icon>
                                                </td>
                                                <td class="text-right">  
                                                    <v-btn small class="primary" depressed fab rounded @click="assign(permission.id,'assign','permissions')"  v-if="permission.roles.length ==0"><v-icon>mdi-check</v-icon></v-btn>
                                                     <v-btn small class="error" depressed fab rounded @click="assign(permission.id,'unassign','permissions')" v-else><v-icon>mdi-close</v-icon></v-btn>
                                                
                                                    </td>
                                               </tr>
                                           </tbody>

                                      </template>
                                  </v-simple-table>
                                </v-card-text>
                            </v-card>
                            </div>
                            
                        </v-card-text>
                  </v-card>
               
           
               

                
           </v-container>
       </userlayout>
</template>
<script>
import  userlayout  from '../../../Layouts/administratorlayout';
import Vue from 'vue'

export  default {
    props: ['errors','successMessage','errorMessage','modules','roleid'],
    components: {
        userlayout
    },data(){
        return{
            loading:false
        }
    },methods: {      
      assign(id,action,table){
        var formdata = new FormData();
        formdata.append('id',id)
        formdata.append('role',this.roleid)
        formdata.append('table',table)
        formdata.append('action',action)
        this.loading = true
        this.$inertia.post('/administrator/assignfunctions',formdata,{
            onSuccess:(page)=>{
            this.loading = false
            },onError:(error)=>{
             this.loading = false
            }
        })
      }    
    
    }
}
</script>