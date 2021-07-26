<template>
    <welcomelayout title="Suppliers">
         <v-card flat color="teal">
                <v-card-text>
                    <v-container>
                     <div class="d-flex">
                         <v-btn link text :href="$route('welcome')" class="white--text">Home</v-btn>
                         <v-btn link text :href="$route('suppliers')" class="white--text">Category List</v-btn>
                         <v-btn text>Registered Suppliers</v-btn>
                     </div>
                     </v-container>

                </v-card-text>
            </v-card>
        <v-container>
          
           <v-card>
                 <v-card-title>
                     <div>Supplier List</div>
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
                                    <th>Name</th>
                                    <th>City</th>
                                   <th>Country</th>
                                    <th>address</th>
                                    <th>Emails</th>
                                    <th>Phones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="suppliers.length>0">
                                <tr v-for="supplier in filterSuppliers" :key="supplier.id" >
                                  <td>
                                     {{supplier.name}}
                                  </td>
                                    <td>
                                     {{supplier.city}}
                                  </td>
                                  <td>
                                     {{supplier.country}}
                                  </td>
                                  <td>
                                     {{supplier.address}}
                                  </td>
                                  <td>
                                     {{supplier.emails}}
                                  </td>
                                  <td>
                                     {{supplier.phones}}
                                  </td>

                                 
                                </tr>
                                </template>
                                <template v-else>
                                   <tr>
                                       <td colspan="6" class="pa-5 text-center red--text">No Registered Supplier Found for the selected Category</td>
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
    props:['suppliers'],
    components:{
        welcomelayout
    },data() {
        return {
            filter:""
        }
    },computed:{
        filterSuppliers(){
           var suppliers = this.suppliers
            if(this.filter !='')
            {
                return suppliers.filter(supplier=>(!supplier.name.toUpperCase().indexOf(this.filter.toUpperCase())))
            }else{
                return suppliers
            }
        }
    }
}
</script>
