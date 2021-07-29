<template>
    <div>
        
                 <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th>Create date</th>
                                    <th>identifier</th>
                                    <th>Description</th>
                                    <th>Source</th>
                                    <th>Flag</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="statements.length >0">
                                <tr v-for="statement in statements" :key="statement.id" :class="statement.flag">
                                     <td>
                                       {{statement.created_at | formatDate}}
                                    </td>
                                    <td>
                                       {{statement.identifier}}
                                    </td>
                                     <td>
                                       {{statement.description}}
                                    </td>
                                    <td>
                                       {{statement.source}}
                                    </td>
                                     <td>
                                       {{statement.flag}}
                                    </td>
                                     <td>
                                       {{statement.currency}}
                                       {{statement.amount}}
                                    </td>
                                </tr>
                                </template>
                                <template v-else>
                                  <tr><td colspan="6" class="pa-5 text-center red--text"> No Statement Found</td></tr>
                                </template>
                            </tbody>
                        </template>
                    </v-simple-table>
        
    </div>
</template>
<script>
export default {
    props:['statements']
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