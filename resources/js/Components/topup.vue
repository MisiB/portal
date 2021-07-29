<template>
 <span>
 
          <v-row>
              <v-col cols="12">
          <v-btn block depressed small text class="white--text" @click="topupDialog=true">How to top up</v-btn>
              </v-col>
          </v-row>
          
        <v-dialog v-model="topupDialog" max-width="600">
              <v-card>
                  <v-card-title><div>How to top up</div><v-spacer/><v-btn icon @click="topupDialog=false"><v-icon>mdi-close</v-icon></v-btn></v-card-title>
                  <v-card-text>
                      <div v-if="type=='zwl_nonrefundable'">
                          <div class="font-bold">This wallet can be use to settle the following:</div>
                          <ol><li> SUPPLIER REGISTRATIONS </li>
                          <li> BID ESTABLISHMENT FEES</li>
                          <li>SPOC FEES</li> 
                          <li>TRAINING FEES</li>
                           <li>CONTRACT FEES</li>
                          </ol>
                            <v-alert
                            border="top"
                            color="red lighten-2"
                            dark
                            >
                            Please note when making a bank transfer enter  your PR number only on the description for your transfer
                            </v-alert>
                          <div class="headline mt-4">Banking Details</div>
                           <div>  CURRENCY: ZIM DOLLAR (ZWL)</div>
                            <div>ACCOUNT NUMBER: 10721064850020</div>
                            <div>BRANCH SORT CODE: 6101</div>
                            <div>SWIFT CODE: COBZZWHAXXX</div>
                      </div>
                          <div v-if="type=='usd_nonrefundable'">
                          <div class="font-bold">This wallet can be use to settle the following:</div>
                          <ol><li> SUPPLIER REGISTRATIONS </li>
                          <li> BID ESTABLISHMENT FEES</li>
                          <li>SPOC FEES</li> 
                          <li>TRAINING FEES</li>
                           <li>CONTRACT FEES</li>
                          </ol>
                            <v-alert
                            border="top"
                            color="red lighten-2"
                            dark
                            >
                            Please note when making a bank transfer enter  your PR number only on the description for your transfer
                            </v-alert>
                          <div class="headline mt-4">Banking Details</div>
                           <div>  CURRENCY: UNITED STATES DOLLARS (USD)</div>
                            <div>ACCOUNT NUMBER: 10721064850108</div>
                            <div>BRANCH SORT CODE: 6101</div>
                            <div>SWIFT CODE: COBZZWHAXXX</div>>
                      </div>

                        <div v-if="type=='usd_refundable'">
                          <div class="font-bold">This wallet can be use to settle the following:</div>
                          <ol><li> BID BOND ONLY</li>
                          </ol>
                            <v-alert
                            border="top"
                            color="red lighten-2"
                            dark
                            >
                            Please note when making a bank transfer enter  your PR number only on the description for your transfer
                            </v-alert>
                          <div class="headline mt-4">Banking Details</div>
                            <div>  CURRENCY: UNITED STATES DOLLARS (USD)</div>
                            <div>ACCOUNT NUMBER: 10721064850128</div>
                            <div>BRANCH SORT CODE: 6101</div>
                            <div>SWIFT CODE: COBZZWHAXXX</div>
                      </div>
                      <div v-if="type=='zwl_refundable'">
                          <div class="font-bold">This wallet can be use to settle the following:</div>
                          <ol><li> BID BOND ONLY</li>
                          </ol>
                            <v-alert
                            border="top"
                            color="red lighten-2"
                            dark
                            >
                            Please note when making a bank transfer enter  your PR number only on the description for your transfer
                            </v-alert>
                          <div class="headline mt-4">Banking Details</div>
                             <div>  CURRENCY: ZIM DOLLAR (ZWL)</div>
                            <div>ACCOUNT NUMBER: 10721064850118</div>
                            <div>BRANCH SORT CODE: ---</div>
                            <div>SWIFT CODE: ------</div>
                      </div>
                  </v-card-text>
                </v-card>
        </v-dialog>
 </span>    
</template>

<script>
export default {
    props:['type'],
    data(){
        return{
            topupDialog:false
        }
    }
}
</script>