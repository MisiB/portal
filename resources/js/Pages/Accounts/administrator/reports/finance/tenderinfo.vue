<template>
   <plainlayout title="Tender Information">
    <div>
         <v-simple-table>
                     <template v-slot:default>
                         <thead>
                             <tr>
                                 <th>Date</th>
                                 <th>Entity</th>
                                 <th>Tendernumber</th>
                                 <th>Description</th>
                                 <th>Status</th>
                                 <th>Amount</th>
                             </tr>
                         </thead>
                        <tbody>
                           <tr v-for="trans in data" :key="trans.id">
                               <td>{{trans.date|formatDate}}</td>
                               <td>{{trans.entity}}</td>
                                <td>{{trans.tendernumber}}</td>
                                 <td>{{trans.description}}</td>
                                 <td>{{trans.status}}</td>
                                <td>{{trans.currency}}{{trans.amount}}</td>
                           </tr>
                        </tbody>
                     </template>
                    </v-simple-table>
    </div>
    </plainlayout> 
</template>
<script>
import  plainlayout  from '../../../../Layouts/plainlayout.vue'
export default {
    props:['data'],
    components:{
        plainlayout
    }
}
</script>