<template>
       <userlayout title="Procurement Threshold">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn> <v-btn text link disabled>Procurement Threshold</v-btn>
                    </div>
                </v-card-text>
            </v-card>               
             <v-card flat class="mt-4">
                 <v-card-title>
                    <div class="display-1">Procurement Threshold</div>
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
                                   <th>Class</th>
                                   <th>Classification</th>
                                   <th>locality</th>
                                   <th>Value</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="clss in threshold" :key="clss.id">
                                    <td>
                                        {{clss.procurementclass.name}}
                                    </td>
                                     <td>
                                        {{clss.classification.name}}
                                    </td>
                                     <td>
                                        {{clss.locality}}
                                    </td>
                                     <td>
                                        {{clss.currency.name}}{{clss.value}}
                                    </td>
                                    <td class="d-flex pa-4 justify-end">
                                        <v-btn small depressed color="primary" @click="editShow(clss)">
                                            <v-icon>mdi-pencil</v-icon>
                                        </v-btn>
                                          <v-btn small depressed class="ml-2" color="error" @click="deleteRecord(clss.id)">
                                            <v-icon>mdi-delete</v-icon>
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
                         <div>Procurement Class</div>
                         <v-spacer/>
                         <v-btn icon @click="addModel=false"><v-icon>mdi-close</v-icon></v-btn>
                     </v-card-title>
                     <v-card-text>
                          <v-select
                            v-model="form.procurementclass"
                            label="Select Procurement Class"
                            :items="procurementclass"
                            item-text="name"
                            item-value="id"
                            outlined
                            :error-messages="errors.procurementclass"
                            >
                          </v-select>
                           <v-select
                            v-model="form.classification"
                            label="Select classification"
                            :items="classification"
                            item-text="name"
                            item-value="id"
                            outlined
                            :error-messages="errors.classification"
                            >
                          </v-select>
                          <v-select
                            v-model="form.currency"
                            label="Select Currency"
                            :items="currency"
                            item-text="name"
                            item-value="id"
                            outlined
                            :error-messages="errors.currency"
                            >
                          </v-select>
                           <v-select
                            v-model="form.locality"
                            label="Select locality"
                            :items="locality"
                            outlined
                            :error-messages="errors.locality"
                            >
                          </v-select>
                         <v-text-field
                            v-model="form.value"
                            label="value"
                            outlined
                            :error-messages="errors.value"
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
import  userlayout  from '../../../Layouts/administratorlayout';
import Vue from 'vue'

export  default {
    props: ['errors','successMessage','errorMessage','procurementclass','classification','currency','threshold'],
    components: {
        userlayout
    },
    data(){
        return{
          addModel:false,
          form:this.$inertia.form({
              id:'',
              currency:'',
              procurementclass:'',
              classification:'',
              locality:'',
              value:''
          }),
          locality:['local','foreign']

        }
    },methods: {
        editShow(type){
            this.form=this.$inertia.form({
              id:type.id,
              currency:type.currency_id,
              procurementclass:type.procurementclass_id,
              classification:type.classification_id,
              locality:type.locality,
              value:type.value
          })
          this.addModel = true
        },
        submit(){

            this.form.post(this.$route('threshold.store'),{
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
                        this.$inertia.delete(this.$route('threshold.destroy',id),{
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