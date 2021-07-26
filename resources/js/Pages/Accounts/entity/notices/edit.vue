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
                        <v-text-field
                            v-model="form.limit"
                            label="Participation Limit"
                            outlined
                            :error-messages="errors.limit"
                            >
                         </v-text-field>
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
                        <v-select
                            v-model="form.currency"
                            :items="currency"
                            item-text="name"
                            item-value="id"
                            label="Currency of trade"                            
                            outlined
                            :error-messages="errors.currency"
                            >
                        </v-select>
                        </v-col>
                        <v-col>
                           
                        <v-text-field
                            v-model="form.bidvalue"
                            label="Estimate Bid value"
                            outlined
                            :error-messages="errors.bidvalue"
                            >
                         </v-text-field>
                        </v-col>
                    </v-row>
                      <v-row>
                         <v-col>
                        <v-select
                            v-model="form.noticetype"
                            :items="clienttypes"
                            label="Notice type"                            
                            outlined
                            :error-messages="errors.noticetype"
                            >
                        </v-select>
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
                            v-model="bondcheck"
                            row
                            >
                            <v-radio
                                label="Yes we require Bid Security"
                                value="Y"
                            ></v-radio>
                            <v-radio
                                label="No we do not require Bid Security"
                                value="N"
                            ></v-radio>
                            </v-radio-group>
                        </v-col>
                      
                    </v-row>
                    <v-row  v-if="bondcheck=='Y'">
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
                            <v-select                        
                            v-model="form.classification"
                            label="Classification"
                            :items="classifications"
                            item-text="name"
                            item-value="id"
                            outlined
                            :error-messages="errors.classification"
                            >
                            </v-select>   
                        </v-col>
                        <v-col>
                             <v-file-input
                        show-size
                        counter
                        outlined
                        label="Attach SBD Document"
                         prepend-icon="mdi-paperclip"
                        accept=".pdf"
                        v-model="form.filename"
                        :error-messages="errors.filename"
                    >
                    </v-file-input>
                        </v-col>
                    </v-row>
                    <v-row>                     
                        <v-col>
                            <v-radio-group
                            v-model="sitevisitcheck"
                            row
                            >
                            <v-radio
                                label="Yes we require site visit"
                                value="Y"
                            ></v-radio>
                            <v-radio
                                label="No we do not require site visit"
                                value="N"
                            ></v-radio>
                            </v-radio-group>
                        </v-col>
                     
                    </v-row>
                    <v-row v-if="sitevisitcheck=='Y'">                     
                        <v-col>
                            <v-text-field
                            v-model="form.sitevisitlocation"
                            label="Site visit location"
                            outlined
                            :error-messages="errors.sitevisitlocation"
                            >
                         </v-text-field>
                        </v-col>
                        <v-col>
                             <v-text-field
                            v-model="form.site_visit_date"
                            label="Site Visit Date"
                            type="date"
                            outlined
                            :error-messages="errors.site_visit_date"
                            >
                         </v-text-field>
                        </v-col>
                        <v-col>
                             <v-text-field
                            v-model="form.site_visit_time"
                            label="Site Visit Time"
                            type="time"
                            outlined
                            :error-messages="errors.site_visit_time"
                            >
                         </v-text-field> 
                        </v-col>
                    </v-row>
                    <v-row>
                        <v-col>
                            <v-textarea
                            v-model="form.instructions"
                            label="Response Instructions"
                            outlined
                            :error-messages="errors.instructions"
                            >

                            </v-textarea>
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
                    <v-row>
                        <v-col>
                            <v-card>
                                <v-card-title class="blue lighten-3">
                                    <div>Product/Service Required</div>
                                     <v-spacer/>
                                        <v-btn
                                        class="mx-2"
                                        fab
                                        dark
                                        depressed
                                        color="indigo"
                                        @click="addModel=true"
                                        >
                                        <v-icon dark>
                                            mdi-plus
                                        </v-icon>
                                        </v-btn>
                                </v-card-title>
                                <v-card-text>
                                   <v-simple-table>
                                        <template v-slot:default>
                                            <thead>
                                                <tr>
                                                <th>Product</th>
                                                <th>Quantity</th>
                                                <th>Categories</th>
                                                <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <template v-if="productlist.length > 0">
                                                   <tr v-for="(product,key) in productlist" :key="key">
                                                       <td>
                                                           {{product.name}}
                                                       </td>
                                                       <td>
                                                           {{product.quantity}}
                                                       </td>
                                                       <td>
                                                           <div v-if="product.categories.length >0">
                                                               <div v-for="cat in product.categories" :key="cat.id">
                                                                   {{cat.name}}
                                                               </div>                                                          
                                                           </div>
                                                       </td>
                                                       <td>
                                                           <v-btn
                                                            fab
                                                            dark
                                                            depressed
                                                            color="error"
                                                            @click="deleteProduct(key)"
                                                            >
                                                            <v-icon dark>
                                                                mdi-delete
                                                            </v-icon>
                                                            </v-btn>  
                                                       </td>
                                                   </tr>
                                                </template>
                                                <template v-else>
                                                     <tr>
                                                         <td colspan="4" class="text-center red--text pa-5"> No Products Added As Yet</td>
                                                     </tr>
                                                </template>
                                            </tbody>
                                        </template>
                                   </v-simple-table>
                                </v-card-text>
                            </v-card>
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
            <v-dialog v-model="addModel" max-width="600">
                <v-card>
                    <v-card-title>
                        <div>Add Product</div>
                        <v-spacer/>
                        <v-btn icon @click="addModel=false">
                            <v-icon>mdi-close</v-icon>
                        </v-btn>
                    </v-card-title>
                    <v-card-text>
                              <v-text-field
                            v-model="name"
                            label="Product Name"
                            outlined
                            >
                         </v-text-field>
                          <v-text-field
                            v-model="quantity"
                            label="Quantity"
                            outlined
                            type="number"
                            >
                         </v-text-field>
                          <v-combobox
                        v-model="select"
                        :items="categories"
                        item-value="id"
                        item-text="name"
                        label="Select Categories"
                        multiple
                        chips
                        ></v-combobox>
                    </v-card-text>
                    <v-card-actions>
                        <v-btn small color="error" @click="addModel=false">Cancel</v-btn>
                        <v-spacer/>
                        <v-btn small color="success" @click="addProduct" :loading="form.processing" :disabled="form.processing">Submit</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
          </v-container>
       </userlayout>
</template>
<script>
import  userlayout  from '../../../Layouts/entityLayout';
import Vue from 'vue'
export  default {
    props: ['errors','successMessage','errorMessage','currency','procurementtypes','categories','classifications','notice'],
    components: {
        userlayout
    },
    data(){
        return{
         form:this.$inertia.form({
             id:this.notice.id,
             title:this.notice.title,
             limit:this.notice.limit,
             close_date:this.notice.close_date,
             close_time:this.notice.close_time,
             currency:this.notice.currency_id,
             bidvalue:this.notice.bidvalue,
             noticetype:this.notice.noticetype,
             procurementtype:this.notice.procurementtype_id,
             bidsecurity:this.notice.bidsecurity,
             validityperiod:this.notice.validityperiod,
             sitevisitlocation:this.notice.site_visit_location,
             site_visit_date:this.notice.site_visit_date,
             site_visit_time:this.notice.site_visit_time,
             instructions:this.notice.instructions,
             description:this.notice.description,
             classification:this.notice.classification_id,
             filename:this.notice.filename,
             products:[]

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
        addProduct(){
             this.productlist.push({name:this.name,quantity:this.quantity,categories:this.select});
             this.name=""
             this.quantity=""
             this.select=""
             this.addModel=false
        },deleteProduct(key){
            this.productlist.splice(1,key)
        },submit(){
            this.form.products = this.productlist;
            this.form.put(this.$route('procurementnotice.update',this.notice.id),{

            })
        }
    }
}
</script>