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
                     <div>Procurement Notice</div>
                     <v-spacer/>
                     <v-btn small rounded color="info" depressed @click="download">Download</v-btn>
                     <v-btn small rounded color="success"  class="ml-2" :href="$route('TenderFees.create')">Pay Tender Fees</v-btn>
                 </v-card-title>
                 
                 <v-card-text>
                           <v-simple-table>
                        <template v-slot:default>
                          <tbody>
                            <tr><td>{{notice.title}}</td></tr> 
                            <tr><td>{{notice.tendernumber}}</td></tr>  
                             <tr><td>{{notice.entity.name}}</td></tr> 
                              <tr><td>{{notice.procurementtype.name}}</td></tr>                           
                            <tr><td>{{notice.close_date}} {{notice.close_time}}</td></tr>
                            <tr><td>{{notice.description}}</td></tr>                           
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
       }
    }
}
</script>