<template>
    <div>
        <v-card flat class="mt-4">
            <v-card-title class="indigo white--text">Contacts</v-card-title>
            <v-card-text>
                <template v-if="contact">
                 <v-simple-table>
                        <template v-slot:default>
                            
                            <tbody>
                                <tr><th>Emails</th><td>{{contact.emails}}</td></tr>
                                <tr><th>Phone number</th><td>{{contact.phonenumbers}}</td></tr>
                                 <tr><th>Address</th><td>{{contact.address}}</td></tr>
                            </tbody>
                        </template>
                    </v-simple-table>
                </template>
                <template v-else>
                     <div class="pa-5 text-center red--text"> No contact found</div>
                </template>
            </v-card-text>
        </v-card>
    </div>
</template>
<script>
export default {
    props:['contact']
}
</script>