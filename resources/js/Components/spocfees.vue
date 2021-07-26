<template>
    <div>
           <v-btn small depressed color="primary" @click="showModel=true">
                                            View Fees
            </v-btn>
                                        
             <v-dialog v-model="showModel" max-width="800">
                 <v-card>
                     <v-card-title>
                         <div>Spoc Fees</div>
                         <v-spacer/>
                         <v-btn icon @click="showModel=false"><v-icon>mdi-close</v-icon></v-btn>
                     </v-card-title>
                     <v-card-text>
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
                         <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                   <th>Price</th>
                                   <th>Status</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="datalist.spocfees.length > 0">
                                 <tr v-for="spoc in datalist.spocfees" :key="spoc.id"><td>{{datalist.currency.name}}{{spoc.value}}</td><td>{{spoc.status}}</td><td>  <v-btn small depressed class="ml-2" color="error" @click="deleteRecord(dt.id)">
                                            <v-icon>mdi-delete</v-icon>
                                        </v-btn></td></tr>   
                                </template>
                                <template v-else>
                                    <tr>
                                        <td colspan="3" class="text-center red--text pa-5"> No SPOC Fees found</td>
                                    </tr>
                                </template>
                            </tbody>
                        </template>
                         </v-simple-table>
                     </v-card-text>
                 </v-card>
             </v-dialog>
                <v-dialog max-width="400" v-model="addModel">
                
                 <v-card>
                     <v-card-title>
                         <div>Fee</div>
                         <v-spacer/>
                         <v-btn icon @click="addModel=false"><v-icon>mdi-close</v-icon></v-btn>
                     </v-card-title>
                     <v-card-text>
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
            showModel:false,
            addModel:false,
            loading:false,
            form:this.$inertia.form({
                id:'',
                threshold:this.datalist.id,
                price:''
            })
        }
    },methods:{
        submit(){
            this.form.post(this.$route('spocfees.store'),{
                onSuccess:(page)=>{
                    this.form.reset()
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
                        this.$inertia.delete(this.$route('spocfees.destroy',id),{
                                    onSuccess:(page)=>{
                                    this.loading = false
                                        Vue.swal(
                                            'Deleted!',
                                            'Spoc fee deleted has been deleted.',
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