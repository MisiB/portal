<template>
       <userlayout title="Pricing">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn> <v-btn text link disabled>Supplier Registration prices</v-btn>
                    </div>
                </v-card-text>
            </v-card>               
             <v-card flat class="mt-4">
                 <v-card-title>
                    <div class="display-1">Supplier Registration prices</div>
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
                                   <th>locality</th>
                                   <th>Action</th>
                                   <th>Price</th>
                                   <th>Agent</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="price in prices" :key="price.id">
                                    
                                      <td>
                                        {{price.locality}}
                                     </td>
                                       <td>
                                        {{price.action}}
                                       </td>
                                       <td>
                                         {{price.currency.name}}{{price.price}}
                                       </td>
                                       <td>
                                           {{price.user.name}} {{price.user.surname}}
                                       </td>
                                    <td>
                                     
                                          <v-btn small depressed class="ml-2" color="error" @click="deleteRecord(price.id)">
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
                         <div>Pricing</div>
                         <v-spacer/>
                         <v-btn icon @click="addModel=false"><v-icon>mdi-close</v-icon></v-btn>
                     </v-card-title>
                     <v-card-text>
                          <v-select
                            v-model="form.currency"
                            label="Select currency"
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
                            <v-select
                            v-model="form.action"
                            label="Select Action"
                            :items="action"
                            outlined
                            :error-messages="errors.action"
                            >
                         </v-select>
                          <v-text-field
                            v-model="form.price"
                            label="Price"
                            outlined
                            :error-messages="errors.price"
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
    props: ['errors','successMessage','errorMessage','prices'],
    components: {
        userlayout
    },
    data(){
        return{
          addModel:false,
          form:this.$inertia.form({
              id:'',
              currency:'',
              locality:'',
              action:'',
              price:''

          }),
          locality:['local','foreign'],
          action:['RENEW','NEW'],
          currency:[{id:'1',name:'USD'}]
        }
    },methods: {
       
        submit(){

            this.form.post(this.$route('supplierprice.store'),{
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
                        this.$inertia.delete(this.$route('supplierprice.destroy',id),{
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