<template>
    <v-card>
        <v-layout>
            <v-app-bar
                color="primary"
            >
                <v-app-bar-nav-icon variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
                <v-toolbar-title>Laravel - Inertiajs</v-toolbar-title>
            </v-app-bar>

            <v-navigation-drawer
                v-model="drawer"
                location="left"
                temporary
            >
                <v-list-item
                    v-for="(item, i) in items" 
                    :title="item.title"
                    :key="i"
                    :href="item.href" 
                ></v-list-item>
            </v-navigation-drawer>

            <v-main style="height: auto;">
                <v-card-text>
                    <slot/>
                </v-card-text>
            </v-main>
        </v-layout>
    </v-card>
</template>

<script>
  export default {
    data: () => ({
        drawer: false,
        group: null,
        items: [
            {
            title: 'Add Customer',
            href: '/',
            },
            {
            title: 'Customers',
            href: '/customers',
            },
        ],
    }),

    watch: {
      group () {
        this.drawer = false
      },
    },
  }
</script>