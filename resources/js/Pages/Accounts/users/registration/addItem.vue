<template>
    <userlayout title="Add Item">
        <v-container>
            <v-alert
                border="top"
                color="red lighten-2"
                dark
                v-if="errorMessage"
            >
                {{errorMessage}}
            </v-alert>
            <v-alert
                border="top"
                color="green lighten-2"
                dark
                v-if="successMessage"
            >
                {{successMessage}}
            </v-alert>
            <v-stepper alt-labels>
                <v-stepper-header>
                    <v-stepper-step
                        step="1"
                        complete
                        complete-icon="mdi-check"
                    >
                        <small>Document Upload</small>
                    </v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step
                        step="2"

                    >
                        <small>Invoicing</small>
                    </v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step
                        step="3"
                    >
                        <small> Payment</small>
                    </v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step step="4">
                        <small>Finish</small>
                    </v-stepper-step>
                </v-stepper-header>
            </v-stepper>

            <v-card class="mt-5">
                <v-card-title>
                        <small>
                    Search for a category that best suits the services/products you provide
                        </small>
                    <v-spacer></v-spacer>
                    <inertia-link class="white--text v-btn v-btn--has-bg v-btn--rounded theme--light v-size--small red" :href="$route('Invoicing.index')">Back</inertia-link>

                </v-card-title>
               <v-divider></v-divider>
                <v-card-text>
                    <v-text-field
                        outlined
                        v-model="filter"
                        label="Search"
                        prepend-inner-icon="mdi-magnify"
                    ></v-text-field>
                     <div v-for="cat in filterCategories" :key="cat.id">
                    <v-row class="pa-3">
                        <v-col cols="12" sm="8">
                            <div><small>{{cat.name}}</small></div>
                            <div class="black--text">{{cat.code}}</div>
                        </v-col>
                        <v-col cols="6" sm="2">
                            <div>{{cat.section.name}}</div>
                        </v-col>
                        <v-col cols="6" sm="2">
                            <v-btn rounded small color="green" class="white--text" depressed @click="pickCategory(cat)">Select</v-btn>
                        </v-col>
                    </v-row>
                         <v-divider></v-divider>
                     </div>

                </v-card-text>

            </v-card>

        </v-container>

        <v-dialog v-model="selectCategory" max-width="500">
            <v-form ref="form" v-model="form" lazy-validation>
            <v-card>
                <v-card-title class="blue white--text">
                    Confirm Category Selection
                </v-card-title>
             <v-card-text>

                  <div class="title mt-5 mb-5">{{cat.name}} <b>({{cat.code}})</b></div>
                 <h5 class="mt-3">Select Parameters</h5>

                     <v-select
                         v-model="currency"
                         :items="currencylist"
                         item-value="id"
                         item-text="name"
                         outlined
                         :rules="currencyRules"
                         label="Select Currency"
                     >
                     </v-select>
                     <v-select
                         v-model="year"
                         :items="regyears"
                         item-text="year"
                         item-value="year"
                         outlined
                         :rules="yearRules"
                         label="Select Year"
                     >
                     </v-select> 

                       <v-select
                         v-model="option"
                         :items="period"
                         item-text="name"
                         item-value="value"
                         outlined
                         :rules="optionRules"
                         label="Settlement Options"
                     >
                     </v-select>
             </v-card-text>

                <v-card-actions>
                   <v-btn rounded outlined color="red">Cancel</v-btn>
                    <v-spacer/>
                    <v-btn rounded outlined color="green" @click="selectParameters">Submit</v-btn>
                </v-card-actions>
            </v-card>
            </v-form>

        </v-dialog>

        <v-dialog v-model="confirmRegistration" width="600">
            <v-card>
            <v-app-bar class="red lighten-2 white--text">               
                <v-app-bar-title>Registration Warning</v-app-bar-title>
            </v-app-bar>
                <v-card-text class="pa-3 text-center">
                  <div>
                      <template v-if="option =='ONCE-OFF'">
                      You about to register category  <b>{{cat.name}}({{cat.code}})</b> which will be valid from 1 January {{year}} to 31 December {{year}}
                      </template>
                      <template v-else>
                          <div>Category:<b>{{cat.name}}({{cat.code}})</b></div> 
                          <div>Settlement Option:<b>{{cat.name}}({{cat.code}})</b></div>
                            <div>Please Note this registration  will be valid from 1 January {{year}} to 31 March {{year}}</div>
                            <p></p>
     
                      </template>
                    </div>
                </v-card-text>
                <v-card-actions>
                    <v-btn outlined rounded color="red" @click="confirmRegistration=false">Cancel</v-btn>
                    <v-spacer></v-spacer>
                    <v-btn outlined rounded color="green" @click="proceed">Continue</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
        </userlayout>
</template>
<script>
import  userlayout  from '../../../Layouts/userlayout';
export  default {
    props: ['errors','successMessage','errorMessage','categorylist','regyears','currencylist'],
    components: {
        userlayout
    },
    data(){
        return {
           filter:'',
            selectCategory:false,
            cat:{},
            currencyRules:[v => !!v || 'Select Preferred Currency'],
            yearRules:[v => !!v || 'Select Registration Year'],
            optionRules:[v => !!v || 'Select Settlement Option'],
            currency:'',
            year:'',
            option:'',
            confirmRegistration:false,
            loading:false,
            form:true,
            period:[
                {name:'ONCE-OFF SETTLEMENT' , value:'ONCE-OFF'},
                {name:'QUARTERLY INSTALLMENT' , value:'QUARTERLY'}
                ]
        }
    },methods:{
        pickCategory(cat){
            this.cat = cat
            this.selectCategory=true
        },
        selectParameters(){
             if(this.$refs.form.validate()){
                 this.confirmRegistration = true
             }
        },
        proceed(){
            var data = {category:this.cat.id,year:this.year,currency:this.currency,option:this.option}
            this.loading = true
            this.$inertia.post('/bidders/Invoicing',data).then(()=>{
               this.loading = false
                this.selectCategory=false
                this.confirmRegistration=false
            })
        }
    },computed:{
        filterCategories(){
            var categorylist = this.categorylist
            if(this.filter !='')
            {
                return categorylist.filter(category=>(!category.name.toUpperCase().indexOf(this.filter.toUpperCase())||!category.code.toUpperCase().indexOf(this.filter.toUpperCase())))
            }else{
                return categorylist
            }
        }
    }
}
</script>
