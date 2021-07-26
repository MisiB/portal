<template>
    <div>
        <v-card flat class="mt-4">
            <v-card-title class="indigo white--text">Statement</v-card-title>
            <v-card-text class="grey lighten-4">
                 <v-simple-table class="grey lighten-4">
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th>Create date</th>
                                    <th>Description</th>
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
                                       {{statement.description}}
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
            </v-card-text>
        </v-card>
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