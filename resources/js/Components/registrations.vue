<template>
    <div>
       
             <v-simple-table>
                        <template v-slot:default>
                            <thead>
                                <tr>
                                   
                                   <th>Name</th>
                                   <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <template v-if="registrations.length>0">
                                <tr v-for="reg in registrations" :key="reg.id">
                                    <td>
                                        {{reg.category.name}}
                                    </td>
                                    <td>
                                        {{reg.status}}
                                    </td>
                                   
                                </tr>
                            </template>
                                <template v-else>
                                   <tr>
                                       <td colspan="1" class="text-center red--text">No Registrations found</td>
                                   </tr>
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