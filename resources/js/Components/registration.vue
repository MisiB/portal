<template>
    <div>
        
                 <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                    <th>Create date</th>
                                    <th>Category</th>
                                    <th>Year</th>
                                    <th>Status</th>
                                    <th>Downloads</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="registrations.length >0">
                                <tr v-for="registration in registrations" :key="registration.id">
                                     <td>
                                       {{registration.created_at | formatDate}}
                                    </td>
                                    <td>
                                        <div>
                                       {{registration.category.code}}
                                        </div>
                                        <div>
                                       {{registration.category.name}}
                                        </div>
                                    </td>
                                     <td>
                                       {{registration.expire_year}}
                                    </td>
                                    <td>
                                       {{registration.status}}
                                    </td>
                                    <td>
                                        {{registration.printed}}
                                    </td>
                                     
                                </tr>
                                </template>
                                <template v-else>
                                  <tr><td colspan="5" class="pa-5 text-center red--text"> No Registrations Found</td></tr>
                                </template>
                            </tbody>
                        </template>
                    </v-simple-table>
          
    </div>
</template>
<script>
export default {
    props:['registrations']
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