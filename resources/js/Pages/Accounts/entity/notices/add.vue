<template>
       <userlayout title="Dashboard">
          <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('entity.home')" >Dashboard</v-btn> <v-btn text link :href="$route('procurementnotice.index')" >List</v-btn> <v-btn text link disabled>New</v-btn>
                    </div>
                </v-card-text>
            </v-card> 

   <v-row class="mt-4">
                <v-col>              
             <v-card flat >
                 <v-card-title>
                     <div>New Procurement Notice</div>
                 
                     </v-card-title>
                 
                 <v-card-text>
                        <v-row>
                        <v-col>
                        <v-text-field
                            v-model="form.title"
                            label="Title"
                            outlined
                            :error-messages="errors.title"
                            >
                         </v-text-field>
                        </v-col>
                          <v-col>
                        <v-select
                            v-model="form.procurementtype"
                            :items="procurementtypes"
                            item-text="name"
                            item-value="id"
                            label="Procurement type"                            
                            outlined
                            :error-messages="errors.procurementtype"
                            >
                        </v-select>
                        </v-col>
                        </v-row>
                          <v-row v-if="form.procurementtype=='2'">                     
                        <v-col>
                            <v-radio-group
                            v-model="require_bid_bond"
                            row
                            >
                            <v-radio
                                label="Yes we require Bid Bond"
                                value="Y"
                            ></v-radio>
                            <v-radio
                                label="No we do not require Bid Bond"
                                value="N"
                            ></v-radio>
                            </v-radio-group>
                        </v-col>
                     
                    </v-row>
                         
                                 <v-row  v-if="require_bid_bond=='Y'">
                                        <v-col>
                        <v-select
                            v-model="form.currency"
                            :items="currency"
                            item-text="name"
                            item-value="id"
                            label="Currency"                            
                            outlined
                            :error-messages="errors.currency"
                            >
                        </v-select>
                        </v-col>
                        <v-col>                           
                            <v-text-field                         
                            v-model="form.bidsecurity"
                            label="Bid Security Value"
                            outlined
                            :error-messages="errors.bidsecurity"
                            >
                         </v-text-field>                      
                       </v-col>
                         <v-col>                           
                            <v-select                        
                            v-model="form.validityperiod"
                            label="Bid Validity Period (days)"
                            :items="periodlist"
                            outlined
                            :error-messages="errors.validityperiod"
                            >
                            </v-select>                      
                       </v-col>
                    </v-row>
                       <v-row>
                         <v-col>
                        <v-text-field
                            v-model="form.close_date"
                            label="Closing Date"
                            type="date"
                            outlined
                            :error-messages="errors.close_date"
                            >
                         </v-text-field>
                        </v-col>
                         <v-col>
                        <v-text-field
                            v-model="form.close_time"
                            label="Closing time"
                            type="time"
                            outlined
                            :error-messages="errors.close_time"
                            >
                         </v-text-field>
                        </v-col>
             </v-row>
               <v-row>
                     <v-col>
                            <v-text-field
                            v-model="form.tendernumber"
                            label="Reference number"
                            outlined
                            :error-messages="errors.tendernumber"
                            >
                         </v-text-field>
                     </v-col>
                          <v-col>
                             <v-file-input
                        show-size
                        counter
                        label="Attach SBD Document"
                        accept=".pdf"
                        v-model="form.filename"
                        :error-messages="errors.filename"
                    >
                    </v-file-input>
                        </v-col>
                    </v-row>
                 <v-row>
                        <v-col>
                            <v-textarea
                            v-model="form.description"
                            label="Procurement Notice Description"
                            outlined
                            :error-messages="errors.description"
                            >
                            </v-textarea>
                        </v-col>
                    </v-row>
                  
                 </v-card-text>
                  <v-card-actions>
                     <v-btn color="error" rounded depressed :href="$route('procurementnotice.index')">Cancel</v-btn>
                     <v-spacer/>
                     <v-btn color="success" rounded depressed @click="submit">Submit</v-btn>
                 </v-card-actions>
             </v-card>
        
                </v-col>
           </v-row>
          
          </v-container>
       </userlayout>
    </template>
    <script>
import  userlayout  from '../../../Layouts/entityLayout';
import Vue from 'vue'
export  default {
    props: ['errors','successMessage','errorMessage','currency','procurementtypes','categories','classifications'],
    components: {
        userlayout
    },
    data(){
        return{
            require_bid_bond:false,
         form:this.$inertia.form({
             title:'',
             close_date:'',
             close_time:'',
             procurementtype:'',
             description:'',
             filename:null,
             bidsecurity:'',
             alidityperiod:'',
             currency:'',
             tendernumber:''


         }),
         clienttypes:['Domestic','International'],
         periodlist:['30','60','90'],
         bondcheck:'',
         sitevisitcheck:'',
         productlist:[],
         addModel:false,
         name:'',
         quantity:'',
         select:''

        }
    },methods: {
        submit(){
            this.form.post(this.$route('procurementnotice.store'),{

            })
        }
    }
}
</script>