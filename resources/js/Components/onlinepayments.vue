<template>
    <div>
        <v-card flat class="mt-4">
            <v-card-title class="indigo white--text">Online Payments</v-card-title>
            <v-card-text class="grey lighten-4">
                <v-simple-table>
                 <template v-slot:default>
                        <thead>
                            <tr>
                                <th>
                                    Date
                                </th>
                                <th>
                                Invoice Number
                                </th>
                                <th>
                                 Mode
                                </th>
                                <th>
                                   Status
                                </th>
                                <th>
                                  Amount
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-if="onlinepayments.length >0">
                            <tr v-for="online in onlinepayments" :key="online.id" class="pt-2 pb-2">
                              <td>{{online.created_at | formatDate}}</td>
                              <td>{{online.invoice_number}}</td>
                              <td>{{online.mode}}</td>
                              <td>{{online.status}}</td>
                              <td>
                                  {{online.amount}}
                              </td>
                            </tr>
                            </template>
                                <template v-else>
                                  <tr><td colspan="5" class="pa-5 text-center red--text"> No Online transactions  Found</td></tr>
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
    props:['onlinepayments'],
    methods:{
         download(filename){
            const url = '/'+filename
            window.open(url)
        }
    }
}
</script>