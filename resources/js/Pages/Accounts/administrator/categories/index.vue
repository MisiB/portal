<template>
       <userlayout title="Categories">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn> <v-btn text link disabled>Supplier Categories</v-btn>
                    </div>
                </v-card-text>
            </v-card>               
             <v-card flat class="mt-4">
                 <v-card-title>
                      <v-text-field
                            v-model="search"
                            placeholder="Search"
                            dense
                            outlined
                            v-on:keyup.enter="filterData"
                            >
                         </v-text-field>
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
                                    <th>Section</th>
                                   <th>Name</th>
                                   <th>Code</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="category in categories" :key="category.id">
                                    <td>
                                        {{category.section.name}}
                                    </td>
                                    <td>
                                    
                                        <div>{{category.name}}</div>
                                        <div>{{category.code}}</div>

                                    </td>
                                    <td class="d-flex pa-4 justify-end">
                                        <v-btn small depressed color="primary" @click="editShow(category)">
                                            <v-icon>mdi-pencil</v-icon>
                                        </v-btn>
                                          <v-btn small depressed class="ml-2" color="error" @click="deleteRecord(category.id)">
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
                         <div>Supplier Category</div>
                         <v-spacer/>
                         <v-btn icon @click="addModel=false"><v-icon>mdi-close</v-icon></v-btn>
                     </v-card-title>
                     <v-card-text>
                          <v-text-field
                            v-model="form.name"
                            label="Name"
                            outlined
                            :error-messages="errors.name"
                            >
                         </v-text-field>
                          <v-text-field
                            v-model="form.code"
                            label="code"
                            outlined
                            :error-messages="errors.code"
                            >
                         </v-text-field>
                          <v-select
                            v-model="form.section"
                            label="section"
                            :items="sections"
                            item-text="name"
                            item-value="id"
                            outlined
                            :error-messages="errors.section"
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
    props: ['errors','successMessage','errorMessage','sections','categories'],
    components: {
        userlayout
    },
    data(){
        return{
          addModel:false,
          search:"",
          form:this.$inertia.form({
              id:'',
              name:'',
              code:'',
              section:''
          })
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

            this.form.post(this.$route('categories.store'),{
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
                                            this.errorMessage,
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
                        this.$inertia.delete(this.$route('categories.destroy',id),{
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
          
        },filterData(){
            this.$inertia.replace(this.$route('categories.index',{term:this.search}))
        }
    }
}
</script>