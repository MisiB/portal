<template>
       <welcomelayout title="Dashboard">
          <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                          <v-btn text link :href="$route('welcome')" >Dashboard</v-btn> <v-btn text link :href="$route('tenders')" >Procurement notices</v-btn> <v-btn text link disabled>Show</v-btn>
                   </div>
                </v-card-text>
            </v-card> 
        
            <v-row class="mt-4">
                <v-col>              
             <v-card flat >
                 <v-card-title>
                     <div>Procurement Notice</div>
                     <v-spacer/>
                     <v-btn small rounded color="info" depressed @click="download">Download SBD</v-btn>
                   </v-card-title>
                 
                 <v-card-text>               

                 <v-simple-table>
                        <template v-slot:default>
                          <tbody>
                            <tr><th>Title</th><td>{{notice.title}}</td></tr>  
                              <tr><th>Procurement Type</th><td>{{notice.procurementtype.name}}</td></tr>                           
                            <tr><th>Close Date</th><td>{{notice.close_date}} {{notice.close_time}}</td></tr>
                            <tr><td>{{notice.description}}</td></tr>                           
                          </tbody>
                        </template>
                 </v-simple-table>
                      

                    
                 </v-card-text>
             </v-card>
                </v-col>
            </v-row>
          </v-container>
       </welcomelayout>
</template>
<script>
import  welcomelayout  from '../Layouts/welcome';
export  default {
    props: ['errors','successMessage','errorMessage','notice','spoc','establishment'],
    components: {
        welcomelayout
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