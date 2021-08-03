<template>
    <v-app id="inspire">
        
        <v-app-bar app clipped-left flat fixed color="white" light height="100">
           

            <v-toolbar-title><v-img src="/img/logo.png" width="120"/></v-toolbar-title>
             <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
            <v-spacer/>


     
                    <v-badge
                        :content="messages"
                        :value="messages"
                        color="red"
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
              <inertia-link class="v-list-item v-list-item--link theme--light  pt-2 pb-2 pl-2 pr-0 d-flex" :href="$route('entity.home')">
                   <v-icon>mdi-view-dashboard</v-icon><div class="ml-2"> Dashboard</div>
             </inertia-link>            
                         
            <v-divider/>
                <v-menu
      bottom
      origin="center center"
      transition="scale-transition"
      v-for=" module in user.role.modules" :key="module.id" 
    >
      <template v-slot:activator="{ on, attrs }">
          <div class="v-list-item v-list-item--link theme--light  pt-1 pb-1 pl-2 pr-0 d-flex white--text"     v-bind="attrs"
          v-on="on">
          <v-icon v-text="module.icon"></v-icon>
          <div class="ml-2">{{module.name}}</div>
          </div>                  
           <v-divider/>
      </template>
         
      <v-list>
          <inertia-link class="v-list-item v-list-item--link theme--light" v-for="submodule in module.submodules" :key="submodule.id" :href="$route(submodule.url)">
                <v-list-item-icon><v-icon>{{submodule.icon}}</v-icon></v-list-item-icon>
          <v-list-item-title>{{submodule.name}}</v-list-item-title>
          </inertia-link>
      
      </v-list>
        <v-divider/>
    </v-menu>
            <v-divider/>
            
         

        </v-list>
        </v-navigation-drawer>

        <v-main  class="grey lighten-3">
          
       

            <slot />


        </v-main>
   
    </v-app>
</template>

<script>
export default {
    props: ['title'],
    data: () => ({
        drawer: null,
         items:[],
        messages:2,
        snackbar:true,
        message:'test message'
    }),
    watch: {
        title: {
            immediate: true,
            handler(title) {
                document.title = title
            },
        },
        user:{

        }
    },methods: {
       
    },
      computed: {
      user() {
        return this.$page.props.user
      }
    }
}
</script>
