<template>
    <userlayout title="Documents Upload">
        <v-container>        

            <v-stepper alt-labels>
                <v-stepper-header>
                    <v-stepper-step
                        step="1"

                    >
                        <small>Document Upload</small>
                    </v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step
                        step="2"

                    >
                        <small>Invoicing</small>
                    </v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step
                        step="3"
                    >
                        <small> Payment</small>
                    </v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step step="4">
                        <small>Finish</small>
                    </v-stepper-step>
                </v-stepper-header>
            </v-stepper>
            <v-row class="mt-3">
                <v-col cols="12">
                    <v-card>
                        <v-card-text>
                        <div v-for="doc in documents" :key="doc.id">
                        <v-row class="pa-3">
                            <v-col cols="12" md="10">
                                <div>{{doc.name}}</div>
                                <div>

                                    <small v-if="doc.uploaded" class="green--text">
                                        UPLOADED
                                    </small>
                                    <small v-else class="red--text">
                                      PENDING
                                    </small>
                                </div>
                            </v-col>
                            <v-col sm="6" md="2">
                              <v-btn outlined rounded block v-if="!doc.uploaded" color="blue" @click="showForm(doc)">Upload</v-btn>
                            </v-col>
                        </v-row>
                            <v-divider></v-divider>
                        </div>
                        </v-card-text>
                    </v-card>
                </v-col>
            </v-row>

        </v-container>
        <v-dialog max-width="400" v-model="uploadDialog">
            <v-card>
                <v-card-title>
                    <div>{{title}}</div>
                    <v-spacer/>
                    <v-btn icon @click="uploadDialog=false"><v-icon>mdi-close</v-icon></v-btn>
                </v-card-title>
                <v-card-text>
                    <v-file-input
                        show-size
                        counter
                        outlined
                        label="Attach Document"
                        prepend-icon="mdi-pdf-box"
                        accept=".pdf"
                        v-model="form.filename"
                        :error-messages="errors.filename"
                    >
                    </v-file-input>
                </v-card-text>
                <v-card-actions>
                    <v-btn small outlined rounded color="red" @click="uploadDialog=false">Close</v-btn>
                    <v-spacer/>
                    <v-btn small outlined rounded color="green" @click="upload" :loading="form.processing" :disabled="form.processing">Upload</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </userlayout>
</template>
<script>
import  userlayout  from '../../../Layouts/userlayout';
import Vue from 'vue'
export  default {
    props: ['errors','successMessage','errorMessage','documents'],
    components: {
        userlayout
    },
    data(){
        return {
            uploadDialog:false,
            title:'',
            id:'',
            form:this.$inertia.form({
                document:'',
                filename:null
            })

        }

    },methods:{
        showForm(doc){
            this.title = doc.name,
               this.form = this.$inertia.form({
                   document:doc.id,
                   filename:null
               })
                this.uploadDialog=true
        },upload(){
          this.form.post(this.$route('documents.store'),{
              onSuccess:(page)=>{
                  if(this.successMessage){
                      Vue.swal('Success',this.successMessage,'success')
                      this.form.reset()
                      this.uploadDialog = false;
                  }
                  if(this.errorMessage){
                     Vue.swal('Oops',this.errorMessage,'error') 
                  }
              }
          })
            

        }
    }
}
</script>

