<template>
       <userlayout title="Invoices Awaiting">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn> <v-btn text link disabled>Invoices Awaiting Verification</v-btn>
                    </div>
                </v-card-text>
            </v-card>               
             <v-card flat class="mt-4">
                 <v-card-title>
                      <v-text-field
                            v-model="filter"
                            placeholder="Search"
                            dense
                            outlined
                            >
                         </v-text-field>                    
                 </v-card-title>
                 <v-divider/> 
                <v-card-text>
                    <v-tabs 
                    v-model="tab"
                       background-color="deep-purple accent-4"
                       dark
                        icons-and-text
                    >
                    <v-tab>
                        <v-badge :content="supplierComputed.length"> Supplier Invoices
                        </v-badge>
                    </v-tab>
                    </v-tabs>
                    <v-tabs-items v-model="tab">
                        <v-tab-item>
                    <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                     <th>Year</th>
                                     <th>Invoice number</th>
                                     <th>Company</th>
                                     <th>Total Invoices</th>
                                     <th>Total Receipted</th>
                                     <th>Balance</th>
                                     <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="supplier in supplierComputed" :key="supplier.id">
                                    <td>
                                        {{supplier.date}}
                                    </td>
                                    <td>
                                        {{supplier.year}}
                                    </td>
                                    <td>
                                        {{supplier.invoice_number}}
                                    </td>
                                    <td>
                                     {{supplier.company}}                                     

                                    </td>
                                     <td class="blue--text">
                                     {{supplier.currency}}{{supplier.total_invoiced}}                                   

                                    </td>
                                     <td class="green--text">
                                      {{supplier.currency}}{{supplier.total_receipted}}                                 

                                    </td>
                                    <td class="red--text">
                                      {{supplier.currency}}{{supplier.balance}}
                                    </td>
                                    <td>
                                        <v-btn small depressed color="primary" :href="$route('awaitingsupplierinvoices.show',supplier.invoice_number)">View</v-btn>                                         
                                    </td>
                                </tr>
                            </tbody>
                        </template>
                    </v-simple-table>
                        </v-tab-item>
                         
                    </v-tabs-items>
                    
                </v-card-text>
           
             </v-card>
            
               

                
           </v-container>
       </userlayout>
</template>
<script>
import  userlayout  from '../../../Layouts/administratorlayout';

export  default {
    props: ['errors','successMessage','errorMessage','supplierinvoices'],
    components: {
        userlayout
    },data(){
        return{
            tab:null,
            filter:''
        }
    },computed:{
        supplierComputed(){
            var supplierinvoices = this.supplierinvoices
            if(this.filter !='')
            {
                return supplierinvoices.filter(supplierinvoice=>(!supplierinvoice.company.toUpperCase().indexOf(this.filter.toUpperCase())))
            }else{
                return supplierinvoices
            }
        }
    }
}
</script>