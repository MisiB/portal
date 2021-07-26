<template>
    <v-app id="inspire">
        
        <v-app-bar app clipped-left flat fixed color="white" light height="100">
           

            <v-toolbar-title><v-img src="/img/logo.png" width="120"/></v-toolbar-title>
             <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
            <v-spacer/>


                   <v-badge
                        :content="commentscount"
                        :value="commentscount"
                        color="red"
                        overlap
                    >
                    <v-btn

                        icon
                        link
                        @click="showModel=true"
                    >


                                <v-icon>mdi-email</v-icon>


                    </v-btn>
                    </v-badge>
                    <v-badge
                        :content="notifications"
                        :value="notifications"
                        color="green"
                        overlap
                    >
                    <v-btn

                        icon
                        link
                        :href="$route('Notifications.index')"
                    >


                                <v-icon>mdi-bell-ring</v-icon>


                    </v-btn>
                    </v-badge>
              

              
            <v-menu
                bottom
                origin="center center"
                transition="scale-transition"
            >
                <template v-slot:activator="{ on, attrs }">
                    <v-btn
                        color="primary"
                        dark
                        v-bind="attrs"
                        v-on="on"
                        text
                    >
                        <v-icon>mdi-account</v-icon>
                          {{user.name}}
                        {{user.surname}}
                    </v-btn>
                </template>

                <v-list>
                    <v-list-item>
                        <inertia-link class="v-list-item theme--light" :href="$route('profile.index')">Profile Settings</inertia-link>
                    </v-list-item>
                     <v-list-item>
                        <inertia-link class="v-list-item theme--light" :href="$route('profile.companyindex')">Company Settings</inertia-link>
                    </v-list-item>
                    <v-list-item>
                        <inertia-link href="/logout" method="post" as="button" type="button" class="v-list-item theme--light">Logout</inertia-link>
                    </v-list-item>

                </v-list>
            </v-menu>


        </v-app-bar>
      
                <v-navigation-drawer
            v-model="drawer"
            app
            clipped
            class="green darken-3"
            width="150"
        >
           

        <v-list>
              <inertia-link class="v-list-item v-list-item--link theme--light  pt-2 pb-2 pl-2 pr-0 d-flex" :href="$route('dashboard')">
                   <v-icon>mdi-view-dashboard</v-icon><div class="ml-2"> Dashboard</div>
                  
            </inertia-link>            
                         
            <v-divider/>
            <inertia-link class="v-list-item v-list-item--link theme--light pt-2 pb-2 pl-2 pr-0 d-flex" :href="$route('reportInvoices.index')">
                   <v-icon>mdi-receipt</v-icon><div class="ml-2">  Invoices</div>
                  
            </inertia-link> 
               
                          
            <v-divider/>
            
            <inertia-link class="v-list-item v-list-item--link theme--light pt-2 pb-2 pl-2 pr-0 d-flex" :href="$route('reportPayments.index')">
                   <v-icon>mdi-credit-card-settings-outline</v-icon><div class="ml-2"> Payments</div>
                  
            </inertia-link>          

            
            <v-divider/>
            <inertia-link class="v-list-item v-list-item--link theme--light pt-2 pb-2 pl-2 pr-0 d-flex" :href="$route('reportDocuments.index')">
                   <v-icon>mdi-folder-open</v-icon><div class="ml-2"> Documents</div>
                  
            </inertia-link>   
                          
            <v-divider/>
            
                <inertia-link class="v-list-item v-list-item--link theme--light pt-2 pb-2 pl-2 pr-0 d-flex" :href="$route('reportUsers.index')">
                   <v-icon>mdi-account-multiple-plus</v-icon><div class="ml-2">Users</div>
                  
                </inertia-link>

           
            <v-divider/>
              <inertia-link class="v-list-item v-list-item--link theme--light pt-2 pb-2 pl-2 pr-0 d-flex" :href="$route('reportStatement.index')">
                   <v-icon>mdi-file-cabinet</v-icon><div class="ml-2">Statement</div>
                  
                </inertia-link>
              <v-divider/>
                <inertia-link class="v-list-item v-list-item--link theme--light pt-2 pb-2 pl-2 pr-0 d-flex" :href="$route('Mytenders.index')">
                   <v-icon>mdi-bell-plus</v-icon><div class="ml-2">Tenders</div>
                  
                </inertia-link>
                <v-divider/>
                 <inertia-link class="v-list-item v-list-item--link theme--light pt-2 pb-2 pl-2 pr-0 d-flex" :href="$route('TenderFees.index')">
                   <v-icon>mdi-file-document-multiple</v-icon><div class="ml-2">Tender Payments</div>
                  
                </inertia-link>             

           
            <v-divider/>


        </v-list>
        </v-navigation-drawer>

        <v-main  class="grey lighten-3"><slot /></v-main>
        <v-dialog v-model="showModel" max-width="600">
            <v-card>
                <v-card-title class="red white--text"><div>Attention</div><v-spacer/><v-btn icon @click="showModel=false"><v-icon>mdi-close</v-icon></v-btn></v-card-title>
                <v-card-text>
                    <div v-if="commentscount>0">
                        <div v-for="comment in comments" :key="comment.id" class="pb-5 pt-5">
                            <div class="font-weight-bold">{{comment.comment}}</div>
                            <div>{{comment.created_at | formatDate}}</div>
                            <v-divider/>
                        </div>
                    </div>
                    <div v-else>
                       <div class="text-center red--text pa-5">
                           No Document Comments
                       </div>
                    </div>
                    <div>

                    </div>
                </v-card-text>
            </v-card>
        </v-dialog>
    </v-app>
</template>

<script>
export default {
    props: ['title'],
    data: () => ({
        drawer: null,
         items:[],
         snackbar:true,
         showModel:false
    }),
    watch: {
        title: {
            immediate: true,
            handler(title) {
                document.title = title
            },
        },
    },methods: {
       
    },
     computed: {
      user() {
        return this.$page.props.user
      },
      notifications() {
        return this.$page.props.notifications
      },
        comments() {
        return this.$page.props.comments
      },commentscount(){
          return this.$page.props.comments.length 
      }
    }
}
</script>
