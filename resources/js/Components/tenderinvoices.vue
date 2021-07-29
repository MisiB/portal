<template>
    <div>
        
                 <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th>Create date</th>
                                    <th>Invoice Number</th>
                                    <th>Tender Number</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                     <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="invoices.length >0">
                                <tr v-for="invoice in invoices" :key="invoice.id">
                                     <td>
                                       {{invoice.created_at | formatDate}}
                                    </td>
                                    <td>
                                       {{invoice.invoice_number}}
                                    </td>
                                     <td>
                                       {{invoice.tendernumber}}
                                    </td>
                                    <td>
                                       {{invoice.description}}
                                    </td>
                                    <td>
                                        {{invoice.amount}}
                                    </td>
                                    <td>
                                        {{invoice.status}}
                                    </td>
                                     
                                </tr>
                                </template>
                                <template v-else>
                                  <tr><td colspan="6" class="pa-5 text-center red--text"> No Tender invoices Found</td></tr>
                                </template>
                            </tbody>
                        </template>
                    </v-simple-table>
           
    </div>
</template>
<script>
export default {
    props:['invoices']
}
</script>
<style scoped>
  .DR{
    color:red;
  }
  .CR{
      color: green;
  }
</style>