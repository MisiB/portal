<template>
    <welcomelayout title="Suppliers">
         <v-card flat color="teal">
                <v-card-text>
                    <v-container>
                     <div class="d-flex">
                         <v-btn link text :href="$route('welcome')" class="white--text">Home</v-btn>
                         
                         <v-btn text>Supplier Categories</v-btn>
                     </div>
                     </v-container>

                </v-card-text>
            </v-card>
        <v-container>
          
           <v-card>
                 <v-card-title>
                     <div>Supplier Categories</div>
                         <v-spacer/>
                         <v-text-field
                            label="Filter Category list"
                            v-model="filter"
                            append-icon="mdi-magnify"
                        ></v-text-field>              
                </v-card-title>
                 
                 <v-card-text>
                     <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th>Category</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="categories.length>0">
                                <tr v-for="category in filterCategories" :key="category.id" >
                                  <td>
                                     <div> {{category.code}}</div>
                                     <div>{{category.name}}</div>

                                  </td>
                                  <td>
                                    <inertia-link class="v-btn v-btn--has-bg theme--light v-size--small primary" :href="$route('supplier',category.id)">View list</inertia-link>
                                                                       
                                  </td>
                                </tr>
                                </template>
                                <template v-else>
                                   <tr>
                                       <td colspan="3" class="pa-5 text-center red--text">No Categories found</td>
                                   </tr>
                                </template>
                            </tbody>
                        </template>
                     </v-simple-table>
                 </v-card-text>
        </v-card>
        </v-container>

    </welcomelayout>

</template>
<script>
import  welcomelayout  from '../Layouts/welcome'
export  default {
    props:['categories'],
    components:{
        welcomelayout
    },data() {
        return {
            filter:""
        }
    },computed:{
        filterCategories(){
               var categorylist = this.categories
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
