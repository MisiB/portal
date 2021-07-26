<template>
       <userlayout title="Rtgs">
           <v-container>
            <v-card flat>
                <v-card-text>
                    <div class="d-flex">
                        <v-btn text link :href="$route('admin.home')" >Dashboard</v-btn> <v-btn text link disabled>Pending Rtgs Payments</v-btn>
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
                    <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                   <th>Upload Date</th>
                                   <th>Company</th>
                                   <th>Type</th>
                                   <th>Payment Date</th>
                                   <th>Bank</th>
                                   <th>Status</th>
                                   <th>Ref Number</th>
                                   <th>Trans Date</th>
                                   <th>User</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="filterData.length > 0">
                                <tr v-for="rtg in filterData" :key="rtg.id">
                                    <td>
                                        {{rtg.created_at}}
                                    </td>
                                    <td>
                                        {{rtg.company}}
                                    </td>
                                    <td>
                                       {{rtg.type}}
                                    </td>
                                    <td>
                                       {{rtg.paymentdate}}
                                    </td>
                                    <td>
                                       {{rtg.bank}}
                                    </td>
                                    <td :class="rtg.status">
                                       {{rtg.status}}
                                    </td>
                                    <td>
                                       {{rtg.refnumber}}
                                    </td>
                                    <td>
                                       {{rtg.transdate}}
                                    </td>
                                    <td>
                                       {{rtg.user}}
                                    </td>
                                    <td>
                                      <rtg :data="rtg" :errors="errors" :transactions="transactions" :errorMessage="errorMessage" :successMessage="successMessage"></rtg>
                                    </td>
                                </tr>
                                </template>
                                <template v-else>
                                  <tr><td colspan="10" class="pa-5 red--text text-center">No Pending Rtgs Found</td></tr>
                                </template>
                            </tbody>
                        </template>
                    </v-simple-table>
                </v-card-text>
             </v-card>
            
               

                
           </v-container>
       </userlayout>
</template>
<script>
import  userlayout  from '../../../Layouts/administratorlayout';
import  rtg from '../../../../Components/rtgs'

export  default {
    props: ['errors','successMessage','errorMessage','rtgs','transactions'],
    components: {
        userlayout,
        rtg
    },data(){
        return{
            filter:''
        }
    },computed:{

        filterData(){
               var rtgs = this.rtgs
              if(this.filter !='')
               {
                  return rtgs.filter(rtg=>(!rtg.company.toUpperCase().indexOf(this.filter.toUpperCase())))
               }else{
                   return rtgs
               }
        }
    }
}
</script>
<style scoped>
  .PENDING{
      color: orange;
  }
  .CANCELLED{
      color: red;
  }
  .APPROVED{
      color: seagreen;
  }
</style>