<template>
       <userlayout title="Exchangerate">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn> <v-btn text link disabled>Exchange Rates</v-btn>
                    </div>
                </v-card-text>
            </v-card>               
             <v-card flat class="mt-4">
                 <v-card-title>
                    <div class="display-1">Exchange Rates</div>
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
                    <template>
                        <v-tabs v-model="tab">
                            <v-tab>Internal Rates</v-tab>
                            <v-tab>Inter-bank Rates</v-tab>
                        </v-tabs>
                          <v-tabs-items v-model="tab">
                              <v-tab-item>
                                    <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                   <th>Primary Currency</th>
                                   <th>Secondary Currency</th>
                                   <th>Rate</th>
                                   <th>User</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="rate in internalrates" :key="rate.id">
                                    <td>
                                        {{rate.basecurrency.name}}
                                    </td>
                                    <td>
                                        {{rate.othercurrency.name}}
                                    </td>
                                    <td>
                                        1:{{rate.value}}
                                    </td>
                                    <td>
                                        {{rate.user.name}} {{rate.user.surname}}
                                    </td>
                                    <td>
                                     
                                          <v-btn small depressed class="ml-2" color="error" @click="deleteRecord('internal',rate.id)">
                                            <v-icon>mdi-delete</v-icon>
                                        </v-btn>

                                    </td>
                                </tr>
                            </tbody>
                        </template>
                    </v-simple-table>
                              </v-tab-item>
                               <v-tab-item>
                                 <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                   <th>Primary Currency</th>
                                   <th>Secondary Currency</th>
                                   <th>Rate</th>
                                   <th>User</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="bank in bankrates" :key="bank.id">
                                    <td>
                                        {{bank.basecurrency.name}}
                                    </td>
                                    <td>
                                        {{bank.othercurrency.name}}
                                    </td>
                                    <td>
                                        1:{{bank.value}}
                                    </td>
                                     <td>
                                        {{bank.user.name}} {{bank.user.surname}}
                                    </td>
                                    <td>
                                     
                                          <v-btn small depressed class="ml-2" color="error" @click="deleteRecord('bank',bank.id)">
                                            <v-icon>mdi-delete</v-icon>
                                        </v-btn>

                                    </td>
                                </tr>
                            </tbody>
                        </template>
                    </v-simple-table>
                              </v-tab-item>
                          </v-tabs-items>
                    </template>
                    
                </v-card-text>
             </v-card>
             <v-dialog max-width="400" v-model="addModel">
                
                 <v-card>
                     <v-card-title>
                         <div>Currency</div>
                         <v-spacer/>
                         <v-btn icon @click="addModel=false"><v-icon>mdi-close</v-icon></v-btn>
                     </v-card-title>
                     <v-card-text>
                         <v-select
                            v-model="form.base"
                            label="Primary currency"
                            :items="currency"
                            item-text="name"
                            item-value="id"
                            outlined
                            :error-messages="errors.base"
                            >
                         </v-select>
                          <v-select
                            v-model="form.other"
                            label="Secondary currency"
                            :items="currency"
                            item-text="name"
                            item-value="id"
                            outlined
                            :error-messages="errors.other"
                            >
                         </v-select>
                          <v-text-field
                            v-model="form.value"
                            label="Value"
                            outlined
                            :error-messages="errors.value"
                            >
                         </v-text-field>
                           <v-select
                            v-model="form.type"
                            label="Select Type"
                            :items="typelist"
                            outlined
                            :error-messages="errors.type"
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
    props: ['errors','successMessage','errorMessage','internalrates','bankrates','currency'],
    components: {
        userlayout
    },
    data(){
        return{
          addModel:false,
           tab: null,
          form:this.$inertia.form({
              id:'',
              value:'',
              other:'',
              base:'',
              type:''
          }),
          typelist:['internal','interbank']
        }
    },methods: {
        editShow(type){
            this.form=this.$inertia.form({
              id:type.id,
              name:type.name
          })
          this.addModel = true
        },
        submit(){

            this.form.post(this.$route('rates.store'),{
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
        },deleteRecord(type,id){   

            var formdata = {type:type,id:id}
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
                        this.$inertia.put(this.$route('rates.update',id),formdata,{
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