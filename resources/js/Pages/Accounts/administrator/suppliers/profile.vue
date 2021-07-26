<template>
       <userlayout title="Suppleir">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn>  <v-btn text link :href="$route('pendingsuppliers.index')" >Pending Supplier Documents</v-btn> <v-btn text link disabled>Profile show</v-btn>
                    </div>
                </v-card-text>
            </v-card>               
             <v-card flat class="mt-4">
                 <v-card-title>
                    <div class="headline">{{company.name}}</div>
                    <v-spacer/>
                    <v-btn outlined small color="success" @click="approve" :loading="loading" :disabled="loading">Approve</v-btn>
                
                 </v-card-title>
                 <v-divider/>
                <v-card-text>
                    <template>
                        <v-tabs v-model="tab">
                            <v-tab>
                                 <v-badge
                                color="green"
                                :content="company.documents.length"
                                >
                                 Documents
                                </v-badge>
                              
                                
                        </v-tab>
                            <v-tab class="ml-2">
                                  <v-badge
                                color="red"
                                :content="company.registrations.length"
                                >
                                  Categories
                                </v-badge>
                              
                              
                        </v-tab>
                          <v-tab class="ml-2">
                                  <v-badge
                                color="red"
                                :content="company.documentcomments.length"
                                >
                                  Comments
                                </v-badge>
                              
                              
                        </v-tab>
                        </v-tabs>
                          <v-tabs-items v-model="tab">
                              <v-tab-item>
                              <documents :documents="company.documents"></documents>
                              </v-tab-item>
                               <v-tab-item>
                                <registrations :registrations="company.registrations"></registrations>
                              </v-tab-item>
                               <v-tab-item>
                               <comments :comments="company.documentcomments" :company="company.id" :errors="errors"></comments>
                              </v-tab-item>
                          </v-tabs-items>
                    </template>
                    
                </v-card-text>
             </v-card>
               

                
           </v-container>
       </userlayout>
</template>
<script>
import  userlayout  from '../../../Layouts/administratorlayout';
import documents from '../../../../Components/documents.vue'
import registrations from '../../../../Components/registrations.vue'
import comments from '../../../../Components/comments.vue'
import Vue from 'vue'

export  default {
    props: ['errors','successMessage','errorMessage','company'],
    components: {
        userlayout,
        documents,
        registrations,
        comments
    },
    data(){
        return{
          addModel:false,
           tab: null,
           loading:false
        }
    },methods: {
       approve(){

             Vue.swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Approve'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        this.loading= true
                      var data ={id:this.company.id}
           this.$inertia.post(this.$route('pendingsuppliers.store'),data,{
                                    onSuccess:(page)=>{
                                    this.loading = false
                                        Vue.swal(
                                            'Approved',
                                            'Documents successfully processed.',
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