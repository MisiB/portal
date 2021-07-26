<template>
    <v-app>     
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
<style scoped>
.link{
    text-decoration: none;

}
</style>
