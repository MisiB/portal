<template>
       <userlayout title="Revenue">
           <v-container fluid>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn> <v-btn text link disabled>Bid Bond Report</v-btn>
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
                      <v-select v-model="form.currency" outlined label="Select Currency" :items="currencylist" item-text="name" item-value="name"  :error-messages="errors.status"></v-select>                    
                   </v-col>
                   <v-col>
                       <v-btn outlined rounded @click="search">Filter</v-btn>
                   </v-col>
                 </v-row> 
             </v-card-text>
            </v-card>            
             <v-card flat class="mt-4">
                 <v-card-title>
                    <div class="display-1">Bid Bond Report</div>
                    <v-spacer/>
                    <export-excel :data="data"> <v-btn rounded depressed >Download View</v-btn></export-excel>
                                 
                 </v-card-title>
                 <v-divider/>
                <v-card-text>
                      <v-row v-if="summary.length>0">
                          <v-col v-for="smmr in summary " :key="smmr.fee" md="3">
                          <v-card class="blue white--text text-center">
                                <div class="headline">{{smmr.total}}</div>
                                <div>{{smmr.status}}</div>
                          </v-card>
                        </v-col>
                        <v-spacer/>
                        <v-col md="2">
                            {{filter}}
                      <v-select v-model="filter" outlined label="Filer" :items="filterlist"></v-select> 
                        </v-col>                   
                
                    </v-row>
                   
                  
                                <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                  
                                   <th>Company</th>
                                   <th>Tender Number</th>
                                   <th>Entity</th>
                                   <th>Closing Date</th>
                                   <th>Validity Period</th>
                                   <th>Maturity Date</th>
                                   <th>Amount</th>
                                   <th>Refund Status</th>
                                   <th>Action</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="filterBidbonds.length >0">
                                  
                                <tr v-for="dt in filterBidbonds" :key="dt.id" :class="rowClass(dt.refund,dt.action)">
                               
                                <td>{{dt.company}}</td>
                                <td>{{dt.tendernumber}}</td>
                                <td>{{dt.entity}}</td>
                                <td>{{dt.tender_close_date}}</td>
                                <td>{{dt.validityperiod}}</td>
                                <td>{{dt.tender_maturity_date}}</td>
                                <td>{{dt.currency}}{{dt.amount}}</td>  
                                <td>{{dt.refund}}</td> 
                                <td>{{dt.action}}</td>
                                <td>
                                    <template v-if="dt.refund=='PENDING' && dt.action=='MATURED'">
                                   <requestrefund :bid="dt.id" :errors="errors"/>
                                    </template>
                                      <template v-if="dt.refund=='AWAITING' || dt.refund=='APPROVED' || dt.refund=='PROCESSED'">
                                        <requestrefundview :bid="dt" :errors="errors"/>
                                      </template>
                                </td>                               
                                </tr>
                               
                                </template>
                                <template v-else>
                                   <tr><td colspan="9" class="text-center red--text">No data found</td></tr>
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
import requestrefund from '../../../../../Components/bidbondrefund.vue'
import requestrefundview from '../../../../../Components/viewbidrefund.vue'
import Vue from 'vue'

export  default {
    props: ['errors','successMessage','errorMessage','data','currency','currencylist','summary'],
    components: {
        userlayout,
        requestrefund,
        requestrefundview
    },
    data(){
        return{   
            filter:"",
            filterlist:['MATURED','ALL'],    
           form:this.$inertia.form({
               from:'',
               to:'',
               currency:''
           })
        }
    },methods: {
       search(){
           this.form.post(this.$route('report-bidbond-revenue.store'))
       },
       rowClass(refund,matured){
          
           if(refund=="PENDING"  && matured=="MATURED"){
               return "red lighten-4"
           }else if(refund=="AWAITING"){
            return "blue lighten-4"
           }else{
                return "green lighten-4"
           }
       }
    },computed:{
        filterBidbonds(){
            var datalist = this.data
            if(this.filter =='MATURED')            {
                return datalist.filter(dt=>(!dt.action.toUpperCase().indexOf(this.filter.toUpperCase())))
            }else{
                return datalist
            }
        }
    }
}
</script>