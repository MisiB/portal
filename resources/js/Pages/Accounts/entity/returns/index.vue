<template>
       <userlayout title="Dashboard">
          <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('entity.home')" >Dashboard</v-btn> <v-btn text link disabled>Procurement Returns</v-btn>
                    </div>
                </v-card-text>
            </v-card> 
        
            <v-row class="mt-4">
                <v-col>              
             <v-card flat >
                 <v-card-title>
                     <div>Procurement Returns</div>
                     
                       
                     </v-card-title>
                 
                 <v-card-text>
                     <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Year</th>
                                   <th>Due Date</th>
                                   <th>Status</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="returns.length>0">
                                <tr v-for="ret in returns" :key="ret.id" >
                                  <td>
                                      {{ret.name}}
                                  </td>
                                  <td>
                                      {{ret.year}}
                                  </td>
                                  <td>
                                      {{ret.duedate}}
                                  </td>
                                  <td>
                                       <template v-if="ret.uploads.length >0">
                                             <div class="green--text">Uploaded</div>
                                       </template>
                                       <template v-else>
                                            <div class="red--text">Pending</div>
                                       </template>
                                  </td>
                                  <td>
                                      <v-btn small color="primary" depressed rounded @click="download(ret.templateurl)">Download Template</v-btn>
                                      <v-btn small color="success" depressed rounded @click="showModel(ret.id)">Upload Return</v-btn>
                                  </td>
                                </tr>
                                </template>
                                <template v-else>
                                   <tr>
                                       <td colspan="4" class="pa-5 text-center red--text">No procurement returns found</td>
                                   </tr>
                                </template>
                            </tbody>
                        </template>
                     </v-simple-table>
                    
                 </v-card-text>
             </v-card>
                </v-col>
            </v-row>
            <v-dialog max-width="500"  v-model="addModel">
                <v-card>
                    <v-card-title>
                        <div>Upload Return</div>
                        <v-spacer/>
                        <v-btn icon @click="addModel=false"><v-icon>mdi-close</v-icon></v-btn>
                    </v-card-title>
                    <v-card-text>
                         <v-file-input
                        show-size
                        counter
                        outlined
                        label="Attach Return"
                         prepend-icon="mdi-paperclip"
                        v-model="form.filename"
                        :error-messages="errors.filename"
                    >
                    </v-file-input>
                    </v-card-text>
                    <v-card-actions>
                        <v-btn small rounded color="error" @click="addModel=false">Cancel</v-btn>
                        <v-spacer/>
                         <v-btn small rounded color="success" @click="uploadReturn">submit</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
          </v-container>
       </userlayout>
</template>
<script>
import  userlayout  from '../../../Layouts/entityLayout';
import Vue from 'vue'
export  default {
    props: ['errors','successMessage','errorMessage','returns'],
    components: {
        userlayout
    },
    data(){
        return{
            addModel:false,
            form:this.$inertia.form({
                id:'',
                return_id:'',
                filename:''
            })
        }
    },methods: {
          download(path){
              var url = '/'+path
              window.open(url)
          },showModel(id){
              this.form.return_id = id
              this.addModel = true
          },uploadReturn(){
              this.form.post(this.$route('entityreturns.store'),{
                  onSuccess:(page)=>{
                    this.form.reset();
                    this.addModel = false
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
          }

    }
}
</script>