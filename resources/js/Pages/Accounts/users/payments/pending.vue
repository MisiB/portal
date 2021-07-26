<template>
    <userlayout title="Mobile Payments">
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

        </v-container>
        <v-row>

            <v-col cols md="10" offset-md="1">
                <v-alert
                    outlined
                    color="red"
                >
                    <div class="title">
                        Pending Online Payments
                    </div>
                    <div>
                        We have  found {{online.length}}  online payments with a pending state.Please click the button below to check the payment status of  these transactions
                    </div>
                </v-alert>
                <v-card>
                    <v-card-text>
                      <v-simple-table>
                          <thead>
                          <tr>
                              <th>
                                  Date
                              </th>
                              <th>
                                  Invoice Number
                              </th>
                              <th>
                               Amount
                              </th>
                              <th>
                                  Status
                              </th>
                          </tr>
                          </thead>
                          <tbody>
                           <tr v-for=" onl in online" :key="onl.id">
                               <td>{{onl.created_at | formatDate}}</td>
                               <td>{{onl.invoice_number}}</td>
                               <td>{{onl.amount}}</td>
                               <td>{{onl.status}}</td>
                           </tr>
                          </tbody>
                      </v-simple-table>
                    </v-card-text>
                    <v-card-actions>
                        <v-btn color="primary" @click="checkPayments">Update All Payments</v-btn>
                    </v-card-actions>
                </v-card>
            </v-col>
        </v-row>
    </userlayout>

</template>

<script>
import  userlayout  from '../../../Layouts/userlayout';
export  default {
    props: ['errors', 'successMessage', 'errorMessage', 'online'],
    components: {
        userlayout
    },data(){
        return{
            value:0,
            interval: {},
        }
    },methods:{
          checkPayments(){
             this.$inertia.get('/bidders/Pendingpayments/'+this.online[0].id).then(()=>{
                    this.value = 0;
                })
          }
    },
}
</script>

<style scoped>

</style>
