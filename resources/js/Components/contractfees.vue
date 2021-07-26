<template>
    <div>
     <v-card>
         <v-card-title>
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
         <v-card-text>
               <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                   <th>Lower</th>
                                   <th>Upper</th>
                                   <th>Price</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="datalist.length>0">
                                <tr v-for="dt in datalist" :key="dt.id">
                                   
                                     <td>
                                       {{dt.currency.name}} {{dt.lower}}
                                    </td>
                                     <td>
                                       {{dt.currency.name}} {{dt.upper}}
                                    </td>
                                     <td>
                                        {{dt.currency.name}}{{dt.amount}}
                                    </td>
                                    <td class="d-flex pa-4 justify-end">
                                          <v-btn small depressed class="ml-2" color="error" @click="deleteRecord(dt.id)">
                                            <v-icon>mdi-delete</v-icon>
                                        </v-btn>

                                    </td>
                                </tr>
                                </template>
                                <template v-else>
                                    <tr>
                                        <td colspan="6" class="text-center pa-5 red--text"> No fees found</td>
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
                         <div>Fee</div>
                         <v-spacer/>
                         <v-btn icon @click="addModel=false"><v-icon>mdi-close</v-icon></v-btn>
                     </v-card-title>
                     <v-card-text>
                          <v-text-field
                            v-model="form.lower"
                            label="lower limit"
                            type="number"
                            outlined
                            :error-messages="errors.lower"
                            >
                         </v-text-field>
                           <v-text-field
                            v-model="form.upper"
                            label="Upper limit"
                            type="number"
                            outlined
                            :error-messages="errors.upper"
                            >
                         </v-text-field>
                              <v-select
                            v-model="form.currency"
                            label="Currency"
                            outlined
                            :items="currency"
                            item-value="id"
                            item-text="name"
                            :error-messages="errors.currency"
                            >
                             </v-select>
                             <v-text-field
                            v-model="form.price"
                            label="Price"
                            type="number"
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
    </div>
</template>
<script>
import Vue from 'vue'
export default {
    props:['currency','datalist','errors'],
    data(){
        return{
            addModel:false,
            form:this.$inertia.form({
                id:'',
                lower:'',
                upper:'',
                currency:'',
                price:''
            }),
          
        
        }
    },methods: {
        
        submit(){

            this.form.post(this.$route('contractfees.store'),{
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
                        this.$inertia.delete(this.$route('contractfees.destroy',id),{
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