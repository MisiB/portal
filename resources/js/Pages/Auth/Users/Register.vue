<template>
    <welcomelayout title="Register">
        <v-container>
             <v-row>
                <v-col cols="12" md="8" offset-md="2">
                   
                       <v-card>
                           <v-card-title>Register</v-card-title>
                           <v-card-text>
                               <v-row>
                                   <v-col cols="12" sm="6">
                                       <v-text-field
                                           v-model="form.name"
                                           label="Name"
                                           outlined
                                           :error-messages="errors.name"
                                       >
                                       </v-text-field>
                                   </v-col>
                                   <v-col cols="12" sm="6">
                                       <v-text-field
                                           v-model="form.surname"
                                           label="Surname"
                                           outlined
                                           :error-messages="errors.surname"
                                       >
                                       </v-text-field>
                                   </v-col>
                               </v-row>
                               <v-row>
                                   <v-col cols="12" sm="6">
                                       <v-text-field
                                           v-model="form.email"
                                           label="Email"
                                           outlined
                                          :error-messages="errors.email"
                                       >
                                       </v-text-field>

                                   </v-col>
                                   <v-col cols="12" sm="6">
                                       <v-text-field
                                           v-model="form.phone"
                                           label="Phone"
                                           outlined
                                           :error-messages="errors.phone"
                                       >
                                       </v-text-field>
                                   </v-col>
                               </v-row>
                               <v-row>
                                   <v-col cols="12" sm="6">
                                       <v-text-field
                                           v-model="form.password"
                                           outlined
                                           :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                                           :error-messages="errors.password"
                                           :type="show1 ? 'text' : 'password'"
                                           label="Password"
                                           hint="At least 8 characters"
                                           counter
                                           @click:append="show1 = !show1"
                                       >
                                       </v-text-field>
                                   </v-col>
                                   <v-col cols="12" sm="6">
                                       <v-text-field
                                           v-model="form.password_confirmation"
                                           outlined
                                           :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
                                           :type="show2 ? 'text' : 'password'"
                                           label="ConfirmPassword"
                                           hint="At least 8 characters"
                                           counter
                                           @click:append="show2 = !show2"
                                           :error-messages="errors.password"
                                       >
                                       </v-text-field>
                                       </v-col>
                               </v-row>
                               <h3>Organisation Details</h3>
                               <v-row>
                                   <v-col cols="12" sm="6">
                                       <v-text-field
                                           v-model="form.company"
                                           label="Company Name"
                                           outlined
                                           :error-messages="errors.company"
                                       >
                                       </v-text-field>
                                   </v-col>
                                   <v-col cols="12" sm="6">
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
                                   </v-col>
                               </v-row>
                               <v-row>
                                   <v-col cols="12" sm="6">
                                       <v-select
                                           :items="countrylist"
                                           label="Country"
                                           outlined
                                           v-model="form.country"
                                           :error-messages="errors.country"
                                       >
                                       </v-select>
                                   </v-col>
                                   <v-col cols="12" sm="6">
                                       <v-text-field
                                           v-model="form.city"
                                           label="City"
                                           outlined
                                           :error-messages="errors.city"
                                       >
                                       </v-text-field>
                                   </v-col>
                               </v-row>
                               <v-row v-if="form.country =='Zimbabwe'">
                                   <v-col cols="12" md="6">
                                       <v-select
                                           :items="provincelist"
                                           label="Province"
                                           outlined
                                           v-model="form.province"
                                           :error-messages="errors.province"
                                       >
                                       </v-select>
                                   </v-col>
                                   <v-col cols="12" md="6">
                                       <v-select
                                           :items="computeList"
                                           label="District"
                                           outlined
                                           v-model="form.district"
                                           :error-messages="errors.district"
                                       >
                                       </v-select>
                                   </v-col>
                               </v-row>
                           </v-card-text>
                           <v-card-actions>
                                   <v-btn
                                       outlined
                                       rounded
                                       text
                                       class="red lighten-3 white--text"
                                   >
                                       Cancel
                                   </v-btn>
                                   <v-spacer/>
                                   <v-btn
                                       outlined
                                       rounded
                                       :loading="form.processing"
                                       :disabled="form.processing"
                                       text
                                       class="green lighten-3 white--text"
                                       @click="submitForm"
                                   >
                                       Submit
                                   </v-btn>
                           </v-card-actions>
                       </v-card>
                        <div  class="text-center mt-4 mb-2">
                            <inertia-link :href="$route('login')">Already got an acount ??</inertia-link>
                        </div>
                        <div class="text-center">
                            <inertia-link :href="$route('password.request')">Forgot Passowrd ??</inertia-link>
                        </div>
                   
                </v-col>
            </v-row>

        </v-container>

    </welcomelayout>

</template>
<script>
import  welcomelayout  from '../../Layouts/welcome'
import Vue from 'vue'
export  default {
    props:['types','errors','successMessage','errorMessage'],
    components:{
        welcomelayout
    },data(){
        return{
            valid:true,
            show1: false,
            show2: false,
            loading:false,
         
            countrylist:['Afghanistan', 'Albania', 'Algeria', 'American Samoa', 'Andorra', 'Angola', 'Anguilla', 'Antarctica', 'Antigua and Barbuda', 'Argentina', 'Armenia', 'Aruba', 'Australia', 'Austria', 'Azerbaijan', 'Bahamas', ' Bahrain', ' Bangladesh', ' Barbados', ' Belarus', ' Belgium', ' Belize', ' Benin', ' Bermuda', ' Bhutan', ' Bolivia', ' Bosnia and Herzegovina', ' Botswana', ' Bouvet Island', ' Brazil', ' British Indian Ocean Territory', ' Brunei Darussalam', ' Bulgaria', ' Burkina Faso', ' Burundi', ' Cambodia', ' Cameroon', ' Canada', ' Cape Verde', ' Cayman Islands', ' Central African Republic', ' Chad', ' Chile', ' China', ' Christmas Island', ' Cocos (Keeling Islands)', ' Colombia', ' Comoros', ' Congo', ' Cook Islands', ' Costa Rica', ' Cote D Ivoire (Ivory Coast)', ' Croatia (Hrvatska', ' Cuba', ' Cyprus', ' Czech Republic', ' Denmark', ' Djibouti', ' Dominica', ' Dominican Republic', ' East Timor', ' Ecuador', ' Egypt', ' El Salvador', ' Equatorial Guinea', ' Eritrea', ' Estonia', ' Ethiopia', ' Falkland Islands (Malvinas)', ' Faroe Islands', ' Fiji', ' Finland', ' France', ' France', ' Metropolitan', ' French Guiana', ' French Polynesia', ' French Southern Territories', ' Gabon', ' Gambia', ' Georgia', ' Germany', ' Ghana', ' Gibraltar', ' Greece', ' Greenland', ' Grenada', ' Guadeloupe', ' Guam', ' Guatemala', ' Guinea', ' Guinea-Bissau', ' Guyana', ' Haiti', ' Heard and McDonald Islands', ' Honduras', ' Hong Kong', ' Hungary', ' Iceland', ' India', ' Indonesia', ' Iran', ' Iraq', ' Ireland', ' Israel', ' Italy', ' Jamaica', ' Japan', ' Jordan', ' Kazakhstan', ' Kenya', ' Kiribati', ' Korea (North)', ' Korea (South)', ' Kuwait', ' Kyrgyzstan', ' Laos', ' Latvia', ' Lebanon', ' Lesotho', ' Liberia', ' Libya', ' Liechtenstein', ' Lithuania', ' Luxembourg', ' Macau', ' Macedonia', ' Madagascar', ' Malawi', ' Malaysia', ' Maldives', ' Mali', ' Malta', ' Marshall Islands', ' Martinique', ' Mauritania', ' Mauritius', ' Mayotte', ' Mexico', ' Micronesia', ' Moldova', ' Monaco', ' Mongolia', ' Montserrat', ' Morocco', ' Mozambique', ' Myanmar', ' Namibia', ' Nauru', ' Nepal', ' Netherlands', ' Netherlands Antilles', ' New Caledonia', ' New Zealand', ' Nicaragua', ' Niger', ' Nigeria', ' Niue', ' Norfolk Island', ' Northern Mariana Islands', ' Norway', ' Oman', ' Pakistan', ' Palau', ' Panama', ' Papua New Guinea', ' Paraguay', ' Peru', ' Philippines', ' Pitcairn', ' Poland', ' Portugal', ' Puerto Rico', ' Qatar', ' Reunion', ' Romania', ' Russian Federation', ' Rwanda', ' Saint Kitts and Nevis', ' Saint Lucia', ' Saint Vincent and The Grenadines', 'Samoa', 'San Marino', 'Sao Tome and Principe', 'Saudi Arabia', 'Senegal', 'Seychelles', 'Sierra Leone', ' Singapore', ' Slovak Republic', ' Slovenia', ' Solomon Islands', ' Somalia', ' South Africa', ' S. Georgia and S. Sandwich Isls.', ' Spain', ' Sri Lanka', ' St. Helena', 'St. Pierre and Miquelon', 'Sudan', 'Suriname', 'Svalbard and Jan Mayen Islands', ' Swaziland', ' Sweden', ' Switzerland', ' Syria', ' Taiwan', ' Tajikistan', ' Tanzania', ' Thailand', ' Togo', ' Tokelau', ' Tonga', ' Trinidad and Tobago', ' Tunisia', ' Turkey', ' Turkmenistan', ' Turks and Caicos Islands', ' Tuvalu', ' Uganda', ' Ukraine', ' United Arab Emirates', ' United Kingdom (Britain / UK)', ' United States of America (USA)', ' US Minor Outlying Islands', ' Uruguay', ' Uzbekistan', ' Vanuatu', ' Vatican City State (Holy See)', ' Venezuela', ' Viet Nam', ' Virgin Islands (British)', 'Virgin Islands (US)', 'Wallis and Futuna Islands', 'Western Sahara', 'Yemen', 'Yugoslavia', 'Zaire', ' Zambia', 'Zimbabwe'],
            sectorlist:['Private','Government','Councils','Parastatals','Mining','Health','NGO','Other'],
            provincelist:['Matabeleland South','Mashonaland Central','Mashonaland West','Mashonaland North','Mashonaland East','Masvingo','Midlands','Manicaland','Bulawayo','Harare'],
            form:this.$inertia.form({
                name:'',
                surname:'',
                email:'',
                phone:'',
                city:'',
                country:'',
                company:'',
                accounttype:'',
                password:'',
                password_confirmation:'',
                province:'',
                district:'',

            }),
        }
    },methods:{
        submitForm(){
            
                this.form.post('/register',{
                    onSucess:(page)=>{
                        if(this.successMessage){
                            Vue.swal('Success',this.successMessage,'success')
                        }
                        if(this.errorMessage){
                            Vue.swal('Oops',this.errorMessage,'error')
                        }
                    }
                })
            
        }
    },computed:{
        computeList(){
            var list = [];
            if(this.form.province =='Matabeleland South')
            {
                list=['Beitbridge','Bulilima','Gwanda','Insiza','Mangwe','Matobo','Umzingwane']
            }
            else if(this.form.province =='Bulawayo'){
                list =['Bulawayo']
            }
            else if(this.form.province=='Mashonaland Central'){
                list=["Bindura","Guruve","Mazowe","Mbire","Mount Darwin","Muzarabani"]
            }
            else if(this.form.province=='Mashonaland West'){
                list=["Chegutu","Chinhoyi","Hurungwe","Kariba","Makonde","Mhondoro-Ngezi","Sanyati","Zvimba"]
            }
            else if(this.form.province=='Mashonaland East'){
                list=["Chikomba","Goromonzi","Marondera","Mudzi","Murehwa","Mutoko","Seke","Uzumba-Maramba-Pfungwe"]
            }
            else if(this.form.province=='Masvingo'){
                list=["Bikita","Chiredzi","Chivi","Gutu","Masvingo","Mwenezi","Zaka"]
            }
            else if(this.form.province=='Midlands'){
                list=["Chirumhanzu","Gokwe North","Gokwe South","Gweru","Kwekwe","Mberengwa","Shurugwi","Zvishavane"]
            }
            else if(this.form.province=='Manicaland'){
                list=[ "Buhera","Chimanimani","Chipinge","Makoni","Mutare","Mutasa","Nyanga"]
            }
            else if(this.form.province=='Harare'){
                list=['Harare']
            }

            return list;
        }
    }
}
</script>
