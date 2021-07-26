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
                                    Invoice No
                                </th>
                                <th>
                                    Bank
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-if="rtgs.length >0">
                            <tr v-for="rtg in rtgs" :key="rtg.id" class="pt-2 pb-2">
                              <td>{{rtg.created_at | formatDate}}</td>
                              <td>{{rtg.invoice_number}}</td>
                              <td>{{rtg.name}}</td>
                               <td>{{rtg.status}}</td>
                              <td class="d-flex pa-2">
                                 <v-btn small rounded color="primary" @click="download(rtg.filename)" depressed>Download</v-btn> 
                             </td>
                            </tr>
                            </template>
                                <template v-else>
                                  <tr><td colspan="4" class="pa-5 text-center red--text"> No Rtgs Uploads Found</td></tr>
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
    props:['rtgs'],
    methods:{
         download(filename){
            const url = '/'+filename
            window.open(url)
        }
    }
}
</script>