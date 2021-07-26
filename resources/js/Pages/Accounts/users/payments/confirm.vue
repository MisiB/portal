<template>
    <userlayout title="Mobile Payments">
        <v-container>
            <v-alert
                border="top"
                color="red lighten-2"
                dark
                v-if="errorMessage"
            >
                {{errorMessage}}
            </v-alert>
            <v-alert
                border="top"
                color="green lighten-2"
                dark
                v-if="successMessage"
            >
                {{successMessage}}
            </v-alert>
            <v-stepper alt-labels>
                <v-stepper-header>
                    <v-stepper-step
                        step="1"
                        complete
                        complete-icon="mdi-check"
                    >
                        <small>Document Upload</small>
                    </v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step
                        step="2"
                        complete
                        complete-icon="mdi-check"
                    >
                        <small>Invoicing</small>
                    </v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step
                        step="3"
                    >
                        <small> Payment</small>
                    </v-stepper-step>

                    <v-divider></v-divider>

                    <v-stepper-step step="4">
                        <small>Finish</small>
                    </v-stepper-step>
                </v-stepper-header>
            </v-stepper>
        </v-container>
        <v-row>
            <v-col cols md="6" offset-md="3">
                <v-card>
                    <v-app-bar class="cyan accent-4 white--text">
                        <v-toolbar-title>Confirm Payment</v-toolbar-title>
                    </v-app-bar>
                    <v-card-text class="text-center">
                        <p class="text-lg font-weight-bold">1 PLEASE CHECK YOUR PHONE AND ENTER YOUR PIN TO AUTHORIZE THE TRANSACTION</p>
                        <p class="text-lg font-weight-bold">2 WHEN YOU HAVE AUTHORIZED THE TRANSACTION PLEASE PRESS BUTTON BELOW TO COMPLETE THE TRANSACTION</p>

                        <v-btn rounded outlined color="success" :loading="loading" :disabled="disabled" @click="checkPayment">Complete Payment</v-btn>
                    </v-card-text>
                </v-card>
            </v-col>
        </v-row>
    </userlayout>

</template>

<script>
import  userlayout  from '../../../Layouts/userlayout';
export  default {
    props: ['errors', 'successMessage', 'errorMessage', 'online'],
    components: {
        userlayout
    },data(){
        return{
            loading:false,
            disabled:true,
            value:0
        }
    },methods:{
        checkPayment(){
            this.loading=true
            this.$inertia.get('/bidders/Mobilepayments/' + this.online.data.id + '/edit', {onSuccess: (page)=>{
              this.loading =false
            },onError:(err)=>{
             this.loading = false
            }})
        }
    }, mounted () {
        this.interval = setInterval(() => {
            if (this.value === 10) {
              this.disabled = false
            }
            this.value += 1
        }, 1000)
    }
}
</script>

<style scoped>

</style>
