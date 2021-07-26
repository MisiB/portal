<template>
       <userlayout title="PE's">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn> <v-btn text link disabled>Procurement Entity List</v-btn>
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
                                   <th>city</th>
                                   <th>province</th>
                                    <th>District</th>
                                    <th>Class</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="entity in entitylist" :key="entity.id">
                                    <td>
                                        {{entity.name}}
                                    </td>
                                    <td>
                                     {{entity.city}}                                     

                                    </td>
                                     <td>
                                     {{entity.province}}                                    

                                    </td>
                                     <td>
                                     {{entity.district}}                                    

                                    </td>
                                    <td>
                                     
                                        <template v-if="entity.procurementclass.length>0">
                                            {{entity.procurementclass[0].name}}
                                        </template>
                                        <template v-else>
                                            <span class="red--text">not set</span>
                                        </template>
                                    </td>
                                    <td class="d-flex pa-4 justify-end">
                                        <v-btn small depressed color="primary" @click="editShow(entity)">
                                            <v-icon>mdi-pencil</v-icon>
                                        </v-btn>
                                          <v-btn small depressed class="ml-2" color="error" @click="deleteRecord(entity.id)">
                                            <v-icon>mdi-delete</v-icon>
                                        </v-btn>
                                        <entity :entity="entity" :roles="roles" :errors="errors"></entity>
                                         

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
                         <div>New Entity</div>
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
                            v-model="form.slug"
                            label="Abbriviation"
                            outlined
                            :error-messages="errors.slug"
                            >
                         </v-text-field>
                           <v-text-field
                            v-model="form.city"
                            label="City"
                            outlined
                            :error-messages="errors.city"
                            >
                         </v-text-field>
                          <v-select
                                           :items="sectorlist"
                                           label="Sector"
                                           outlined
                                           v-model="form.sector"
                                           :error-messages="errors.sector"
                                       >
                                       </v-select>
                                     <v-select
                                           :items="provincelist"
                                           label="Province"
                                           outlined
                                           v-model="form.province"
                                           :error-messages="errors.province"
                                       >
                                       </v-select>
                                        <v-select
                                           v-if="form.province"
                                           :items="computeList"
                                           label="District"
                                           outlined
                                           v-model="form.district"
                                           :error-messages="errors.district"
                                       >
                                       </v-select>
                                       <v-select
                                        v-model="form.procurementclass"
                                           :items="classlist"
                                           label="Procurement Class"
                                           item-text="name"
                                           item-value="id"
                                           outlined
                                          
                                           :error-messages="errors.procurementclass"
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
import entity from '../../../../Components/entityusers'
import Vue from 'vue'

export  default {
    props: ['errors','successMessage','errorMessage','entitylist','classlist','roles'],
    components: {
        userlayout,
        entity
    },
    data(){
        return{
          addModel:false,
            search:"",
            sectorlist:['Government','Councils','Parastatals','Mining','Health','NGO','Other'],
            provincelist:['Matabeleland South','Mashonaland Central','Mashonaland West','Mashonaland North','Mashonaland East','Masvingo','Midlands','Manicaland','Bulawayo','Harare'],
        
          form:this.$inertia.form({
              id:'',
              name:'',
              city:'',
              province:'',
              district:'',
              sector:'',
              slug:'',
              procurementclass:''
          })
        }
    },methods: {
        editShow(type){
            this.form=this.$inertia.form({
              id:type.id,
              name:type.name,
              city:type.city,
              slug:type.slug,
              province:type.province,
              district:type.destrict,
              sector:type.sector,
             procurementclass:''
          })
          this.addModel = true
       
        },
        submit(){

            this.form.post(this.$route('entitylist.store'),{
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
            this.$inertia.replace(this.$route('entitylist.index',{term:this.search}))
        }
    },computed:{
        computeList(){
            var list = [];
            if(this.form.province =='Matabeleland South')
            {
                list=['Beitbridge','Bulilima','Gwanda','Insiza','Mangwe','Matobo','Umzingwane']
            }
            else if(this.form.province =='Bulawayo'){
                list =['Bulawayo']
            }
            else if(this.form.province=='Mashonaland Central'){
                list=["Bindura","Guruve","Mazowe","Mbire","Mount Darwin","Muzarabani"]
            }
            else if(this.form.province=='Mashonaland West'){
                list=["Chegutu","Chinhoyi","Hurungwe","Kariba","Makonde","Mhondoro-Ngezi","Sanyati","Zvimba"]
            }
            else if(this.form.province=='Mashonaland East'){
                list=["Chikomba","Goromonzi","Marondera","Mudzi","Murehwa","Mutoko","Seke","Uzumba-Maramba-Pfungwe"]
            }
            else if(this.form.province=='Masvingo'){
                list=["Bikita","Chiredzi","Chivi","Gutu","Masvingo","Mwenezi","Zaka"]
            }
            else if(this.form.province=='Midlands'){
                list=["Chirumhanzu","Gokwe North","Gokwe South","Gweru","Kwekwe","Mberengwa","Shurugwi","Zvishavane"]
            }
            else if(this.form.province=='Manicaland'){
                list=[ "Buhera","Chimanimani","Chipinge","Makoni","Mutare","Mutasa","Nyanga"]
            }
            else if(this.form.province=='Harare'){
                list=['Harare']
            }

            return list;
        }
    }
}
</script>