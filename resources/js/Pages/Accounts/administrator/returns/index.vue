<template>
       <userlayout title="Returns">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn> <v-btn text link disabled>Procurement Returns</v-btn>
                    </div>
                </v-card-text>
            </v-card>               
             <v-card flat class="mt-4">
                 <v-card-title>
                     <div>Procurement Returns</div>     
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
                                   <th>Year</th>
                                   <th>Due Date</th>
                                   <th>Uploads</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="returns.length >0">
                                <tr v-for="(retrn,index) in returns" :key="index">
                                    <td>
                                        {{retrn.name}}
                                    </td>
                                    <td>                                    
                                     {{retrn.year}}
                                    </td>
                                      <td>                                    
                                     {{retrn.duedate}}
                                    </td>
                                     <td>                                    
                                     {{retrn.uploads.length}}
                                    </td>
                                    <td class="d-flex pa-4 justify-end">
                                         <v-btn small depressed  color="error" @click="deleteRecord(retrn.id)">
                                            delete
                                        </v-btn>
                                       <v-btn small depressed  color="success" class="ml-2" :href="$route('procurementreturns.show',retrn.id)">
                                            View
                                        </v-btn>
                                    </td>
                                </tr>
                                </template>
                                <template v-else>
                                    <tr>
                                        <td colspan="5" class="pa-5 text-center red--text">
                                            No Procurement returns added as  yet
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </template>
                    </v-simple-table>
                    
                </v-card-text>
              
             </v-card>
               <v-dialog max-width="400" v-model="addModel">
                
                 <v-card>
                     <v-card-title>
                         <div>New Return</div>
                         <v-spacer/>
                         <v-btn icon @click="addModel=false"><v-icon>mdi-close</v-icon></v-btn>
                     </v-card-title>
                     <v-card-text>
                          <v-text-field
                            v-model="name"
                            label="Name"
                            outlined
                            :error-messages="errors.name"
                            >
                         </v-text-field>
                          <v-text-field
                            v-model="duedate"
                            label="code"
                            type="date"
                            outlined
                            :error-messages="errors.duedate"
                            >
                         </v-text-field>
                       <v-file-input
                        show-size
                        counter
                        outlined
                        label="Attach Template "
                        v-model="templateurl"
                        :error-messages="errors.templateurl"
                    >
                    </v-file-input>
                     </v-card-text>
                     <v-card-actions>
                   <v-btn rounded outlined color="red" @click="addModel=false">Cancel</v-btn>
                    <v-spacer/>
                    <v-btn rounded outlined color="green" @click="submit" :loading="loading" :disabled="loading">Submit</v-btn>
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
    props: ['errors','successMessage','errorMessage','returns'],
    components: {
        userlayout
    },data(){
        return{
            addModel:false,
            name:'',
            duedate:'',
            templateurl:null,
            loading:false
        }
    },methods:{
        submit(){
            var formdata = new FormData();
            formdata.append('name',this.name)
            formdata.append('duedate',this.duedate)
            formdata.append('templateurl',this.templateurl)
            this.loading = true
            this.$inertia.post(this.$route('procurementreturns.store'),formdata,{
                onSuccess:(page)=>{
                   
                   this.loading = false
                   this.addModel = false
                   this.name =""
                   this.duedate=""
                   this.templateurl=null
                    Vue.swal(
                          'Successful',
                           this.successMessage,
                           'success'
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
                        this.$inertia.delete(this.$route('procurementreturns.destroy',id),{
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