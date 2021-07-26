<template>
    <v-app>
        <v-app-bar
            color="deep-purple accent-4"
            dense
            dark
            app
        >
            <v-app-bar-nav-icon></v-app-bar-nav-icon>

            <v-toolbar-title>P2Pfinancing</v-toolbar-title>

            <v-spacer></v-spacer>

            <inertia-link href="/dashboard/" class="v-btn pa-3 white--text">Home</inertia-link>
            <inertia-link href="/dashboard/Posts" class="v-btn pa-3 white--text">Posts</inertia-link>
            <inertia-link href="/dashboard/Gallery" class="v-btn pa-3 white--text">Gallery</inertia-link>


            <v-menu
                left
                bottom
            >
                <template v-slot:activator="{ on, attrs }">
                    <v-btn
                        icon
                        v-bind="attrs"
                        v-on="on"
                    >
                        <v-icon>mdi-dots-vertical</v-icon>
                    </v-btn>
                </template>

                <v-list>
                    <v-list-item
                        v-for="n in 5"
                        :key="n"
                        @click="() => {}"
                    >
                        <v-list-item-title>Option {{ n }}</v-list-item-title>
                    </v-list-item>
                </v-list>
            </v-menu>
        </v-app-bar>
        <v-main>
            <slot />
        </v-main>

    </v-app>
</template>

<script>
export default {
    props: {
        title: String,
    },
    watch: {
        title: {
            immediate: true,
            handler(title) {
                document.title = title
            },
        },
    },
}
</script>
