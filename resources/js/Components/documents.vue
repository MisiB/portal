<template>
    <div>
        
             <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                   
                                   <th>Name</th>
                                     <th>Status</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <template v-if="documents.length>0">
                                <tr v-for="doc in documents" :key="doc.id">
                                    <td> 
                                        {{doc.name}}
                                    </td>
                                    <td>
                                        <div v-if="doc.company">
                                        {{doc.company.status}}
                                        </div>
                                        <div v-else>
                                            Not Uploaded
                                        </div>
                                    </td>
                                    <td>  
                                         <div v-if="doc.company">                                  
                                      <v-btn small rounded class="primary" depressed @click="download(doc.company.id)">download</v-btn>                                
                                         </div>
                                   </td>
                                </tr>
                            </template>
                                <template v-else>
                                   <tr>
                                       <td colspan="2" class="text-center red--text">No documents found</td>
                                   </tr>
                                </template>
                            </tbody>
                        </template>
                    </v-simple-table>
             
    </div>
</template>
<script>
export default {
 props:['documents']  ,
 methods:{
     download(id){
         var url= '/DownloadManager/'+id+'/documents'

         window.open(url);
     }
 }  
}
</script>