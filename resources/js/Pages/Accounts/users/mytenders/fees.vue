<template>
       <userlayout title="Dashboard">
          <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                          <v-btn text link :href="$route('dashboard')" >Dashboard</v-btn> <v-btn text link :href="$route('Mytenders.index')" >List</v-btn> <v-btn text link disabled>Show</v-btn>
                   </div>
                </v-card-text>
            </v-card> 
        
            <v-row class="mt-4">
                <v-col>              
             <v-card flat >
                 <v-card-title>
                     <div>Procurement Fees</div>
                   
                 </v-card-title>
                 
                 <v-card-text>
                     <v-simple-table>
                        <template v-slot:default>
                           
                            <tbody>
                               
                                <tr>
                                    <th>Title</th>
                                  <td>
                                      {{notice.title}}
                                  </td>
                                </tr>
                                <tr>
                                    <th>Closing Date</th>
                                  <td>
                                      {{notice.close_date}}
                                      {{notice.close_time}}
                                  </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                  <td>
                                      {{notice.status}}
                                  </td>
                                
                                </tr>
                                 <tr>
                                    <th>Tender Number</th>
                                  <td>
                                      {{notice.tendernumber}}
                                  </td>
                                
                                </tr>
                                </tbody>
                        </template>
                     </v-simple-table>
                     <v-divider></v-divider>
                      <div class="mt-8 headline">Tender Fees</div>
                     <v-simple-table>
                         <template v-slot:default>
                             <tbody>
                             <tr>
                                 <th>Bid Security</th>
                                 <td>{{notice.currency.name}}{{notice.bidsecurity}}</td>
                                 <td>
                                     <v-btn small rounded color="success" depressed @click="addItem('BIDBOND')">Add to Invoice</v-btn>
                                 </td>
                             </tr>
                              <tr v-if="spoc>0">
                                 <th>SPOC fee</th>
                                 <td>{{notice.currency.name}} {{spoc}}</td>
                                 <td>
                                     <v-btn small rounded color="success" depressed @click="addItem('SPOC')">Add to Invoice</v-btn>
                                 </td>
                             </tr>
                              <tr v-if="establishment >0">
                                 <th>Establishment Fee</th>
                                 <td>{{notice.currency.name}} {{establishment}}</td>
                                 <td>
                                     <v-btn small rounded color="success" depressed @click="addItem('ESTABISHMENT FEE')">Add to Invoice</v-btn>
                                 </td>
                             </tr>
                             </tbody>
                         </template>
                     </v-simple-table>




              
                    
                 </v-card-text>
             </v-card>
                </v-col>
            </v-row>
          </v-container>
       </userlayout>
</template>
<script>
import  userlayout  from '../../../Layouts/userlayout';
import Vue from 'vue'
export  default {
    props: ['errors','successMessage','errorMessage','notice','spoc','establishment','user'],
    components: {
        userlayout
    },
    data(){
        return{

        }
    },methods: {
       download(){
           var path  ='/'+this.notice.filename
           window.open(path)
       },addItem(type){
           var formdata ={type:type,id:this.notice.id}
           this.$inertia.post(this.$route('Mytenderfees.store'),formdata,{
               onSuccess:(page)=>{
                   if(this.successMessage){
                      Vue.swal({
                            title: this.successMessage,
                            text: "Do you wish to proceed to settling your invoice",
                            icon: 'warning',
                            showCancelButton: true,
                            cancelButtonText:'Add More Items',
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Proceed to Invoice'
                            }).then((result) => {
                            if (result.isConfirmed) {
                              window.location.href='/bidders/Tenderpayment'
                            }
                      })
                   }
                   if(this.errorMessage){
                         Vue.swal({
                            title: this.errorMessage,
                            text: "Do you wish to proceed to settling your invoice",
                            icon: 'erro',
                            showCancelButton: true,
                            cancelButtonText:'Add More Items',
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Proceed to Invoice'
                            }).then((result) => {
                            if (result.isConfirmed) {
                              window.location.href='/bidders/Tenderpayment'
                            }
                      })
                   }
               }
           })
       }
    }
}
</script>