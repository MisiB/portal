<template>
    <div>
        <v-card flat class="mt-4" >
            <v-card-title class="indigo">
                <div class="white--text">Company Details</div>
                <v-spacer/>
                <v-btn icon @click="editModel=true"><v-icon class="white--text">mdi-pencil</v-icon></v-btn>
             </v-card-title>

             <v-card-text>
               <v-simple-table>
                   <template v-slot:default>
                       <tbody>
                      <tr>
                          <th>Name</th><td>{{customer.name}}</td>
                     </tr>
                     <tr>
                          <th>Regnumber</th><td>{{customer.regnumber}}</td>
                     </tr>
                     <tr>
                          <th>Country</th>
                          <td>
                               <template v-if="customer.country">
                              {{customer.country}}
                              </template>
                              <template v-else>
                                 <span class="red--text"> Please set country of operation</span>
                              </template>
                          </td>
                     </tr>
                     <tr>
                          <th>locality</th><td>{{customer.locality}}</td>
                     </tr>
                     <tr>
                          <th>Account type</th>
                          <td>
                              <template v-if="customer.type">
                              {{customer.type.name}}
                              </template>
                              <template v-else>
                                 <span class="red--text"> Please set account type</span>
                              </template>
                            </td>
                      </tr>

                      <tr><th>Emails</th>
                      <td> <template v-if="customer.contacts">
                              {{customer.contacts.emails}}
                              </template>
                              <template v-else>
                                 <span class="red--text">No Email Contact Set</span>
                              </template>
                              </td>
                      </tr>
                                <tr><th>Phone number</th>
                                <td>
                                  
                                    <template v-if="customer.contacts">
                              {{customer.contacts.phonenumbers}}
                              </template>
                              <template v-else>
                                 <span class="red--text">No Phone numbers Set</span>
                              </template>
                                    </td></tr>
                                 <tr><th>Address</th>
                                 <td>
                                    <template v-if="customer.contacts">
                              {{customer.contacts.address}}
                              </template>
                              <template v-else>
                                 <span class="red--text">No Address Set</span>
                              </template> 
                                </td>
                            </tr>
                       </tbody>
                   </template>
               </v-simple-table>
             </v-card-text>

        </v-card>
        <v-dialog v-model="editModel" max-width="600">
            <v-card>
                <v-card-title>
                    <div>Edit Company</div>
                    <v-spacer/>
                    <v-btn icon @click="editModel=false"><v-icon>mdi-close</v-icon></v-btn>
                </v-card-title>
                <v-card-text>
                       <v-text-field
                                         v-model="form.name"
                                           label="Name"
                                           outlined
                                           :error-messages="errors.name"
                                       >
                                       </v-text-field>
                                          <v-select
                                           :items="types"
                                           label="Account Type"
                                           item-text="name"
                                           item-value="id"
                                           outlined
                                           v-model="form.accounttype"
                                           :error-messages="errors.accounttype"
                                       >
                                       </v-select>
                                         <v-select
                                           :items="countrylist"
                                           label="Country"
                                           outlined
                                           v-model="form.country"
                                           :error-messages="errors.country"
                                       >
                                       </v-select>
                </v-card-text>
                <v-card-actions>
                     <v-btn color="error" small rounded depressed @click="editModel=false">Cancel</v-btn>
                <v-spacer/>
                <v-btn color="success" small rounded depressed @click="submitForm" :loading="form.processing" :disabled="form.processing">
                    Submit
                </v-btn>
           
                </v-card-actions>
            </v-card>
        </v-dialog>
    </div>

</template>
<script>
export default {
  props:['customer','types','errors'] ,
  data() {
      return {
          editModel:false,
           countrylist:['Afghanistan', 'Albania', 'Algeria', 'American Samoa', 'Andorra', 'Angola', 'Anguilla', 'Antarctica', 'Antigua and Barbuda', 'Argentina', 'Armenia', 'Aruba', 'Australia', 'Austria', 'Azerbaijan', 'Bahamas', ' Bahrain', ' Bangladesh', ' Barbados', ' Belarus', ' Belgium', ' Belize', ' Benin', ' Bermuda', ' Bhutan', ' Bolivia', ' Bosnia and Herzegovina', ' Botswana', ' Bouvet Island', ' Brazil', ' British Indian Ocean Territory', ' Brunei Darussalam', ' Bulgaria', ' Burkina Faso', ' Burundi', ' Cambodia', ' Cameroon', ' Canada', ' Cape Verde', ' Cayman Islands', ' Central African Republic', ' Chad', ' Chile', ' China', ' Christmas Island', ' Cocos (Keeling Islands)', ' Colombia', ' Comoros', ' Congo', ' Cook Islands', ' Costa Rica', ' Cote D Ivoire (Ivory Coast)', ' Croatia (Hrvatska', ' Cuba', ' Cyprus', ' Czech Republic', ' Denmark', ' Djibouti', ' Dominica', ' Dominican Republic', ' East Timor', ' Ecuador', ' Egypt', ' El Salvador', ' Equatorial Guinea', ' Eritrea', ' Estonia', ' Ethiopia', ' Falkland Islands (Malvinas)', ' Faroe Islands', ' Fiji', ' Finland', ' France', ' France', ' Metropolitan', ' French Guiana', ' French Polynesia', ' French Southern Territories', ' Gabon', ' Gambia', ' Georgia', ' Germany', ' Ghana', ' Gibraltar', ' Greece', ' Greenland', ' Grenada', ' Guadeloupe', ' Guam', ' Guatemala', ' Guinea', ' Guinea-Bissau', ' Guyana', ' Haiti', ' Heard and McDonald Islands', ' Honduras', ' Hong Kong', ' Hungary', ' Iceland', ' India', ' Indonesia', ' Iran', ' Iraq', ' Ireland', ' Israel', ' Italy', ' Jamaica', ' Japan', ' Jordan', ' Kazakhstan', ' Kenya', ' Kiribati', ' Korea (North)', ' Korea (South)', ' Kuwait', ' Kyrgyzstan', ' Laos', ' Latvia', ' Lebanon', ' Lesotho', ' Liberia', ' Libya', ' Liechtenstein', ' Lithuania', ' Luxembourg', ' Macau', ' Macedonia', ' Madagascar', ' Malawi', ' Malaysia', ' Maldives', ' Mali', ' Malta', ' Marshall Islands', ' Martinique', ' Mauritania', ' Mauritius', ' Mayotte', ' Mexico', ' Micronesia', ' Moldova', ' Monaco', ' Mongolia', ' Montserrat', ' Morocco', ' Mozambique', ' Myanmar', ' Namibia', ' Nauru', ' Nepal', ' Netherlands', ' Netherlands Antilles', ' New Caledonia', ' New Zealand', ' Nicaragua', ' Niger', ' Nigeria', ' Niue', ' Norfolk Island', ' Northern Mariana Islands', ' Norway', ' Oman', ' Pakistan', ' Palau', ' Panama', ' Papua New Guinea', ' Paraguay', ' Peru', ' Philippines', ' Pitcairn', ' Poland', ' Portugal', ' Puerto Rico', ' Qatar', ' Reunion', ' Romania', ' Russian Federation', ' Rwanda', ' Saint Kitts and Nevis', ' Saint Lucia', ' Saint Vincent and The Grenadines', 'Samoa', 'San Marino', 'Sao Tome and Principe', 'Saudi Arabia', 'Senegal', 'Seychelles', 'Sierra Leone', ' Singapore', ' Slovak Republic', ' Slovenia', ' Solomon Islands', ' Somalia', ' South Africa', ' S. Georgia and S. Sandwich Isls.', ' Spain', ' Sri Lanka', ' St. Helena', 'St. Pierre and Miquelon', 'Sudan', 'Suriname', 'Svalbard and Jan Mayen Islands', ' Swaziland', ' Sweden', ' Switzerland', ' Syria', ' Taiwan', ' Tajikistan', ' Tanzania', ' Thailand', ' Togo', ' Tokelau', ' Tonga', ' Trinidad and Tobago', ' Tunisia', ' Turkey', ' Turkmenistan', ' Turks and Caicos Islands', ' Tuvalu', ' Uganda', ' Ukraine', ' United Arab Emirates', ' United Kingdom (Britain / UK)', ' United States of America (USA)', ' US Minor Outlying Islands', ' Uruguay', ' Uzbekistan', ' Vanuatu', ' Vatican City State (Holy See)', ' Venezuela', ' Viet Nam', ' Virgin Islands (British)', 'Virgin Islands (US)', 'Wallis and Futuna Islands', 'Western Sahara', 'Yemen', 'Yugoslavia', 'Zaire', ' Zambia', 'Zimbabwe'],
          
          form:this.$inertia.form({
              id:this.customer.id,
              name:this.customer.name,
              accounttype:this.customer.accounttype_id,
              country:this.customer.country
          })
      }
  },methods:{
      editDialog(){
          this.editModel=true          
      },
      submitForm(){
        this.form.put(this.$route('customer.update',this.customer.id),{
            onSuccess:(page)=>{
                this.editModel = false
            }
        })
      }

  }  
}
</script>