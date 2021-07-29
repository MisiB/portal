<template>
    <div>
      
                <v-simple-table>
                 <template v-slot:default>
                        <thead>
                            <tr>
                                <th>
                                    Date
                                </th>
                                <th>
                               Comment
                                </th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <template v-if="comments.length >0">
                            <tr v-for="comment in comments" :key="comment.id" class="pt-2 pb-2">
                              <td>{{comment.created_at | formatDate}}</td>
                              <td>{{comment.comment}}</td>
                            </tr>
                            </template>
                                <template v-else>
                                  <tr><td colspan="2" class="pa-5 text-center red--text"> No Comments  Found</td></tr>
                                </template>
                        </tbody>

                    </template>
                </v-simple-table>
          
    </div>
</template>
<script>
export default {
    props:['comments'],
   
}
</script>