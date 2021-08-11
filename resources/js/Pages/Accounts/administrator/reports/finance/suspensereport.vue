<template>
       <userlayout title="Revenue">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn> <v-btn text link disabled> Tender Revenue Reports</v-btn>
                    </div>
                </v-card-text>
            </v-card>   
                      
             <v-card flat class="mt-4">
                 <v-card-title>
                    <div class="display-1">Suspense Report</div>
                    <v-spacer/>
                    <export-excel :data="data"> <v-btn rounded depressed >Download View</v-btn></export-excel>
                                 
                 </v-card-title>
                 <v-divider/>
                <v-card-text>

                    <v-row v-if="summary.length>0">
                          <v-col v-for="smmr in summary " :key="smmr.fee" md="3">
                          <v-card class="blue white--text text-center">
                                <div class="headline">{{currency}}{{smmr.total}}</div>
                                <div>{{smmr.accountnumber}}</div>
                          </v-card>
                        </v-col>                       
                    </v-row>
                  
                                <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th>Company</th>
                                   <th>Account number</th>
                                   <th>Amount Deposited</th>
                                   <th>Utilized</th>
                                   <th>Balance</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="data.length >0">
                                <tr v-for="dt in data" :key="dt.id">
                                 <td>{{dt.company.name}}</td>
                                  <td>{{dt.accountnumber}}</td>
                                   <td>{{dt.amount}}</td>
                                  <td>{{dt.suspenseReceipts}}</td>
                                     <td>0</td>                                 
                                </tr>
                                </template>
                                <template v-else>
                                   <tr><td colspan="5" class="text-center red--text">No data found</td></tr>
                                </template>
                            </tbody>
                        </template>
                                </v-simple-table>
                            
                                   
                    
                </v-card-text>
             </v-card>
           

                
           </v-container>
       </userlayout>
</template>
<script>
import  userlayout  from '../../../../Layouts/administratorlayout';
import Vue from 'vue'

export  default {
    props: ['errors','successMessage','errorMessage','data','summary'],
    components: {
        userlayout
    },
    data(){
        return{
          statuslist:['ESTABLISHMENT FEE',''],         
           form:this.$inertia.form({
               from:'',
               to:'',
               type:'',
               currency:''
           })
        }
    },methods: {
       search(){
           this.form.post(this.$route('report-tender-revenue.store'))
       }
    
    }
}
</script>