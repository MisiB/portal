<template>
    <div>
        <v-card flat class="mt-4">
            <v-card-title class="indigo white--text">Bank Transfers</v-card-title>
            <v-card-text class="grey lighten-4">
                <v-simple-table>
                 <template v-slot:default>
                        <thead>
                            <tr>
                                <th>
                                    Date
                                </th>
                                <th>
                                 Description
                                </th>
                                <th>
                                Reference
                                </th>
                                <th>
                                   Account
                                </th>
                                <th>
                                  Amount
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-if="transactions.length >0">
                            <tr v-for="transaction in transactions" :key="transaction.id" class="pt-2 pb-2">
                              <td>{{transaction.trans_date}}</td>
                              <td>{{transaction.description}}</td>
                              <td>{{transaction.source_reference}}</td>
                              <td>{{transaction.accountnumber}}</td>
                              <td>
                                  {{transaction.currency}}
                                  {{transaction.amount}}
                              </td>
                            </tr>
                            </template>
                                <template v-else>
                                  <tr><td colspan="5" class="pa-5 text-center red--text"> No Bank transactions Uploads Found</td></tr>
                                </template>
                        </tbody>

                    </template>
                </v-simple-table>
            </v-card-text>
        </v-card>
    </div>
</template>
<script>
export default {
    props:['transactions'],
    methods:{
         download(filename){
            const url = '/'+filename
            window.open(url)
        }
    }
}
</script>