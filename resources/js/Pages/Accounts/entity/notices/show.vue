<template>
       <userlayout title="Dashboard">
          <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                          <v-btn text link :href="$route('entity.home')" >Dashboard</v-btn> <v-btn text link :href="$route('procurementnotice.index')" >List</v-btn> <v-btn text link disabled>Show</v-btn>
                   </div>
                </v-card-text>
            </v-card> 
        
            <v-row class="mt-4">
                <v-col>              
             <v-card flat >
                 <v-card-title>
                     <div>Procurement Notice</div>
                     <v-spacer/>
                     <v-btn small rounded color="info" depressed @click="download">Download</v-btn>
                      <v-btn small rounded color="primary" v-if="notice.status=='PENDING'" depressed class="ml-2">Edit</v-btn>
                      <inertia-link v-if="notice.status=='PENDING'" class="ml-2 v-btn v-btn--has-bg v-btn--rounded theme--light v-size--small success" :href="$route('procurementnotice.edit',notice.id)">Publish</inertia-link>
                      <v-btn small rounded color="error" v-if="notice.status=='PENDING'" depressed class="ml-2">Delete</v-btn>
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
                                   <tr>
                                    <th>Procurement Type</th>
                                  <td>
                                      {{notice.procurementtype.name}}
                                  </td>
                                
                                </tr>
                                 <tr>
                                    <th>Client Type</th>
                                  <td>
                                      {{notice.noticetype}}
                                  </td>
                                
                                </tr>
                                  <tr>
                                    <th>Classification</th>
                                  <td>
                                      {{notice.classification.name}}
                                  </td>
                                
                                </tr>
                                  <tr>
                                    <th>Bid Value</th>
                                  <td>
                                      {{notice.currency.name}} {{notice.bidvalue}}
                                  </td>
                                
                                </tr>
                                 <tr>
                                    <th>Bid Security</th>
                                  <td>
                                      {{notice.currency.name}} {{notice.bidsecurity}}
                                  </td>
                                
                                </tr>
                                 <tr>
                                    <th>Calculated SPOC fee</th>
                                  <td>
                                      {{notice.currency.name}} {{spoc}}
                                  </td>
                                
                                </tr>
                                 <tr>
                                    <th>Calculated Establishment Fee</th>
                                  <td>
                                      {{notice.currency.name}} {{establishment}}
                                  </td>
                                
                                </tr>
                                   <tr>
                                    <th>Description</th>
                                  <td>
                                      {{notice.description}}
                                  </td>
                                
                                </tr>
                                   <tr>
                                    <th>Instructions</th>
                                  <td>
                                      {{notice.instructions}}
                                  </td>
                                
                                </tr>
                              
                              
                            
                            </tbody>
                        </template>
                     </v-simple-table>

                 
                      

                     <div class="headline mt-5 ml-2">Products/Services</div>

                     <v-simple-table>
                          <template v-slot:default>
                              
                                  <thead>
                                      <tr>
                                          <th>Product Name</th>
                                          <th>Quantity</th>
                                          <th>Required PRAZ Categories</th>
                                      </tr>
                                  </thead>
                              <tbody>
                                  <tr v-for="product in notice.products" :key="product.id">
                                    <td>{{product.name}}</td>
                                    <td>{{product.quantity}}</td>
                                    <td>
                                        <div v-for="cat in product.categories" :key="cat.id">
                                          <div>{{cat.category.name}}({{cat.category.code}})</div>
                                        </div>
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
import  userlayout  from '../../../Layouts/entityLayout';
export  default {
    props: ['errors','successMessage','errorMessage','notice','spoc','establishment'],
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
       }
    }
}
</script>