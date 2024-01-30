<template>
    <v-card>
        <v-text-field
            v-model="search"
            append-icon="search"
            label="Search"
        ></v-text-field>
        <v-card-title>
            Customers
        </v-card-title>
        <v-card-text>
            <v-data-table 
                :search="search"
                :headers="headers"
                :items="customers"
                :itemsPerPage="itemsPerPage">
            </v-data-table>
        </v-card-text>
    </v-card>
</template>

<script>
import Pagination from '@/Components/Pagination.vue'

export default {
    components: {
        Pagination,
    },
    props: {
        customers: Object,
    },
    data () {
        return {
            search: '',
            itemsPerPage: 5,
            headers: [
                {title: 'First Name', value: 'firstname'},
                {title: 'Last Name', value: 'lastname'},
                {title: 'Email', value: 'email'}
            ]
        }
    }
    
}

</script>