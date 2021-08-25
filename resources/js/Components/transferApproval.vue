<template>
<div>
    <v-btn small depressed color="success" @click="showPop=true">View Request</v-btn>
      <v-dialog v-model="showPop" max-width="600">
           <v-card>
               <v-card-title>
                  <div>Approve Transfer Request</div>
                  <v-spacer/>
                   <v-btn small depressed color="error"  @click="showPop=false">Close</v-btn>
                </v-card-title>
               <v-card-text>
                    <v-simple-table>
                        <template v-slot:default>
                            <tbody>
                                <tr>
                                    <th>From Company</th>
                                    <td>{{transfer[0].from_company.name}}</td>
                                </tr>
                                 <tr>
                                    <th>To Company</th>
                                    <td>{{transfer[0].to_company.name}}</td>
                                </tr>
                                 <tr>
                                    <th>Destination Account</th>
                                    <td>{{transfer[0].accountnumber}}</td>
                                </tr>
                                 <tr>
                                    <th>Amount</th>
                                    <td>{{transfer[0].amount}}</td>
                                </tr>
                                <tr>
                                    <th>Requested By</th>
                                    <td>{{transfer[0].requested_by.name}} {{transfer[0].requested_by.surname}}</td>
                                </tr>
                                <tr>
                                    <td colspan="2"> <v-btn small depressed block color="primary" @click="download(transfer[0].filename)">Download Request letter</v-btn></td>
                                </tr>
                                <tr>
                                    <td colspan="2"> <v-btn small depressed block color="success" @click="upload">Approve Request</v-btn></td>
                                </tr>
                            </tbody>
                        </template>
                    </v-simple-table>
               </v-card-text>
               
           </v-card>
      </v-dialog>
</div>
</template>
<script>
import Vue from 'vue' 
export default {
    props:['errors','transfer','successMessage','errorMessage'],
    data(){
        return{
           showPop:false,
            form:this.$inertia.form({
              suspense_id:this.suspense_id,
              amount:"",
              regnumber:"",
              accountnumber:"",
              filename:null
            })
        }
    },methods:{
        upload(){
           this.$inertia.get(this.$route('suspense-transfer.show',this.transfer[0].id),{
              onSuccess:(page)=>{
                  if(this.successMessage){
                      Vue.swal('Success',this.successMessage,'success')
                      this.form.reset()
                      this.showPop = false;
                  }
                  if(this.errorMessage){
                     Vue.swal('Oops',this.errorMessage,'error') 
                  }
              }
          })
        },download(path){
            var link = '/'+path
             window.open(link)
        }
    }
}
</script>