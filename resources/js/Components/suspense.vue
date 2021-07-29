<template>
    <div>
        
                 <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th>Create date</th>
                                    <th>Source</th>
                                    <th>Accountnumber</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="suspenses.length >0">
                                <tr v-for="suspense in suspenses" :key="suspense.id">
                                     <td>
                                       {{suspense.created_at | formatDate}}
                                    </td>
                                    <td>
                                       {{suspense.source}}
                                    </td>
                                     <td>
                                       {{suspense.accountnumber}}
                                    </td>
                                    <td>
                                       {{suspense.currency}}{{suspense.amount}}
                                    </td>
                                    <td>
                                        {{suspense.status}}
                                    </td>
                                     
                                </tr>
                                </template>
                                <template v-else>
                                  <tr><td colspan="5" class="pa-5 text-center red--text"> No Suspense Statement Found</td></tr>
                                </template>
                            </tbody>
                        </template>
                    </v-simple-table>
           
    </div>
</template>
<script>
export default {
    props:['suspenses']
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