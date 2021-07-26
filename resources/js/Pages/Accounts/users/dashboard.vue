<template>
    <userlayout title="Dashboard">
     
     <v-container>
          <v-alert
            dense
            text
            type="success"
            v-if="successMessage"
        >
            {{successMessage}}
        </v-alert>
        <v-alert
            dense
            text
            type="error"
            v-if="errorMessage"
        >
            {{errorMessage}}
        </v-alert>
          <v-card flat class="grey lighten-4 mb-4">
          <v-card-text>
            <v-layout wrap class="pa-3">
                <v-flex sm12 md9>
                    <div class="display-1 black--text">{{data.company.name}}</div>
                    <div class="d-flex"><div class="title">{{data.company.regnumber}}</div><div :class="`title ml-3 ${data.company.status}`">{{data.company.status}}</div></div>
                </v-flex>
                <v-flex sm12 md3>
                    <inertia-link class="v-btn v-btn--block v-btn--has-bg theme--light v-size--default primary" :href="$route('documents.index')">SUPPLIER REGISTRATION</inertia-link>
                     <inertia-link :href="$route('Mytenders.index')" class="mt-2 v-btn v-btn--block v-btn--has-bg theme--light v-size--default success">TENDER MANAGAMENT</inertia-link>
                   </v-flex>
            </v-layout>
          </v-card-text>
      </v-card>
       
        <v-row>
            <v-col cols="6" md="3">
                <v-card flat>
                    <v-card-text class="d-flex">
                        <div class="pb-2 pt-2">
                            <v-icon x-large>mdi-wallet</v-icon>
                        </div>
                        <v-spacer/>
                        <div>
                        <div :class="leadClass">
                            <div class="mr-2">ZWL</div><div>{{data.zwl_nonrefundable_balance}}</div>
                        </div>
                        <div>Nonrefundable wallet</div>
                        </div>
                    </v-card-text>
                </v-card>
            </v-col>
             <v-col cols="6" md="3">
                <v-card flat>
                    <v-card-text class="d-flex">
                         <div class="pt-2 pb-2">
                            <v-icon x-large>mdi-wallet</v-icon>
                        </div>
                        <v-spacer/>
                        <div>
                          <div :class="leadClass">
                            <div class="mr-2">USD</div><div>{{data.usd_nonrefundable_balance}}</div>
                        </div>
                         <div>Nonrefundable wallet</div>
                        </div>
                    </v-card-text>
                </v-card>
            </v-col>
             <v-col cols="6" md="3">
                <v-card flat>
                    <v-card-text class="d-flex">
                         <div class="pt-2 pb-2">
                            <v-icon x-large>mdi-wallet</v-icon>
                        </div>
                        <v-spacer/>
                        <div>
                          <div :class="leadClass">
                            <div class="mr-2">ZWL</div><div>{{data.zwl_refundable_balance}}</div>
                        </div>
                        <div>Refundable wallet</div>
                        </div>
                    </v-card-text>
                </v-card>
            </v-col>
             <v-col cols="6" md="3">
                <v-card flat>
                 <v-card-text class="d-flex">
                         <div class="pa-2">
                            <v-icon x-large>mdi-wallet</v-icon>
                        </div>
                        <v-spacer/>
                        <div>
                          <div :class="leadClass">
                            <div class="mr-2">USD</div><div>{{data.usd_refundable_balance}}</div>
                        </div>
                        <div class="text-sm">Refundable Wallet</div>
                        </div>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
       
         <v-row>
             <v-col cols="12">
              
           
         <v-card class="mt-3" outlined elevation="0">
             <v-toolbar color="blue lighten-2" dark flat>
                 <v-toolbar-title> Registered Categories</v-toolbar-title>
             </v-toolbar>
             <v-card-text>
                 <div v-if="data.registrations.length > 0">
                     <div v-for="reg in data.registrations" :key="reg.id">
               <v-row class="pt-3 pb-3 border-b" >
                   <v-col cols="12" md="7">
                       <div>{{reg.category.name}}</div>
                       <div class="black--text">{{reg.category.code}}</div>
                   </v-col>
                   <v-col sm="6" md="3">
                       <div class="d-flex">
                           <div>
                                <div><small>{{reg.expire_year}}</small></div>
                               <div :class="`${reg.status}`">
                                   {{reg.status}}
                               </div>
                              
                           </div>
                           <div>
                               <div v-if="reg.status =='PENDING'">
                                   <v-tooltip top>
                                       <template v-slot:activator="{ on, attrs }">
                                           <v-btn
                                               icon
                                               v-bind="attrs"
                                               v-on="on"
                                           >
                                               <v-icon color="blue lighten-1">
                                                   mdi-information
                                               </v-icon>
                                           </v-btn>
                                       </template>
                                       <span>Your account Documents are in the process of being verified you will be notified via email</span>
                                   </v-tooltip>
                               </div>
                           </div>
                       </div>
                   </v-col>
                   <v-col sm="6" md="2">
                       <div v-if="reg.status=='APPROVED'"><v-btn  rounded  block x-small link  :href="$route('supplierCertificates.show',reg.uuid)" class="success">Download</v-btn></div>
                        <div v-if="reg.printed == 0"><v-btn x-small rounded block outlined color="change" class="mt-1" @click="changeCategory(reg.id)">Change Category</v-btn></div>
                   </v-col>
                    
               </v-row>
                <v-divider/>
                     </div>
                   
                 </div> 
                 <div v-else>
                     <div class="pa-5 red lighten-4 red--text text-center">
                        <div> No registrations found  for the current year </div>
                        <div><inertia-link class="v-btn v-btn--is-elevated v-btn--has-bg v-btn--rounded theme--light v-size--small primary" :href="$route('documents.index')">Register Now</inertia-link></div>
                     </div>
                </div>        
            
             </v-card-text>
         </v-card>
             </v-col>
           
         </v-row>
         <v-dialog v-model="changeModel" max-width="600">
             <v-card>
                 <v-card-title><div>Category Change</div><v-spacer></v-spacer><v-btn small icon @click="changeModel=false"><v-icon>mdi-close</v-icon></v-btn></v-card-title>
                  <v-card-text>
                    <div><v-text-field outlined label="Search" v-model="filter"></v-text-field></div>
                    <div class="pa-3" v-for="cat in filterCategories" :key="cat.id">
                        <v-row>
                            <v-col cols="10">
                                <div>{{cat.name}}</div>
                                <div><small>{{cat.code}}</small></div>
                            </v-col>
                            <v-col cols="2">
                               <v-btn rounded color="primary" depressed small :loading="loading" :disabled="loading" @click="chooseCategory(cat.id)">choose</v-btn>
                            </v-col>
                        </v-row>
                        <v-divider/>
                    </div>
                  </v-card-text>
             </v-card>
         </v-dialog>

         <v-dialog v-model="awaitingModel" max-width="600">
                
                      <v-card outlined elevation="0">
                        <v-toolbar color="red lighten-2" dark flat>
                            <v-toolbar-title>Invoices Awaiting Verification</v-toolbar-title>
                            <v-spacer/>
                            <v-btn icon @click="awaitingModel=false"><v-icon>mdi-close</v-icon></v-btn>
                        </v-toolbar>
                          <v-card-text>
                              <div class="red--text pl-1 pr-1 pt-5 pb-5">
                                  You have invoices with bank payments awaiting verification, This means the bank reference numbers you entered was not found. We will attempt to locate your payment manually however this might take time. You can quicken the payment verification process by asking for the correct reference number from your bank and manually input it by clicking the verify button
                              </div>
                              <div class="text-center" >                                
                               
                                          <v-btn rounded outlined color="primary" link :href="$route('awaiting.index')">View Invoices</v-btn>
                                  
                              </div>
                   
                          </v-card-text>
                      </v-card>
               
         </v-dialog>

     </v-container>
    </userlayout>
</template>
<script>
import  userlayout  from '../../Layouts/userlayout';
import bankDetails from "../../../Components/bankDetails";
export  default {
    props: ['errors','successMessage','errorMessage','data'],
    components: {
        userlayout,
        bankDetails
    },
    data(){
        return{
            selected: [2],
            items: [
                {
                    action: '15 min',
                    headline: 'Brunch this weekend?',
                    subtitle: `I'll be in your neighborhood doing errands this weekend. Do you want to hang out?`,
                    title: 'Ali Connors',
                }

            ],
            changeModel:false,
            awaitingModel:false,
            filter:'',
            reg_id:'',
            loading:false

        }
    },methods: {
          changeCategory(id){
              this.reg_id = id
              this.changeModel = true
          },
          chooseCategory(id){
           var data ={category_id:id,registration_id:this.reg_id}
           this.loading = true

           this.$inertia.post('/bidders/changeCategory',data).then(()=>{
               this.loading = false
               this.changeModel = false
           })
          },checkAwaiting(){
               console.log(this.countAwaiting)
              if(this.countAwaiting >0){
                  this.awaitingModel=true
              }
          }
    },computed:{
        filterCategories(){
            var categorylist = this.data.categorylist
            if(this.filter !='')
            {
                return categorylist.filter(category=>(!category.name.toUpperCase().indexOf(this.filter.toUpperCase())||!category.code.toUpperCase().indexOf(this.filter.toUpperCase())))
            }else{
                return categorylist
            }
        },
         leadClass(){
            switch (this.$vuetify.breakpoint.name)
                {
                case 'xs': return 'd-flex subtitle-1'
                case 'sm': return 'd-flex subtitle-1'
                case 'md': return 'd-flex subtitle-1'
                case 'lg': return 'd-flex headline'
                case 'xl': return  'd-flex body-1'
                }
         },countAwaiting(){
             return this.data.awaiting.cost
         }
    },mounted(){
        this.checkAwaiting()
    }
}
</script>
<style scoped>
.ACTIVE{
    color: #00C853;
}
.BARRED{
    color: red;
}
.PENDING{
    color: orange;
}
.APPROVED{
    color: green;
}
</style>
