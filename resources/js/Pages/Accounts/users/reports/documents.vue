<template>
    <userlayout title="Documents Report">
        <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('dashboard')" >Dashboard</v-btn> <v-btn text link disabled>Invoices</v-btn>
                    </div>
                </v-card-text>
            </v-card>
                   <v-alert
                   class="mt-4"
                color="red lighten-2"
                dark
                v-if="errorMessage"
            >
                {{errorMessage}}
            </v-alert>
            <v-alert
            class="mt-4"
                color="green lighten-2"
                dark
                v-if="successMessage"
            >
                {{successMessage}}
            </v-alert>
            <v-card flat class="mt-5">
                <v-card-text>
                   <v-simple-table>
                       <template v-slot:default>
                           <thead>
                               <tr>
                                   <th>Required Document</th>
                                   <th>Status</th>
                                   <th></th>
                               </tr>
                           </thead>
                           <tbody>
                               <template v-if="documents.length>0">
                                   <tr v-for="doc in documents" :key="doc.id" class="pt-2 pb-2">
                                       <td>{{doc.name}}</td>
                                       <td>{{doc.status}}</td>
                                       <td class="d-flex">                                           
                                           <v-btn color="green" depressed class="white--text mt-1" small v-if="doc.uploaded" @click="openUpload(doc)">Upload</v-btn>
                                       </td>
                                   </tr>
                               </template>
                               <template v-else>
                                  <tr>
                                      <td colspan="3" class="text-center red-text">No Company Documents Found</td>
                                  </tr>
                               </template>
                           </tbody>
                       </template>
                   </v-simple-table>
                </v-card-text>
            </v-card>
        </v-container>

        <v-dialog v-model="uploadModel" max-width="600">
             <v-form ref="form" lazy-validation v-model="isValid">
           <v-card>
            <v-card-title>
                <div>
                    <div>Upload {{title}}</div>
                    <div><small class="red--text">Atleast {{pages}} pages</small></div>
                </div>
                <v-spacer/>
                <v-btn icon @click="uploadModel=false"><v-icon>mdi-close</v-icon></v-btn>
            </v-card-title>
            <v-card-text>
                <v-file-input
                        show-size
                        counter
                        outlined
                        label="Attach Document"
                        prepend-icon="mdi-pdf-box"
                        accept=".pdf"
                        v-model="filename"
                        :rules="fileRule"
                    >
                    </v-file-input>
            </v-card-text>
               <v-card-actions>
                    <v-btn small outlined rounded color="red" @click="uploadDialog=false">Close</v-btn>
                    <v-spacer/>
                    <v-btn small outlined rounded color="green" @click="upload" :loading="loading" :disabled="loading">Upload</v-btn>
                </v-card-actions>
           </v-card>
             </v-form>   
        </v-dialog>    
    </userlayout>         
                
</template>
<script>
import  userlayout  from '../../../Layouts/userlayout'
export  default {
    props: ['errors','successMessage','errorMessage','documents'],
    components: {
        userlayout
    },data(){
        return{
            loading:false ,
            uploadModel:false,
            title:'',
            pages:'',
            id:'',
            filename:null,
            isValid:false,
            loading:false,
            isValid:true,
            fileRule:  [
                v => !v|| v.size < 5000000 || 'File size should be less than 5 MB!',
                v => !!v || 'File is required is required',
            ] 

        }
    },methods:{     
      openUpload(documt){
          this.uploadModel = true,
          this.id = documt.company_document_id,
          this.title = documt.name,
          this.pages = documt.pages
      },
      upload(){
             var formdata =new FormData()
            formdata.append('id',this.id)
            formdata.append('pages',this.pages)
            formdata.append('filename',this.filename)
            if(this.$refs.form.validate()){
                this.loading=true
                this.$inertia.post('/bidders/reportDocuments',formdata).then(()=>{
                    this.loading=false
                    this.uploadModel =false
                    this.filename=null
                })
            }
      }

    }
}
</script>