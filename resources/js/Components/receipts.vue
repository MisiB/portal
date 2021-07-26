<template>
    <div>
        <v-card flat class="mt-4" >
            <v-card-title class="indigo white--text">Receipts</v-card-title>
            <v-card-text class="grey lighten-4">
                 <v-simple-table class="grey lighten-4">
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th>Creation date</th>
                                    <th>Receipt Number</th>
                                    <th>Invoice number</th>
                                    <th>Type</th>
                                    <th>Description</th>
                                    <th>method</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="receipts.length >0">
                                <tr v-for="receipt in receipts" :key="receipt.id">
                                      <td>
                                        {{receipt.created_at | formatDate}}
                                    </td>
                                     <td>
                                        {{receipt.receiptnumber}}
                                    </td>
                                    <td>
                                       {{receipt.invoicenumber}}
                                    </td>
                                     <td>
                                       {{receipt.type}}
                                    </td>
                                     <td>
                                       {{receipt.description}}
                                    </td>
                                     <td>
                                       {{receipt.method}}
                                    </td>
                                     <td>
                                       {{receipt.currency}}{{receipt.amount}}
                                    </td>
                                </tr>
                                </template>
                                <template v-else>
                                  <tr><td colspan="7" class="pa-5 text-center red--text"> No receipts found</td></tr>
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
    props:['receipts']
}
</script>