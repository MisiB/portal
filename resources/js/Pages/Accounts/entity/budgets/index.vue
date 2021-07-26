<template>
       <userlayout title="Dashboard">
          <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('entity.home')" >Dashboard</v-btn> <v-btn text link disabled>Procurement Plans</v-btn>
                    </div>
                </v-card-text>
            </v-card> 
        
            <v-row class="mt-4">
                <v-col>              
             <v-card flat >
                 <v-card-title>
                     <div>Procurement  Plans</div>
                      <v-spacer/>
                      <v-btn fab color="primary" @click="addModel=true"><v-icon>mdi-plus</v-icon></v-btn>
                       
                     </v-card-title>
                 
                 <v-card-text>
                     <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>                                    
                                    <th>Year</th>
                                   <th>Status</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="budgets.length>0">
                                <tr v-for="budget in budgets" :key="budget.id" >
                                 
                                  <td>
                                      {{budget.year}}
                                  </td>
                                  <td>
                                      {{budget.status}}
                                  </td>
                                  <td>
                                      <v-btn small color="primary" depressed rounded @click="showModel(budget)">edit</v-btn>
                                  </td>
                                </tr>
                                </template>
                                <template v-else>
                                   <tr>
                                       <td colspan="3" class="pa-5 text-center red--text">No procurement Budgets found</td>
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
                        <div>Upload Budget</div>
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
                         <v-btn small rounded color="success" @click="uploadPlan">submit</v-btn>
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
    props: ['errors','successMessage','errorMessage','budgets'],
    components: {
        userlayout
    },
    data(){
        return{
            addModel:false,
            form:this.$inertia.form({
                id:'',
                filename:''
            })
        }
    },methods: {
          download(path){
              var url = '/'+path
              window.open(url)
          },showModel(plan){
                this.formthis.$inertia.form({
                id:plan.id,
                filename:''
            })
              this.addModel = true
          },uploadPlan(){
              this.form.post(this.$route('entityprocurementbudgets.store'),{
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