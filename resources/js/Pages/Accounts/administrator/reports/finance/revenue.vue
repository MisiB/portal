<template>
       <userlayout title="Revenue">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn> <v-btn text link disabled>Revenue Reports</v-btn>
                    </div>
                </v-card-text>
            </v-card>   
            <v-card>
             <v-card-text>
                  <v-row>
                   <v-col>
                      <v-text-field v-model="form.fromdate" type="date" outlined label="Select From" :error-messages="errors.fromdate"></v-text-field>
                   </v-col>
                    <v-col>
                     <v-text-field v-model="form.todate" outlined label="Select To" type="date" :error-messages="errors.todate"></v-text-field>
                   </v-col>
                   <v-col>
                      <v-select v-model="form.status" outlined label="Select status" :items="statuslist" :error-messages="errors.status"></v-select>                    
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
                    <v-btn rounded depressed :href="$route('report-revenue-downloads.index')">Download View</v-btn>                
                 </v-card-title>
                 <v-divider/>
                <v-card-text>

                    <v-row>
                        <v-col>
                          <v-card class="blue white--text text-center">
                                <div class="headline">{{currency}}{{totalinvoiced}}</div>
                                <div>total invoiced</div>
                          </v-card>
                        </v-col>
                        <v-col>
                          <v-card class="green white--text text-center">
                                <div class="headline">{{currency}}{{totalreceipted}}</div>
                                <div>total receipted</div>
                          </v-card>
                        </v-col>
                         <v-col>
                          <v-card class="red white--text text-center">
                                <div class="headline">{{currency}}{{balance}}</div>
                                <div>Margin</div>
                          </v-card>
                        </v-col>

                        <v-col>
                             <v-card class="orange white--text text-center">
                                <div class="headline">{{totalregistered}}</div>
                                <div>total registered</div>
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
                                   <th>Total Invoiced</th>
                                   <th>Total Receipted</th>
                                   <th>Discrepency</th>
                                   <th>
                                      Categories
                                   </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="supplier in suppliers" :key="supplier.id" :class="rowClass(supplier)">
                                  <td>{{supplier.date | formatDate }}</td>
                                 <td>{{supplier.invoicenumber}}</td>
                                  <td>{{supplier.company}}</td>
                                  <td>{{supplier.currency}}{{supplier.totalinvoiced}}</td>
                                   <td>{{supplier.currency}}{{supplier.totalreceipted}}</td>
                                   <td>
                                       <div v-if="supplier.totalinvoiced > supplier.totalreceipted">
                                           Under Payment
                                       </div>
                                       <div v-if="supplier.totalinvoiced < supplier.totalreceipted">
                                           Over payment
                                       </div>
                                   </td>
                                   <td>
                                      {{supplier.categories}} 
                                   </td>
                                </tr>
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
    props: ['errors','successMessage','errorMessage','suppliers','currencylist','totalinvoiced','totalreceipted','totalregistered','currency','balance'],
    components: {
        userlayout
    },
    data(){
        return{
          statuslist:['PAID','AWAITING'],         
           form:this.$inertia.form({
               fromdate:'',
               todate:'',
               status:'',
               currency:''
           })
        }
    },methods: {
       search(){
           this.form.post(this.$route('revenuereport.index'))
       },
       rowClass(supplier){
           if(supplier.totalinvoiced > supplier.totalreceipted){
               return "red lighten-4"
           }
           if(supplier.totalinvoiced < supplier.totalreceipted){
               return "green lighten-4"
           }
       }
    }
}
</script>