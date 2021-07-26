<template>
    <v-app>
        <v-app-bar

            dense
            app
            height="100"
            light
            flat
        >
            <v-toolbar-title><v-img src="/img/logo.png" width="120"/> </v-toolbar-title>
              <span class="hidden-sm-and-up">
          <v-app-bar-nav-icon @click="drawer = !drawer" ></v-app-bar-nav-icon>   
          </span> 
            <v-spacer></v-spacer>
            <div class="hidden-xs-only">
            <inertia-link :href="$route('welcome')" class="pa-3 blue-grey--text link font-weight-bold title">Home</inertia-link>
            <inertia-link :href="$route('tenders')" class=" pa-3 blue-grey--text link font-weight-bold title">Tenders</inertia-link>
            <inertia-link :href="$route('awards')" class="pa-3 blue-grey--text  link font-weight-bold title">Contracts</inertia-link>
            <inertia-link :href="$route('suppliers')" class="pa-3 blue-grey--text link font-weight-bold title">Suppliers</inertia-link>
            </div>
            
            <v-btn :href="$route('register')" depressed color="success">Register</v-btn>
            <v-btn :href="$route('login')" color="primary" depressed class="ml-2">Login</v-btn>

        </v-app-bar>
            <v-navigation-drawer class="green"  app v-model="drawer">
          <v-list>        
            <inertia-link :href="$route('welcome')" class="v-list-item v-list-item--link theme--light">Home</inertia-link>
            <inertia-link :href="$route('tenders')" class="v-list-item v-list-item--link theme--light">Tenders</inertia-link>
            <inertia-link :href="$route('awards')" class="v-list-item v-list-item--link theme--light">Contracts</inertia-link>
            <inertia-link :href="$route('suppliers')" class="v-list-item v-list-item--link theme--light">Suppliers</inertia-link>
          </v-list>
      </v-navigation-drawer>
        <v-main>
            <slot />
        </v-main>

    </v-app>
</template>

<script>
export default {
    props:['title'],    
    watch: {
        title: {
            immediate: true,
            handler(title) {
                document.title = title
            },
        },
    },data(){
        return{
            drawer:false
        }
    }
}
</script>
<style scoped>
.link{
    text-decoration: none;

}
</style>
