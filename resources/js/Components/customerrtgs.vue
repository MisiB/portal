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
                                 <v-btn small rounded color="primary" @click="download(rtg.id)" depressed>Download</v-btn> 
                             </td>
                            </tr>
                            </template>
                                <template v-else>
                                  <tr><td colspan="4" class="pa-5 text-center red--text"> No Rtgs Uploads Found</td></tr>
                                </template>
                        </tbody>

                    </template>
                </v-simple-table>
            
    </div>
</template>
<script>
export default {
    props:['rtgs'],
    methods:{
            download(id){
            var url= '/DownloadManager/'+id+'/rtgs'
            window.open(url);
          }
    }
}
</script>