<template>
    <div>
        <v-card>
            <v-card-title>
                <div>Comments</div>
                <v-spacer/>
                <v-btn fab class="primary" @click="addModel=true"><v-icon>mdi-plus</v-icon></v-btn>
            </v-card-title>
            <v-card-text>
                <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                   <th>Comment</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <template v-if="comments.length>0">
                             <tr v-for="comment in comments" :key="comment.id">
                              <td>{{comment.created_at | formatDate}}</td>
                              <td>{{comment.comment}}</td>
                             </tr>
                            </template>
                            <template v-else>
                                <tr>
                                    <td colspan="2" class="text-center red--text">No Commments found</td>
                                </tr>
                            </template>
                            </tbody>
                        </template>
                </v-simple-table>
            </v-card-text>
        </v-card>

        <v-dialog v-model="addModel" max-width="500">
          <v-card>
            <v-card-title>
                <div>New Comment</div>
                <v-spacer/>
                <v-btn icon  @click="addModel=false">
                    <v-icon>mdi-close</v-icon>
                </v-btn>
            </v-card-title>
            <v-card-text>
                <v-textarea
                v-model="form.comment"
                outlined
                :error-messages="errors.comment"
                >
                </v-textarea>
            </v-card-text>
            <v-card-actions>
                <v-btn rounded small color="error" @click="addModel=false">Cancel</v-btn>
                <v-spacer/>
                <v-btn rounded small color="success" @click="submit" :loading="loading" :disabled="loading">submit</v-btn>
            </v-card-actions>
         </v-card>  
        </v-dialog>
    </div>
</template>
<script>
import Vue from 'vue'
export default {
    props:['successMessage','errorMessage','comments','company','errors'],
  data(){
      return{
          form:this.$inertia.form({
              company:this.company,
              comment:''
          }),
          loading:false,
          addModel:false
      }
  },methods:{
      submit(){
          this.loading = true;
          this.form.post(this.$route('suppliercomments.store'),{
              onSuccess:(page)=>{
              this.loading = false
                 Vue.swal(
                                            'Successful',
                                            this.successMessage,
                                            'success'
                                            )
                                        
                  
              },
              onError:(error)=>{
               this.loading = false
              }
          })
      }
  }
}
</script>