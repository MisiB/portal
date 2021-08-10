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
            <v-card>
             <v-card-text>
                  <v-row>
                   <v-col>
                      <v-text-field v-model="form.from" type="date" outlined label="Select From" :error-messages="errors.fromdate"></v-text-field>
                   </v-col>
                    <v-col>
                     <v-text-field v-model="form.to" outlined label="Select To" type="date" :error-messages="errors.todate"></v-text-field>
                   </v-col>
                    <v-col>
                      <v-select v-model="form.currency" outlined label="Select Currency" :items="currencylist" item-text="name" item-value="id"  :error-messages="errors.status"></v-select>                    
                   </v-col>
                   <v-col>
                       <v-btn outlined rounded @click="search">Filter</v-btn>
                   </v-col>
                 </v-row> 
             </v-card-text>
            </v-card>            
             <v-card flat class="mt-4">
                 <v-card-title>
                    <div class="display-1">Revenue Report</div>
                    <v-spacer/>
                    <export-excel :data="formated"> <v-btn rounded depressed >Download View</v-btn></export-excel>
                                 
                 </v-card-title>
                 <v-divider/>
                <v-card-text>

                    <v-row v-if="summary.length>0">
                          <v-col v-for="smmr in summary " :key="smmr.fee" md="3">
                          <v-card class="blue white--text text-center">
                                <div class="headline">{{currency}}{{smmr.total}}</div>
                                <div>{{smmr.fee}}</div>
                          </v-card>
                        </v-col>
                        <v-col md="3">
                          <v-card class="blue white--text text-center">
                                <div class="headline">{{currency}}{{total}}</div>
                                <div>total Revenue</div>
                          </v-card>
                        </v-col>
                    </v-row>
                  
                                <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                   <th>Invoice number</th>
                                   <th>Company</th>
                                   <th>Description</th>
                                   <th>Entity</th>
                                   <th>Tender Number</th>
                                   <th>
                                      Amount
                                   </th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="data.length >0">
                                <tr v-for="dt in data" :key="dt.id">
                                  <td>{{dt.updated_at | formatDate }}</td>
                                 <td>{{dt.invoice_number}}</td>
                                  <td>{{dt.company.regnumber}}</td>
                                   <td>{{dt.description}}</td>
                                  <td>{{dt.entity.name}}</td>
                                     <td>{{dt.tendernumber}}</td>
                                  <td>{{dt.currency.name}}{{dt.amount}}</td>                                 
                                </tr>
                                </template>
                                <template v-else>
                                   <tr><td colspan="6" class="text-center red--text">No data found</td></tr>
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
    props: ['errors','successMessage','errorMessage','data','currency','currencylist','total','tenderfees','summary','formated'],
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