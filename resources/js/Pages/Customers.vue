<template>
    <v-card>
        <v-card-title>
            Customers
        </v-card-title>
        <v-card-text>
            <div class="container">
                <v-text-field
                    v-model="search"
                    append-icon="search"
                    label="Search"
                ></v-text-field>
            </div>
            <v-data-table 
                :search="search"
                :headers="headers"
                :items="customers"
                :itemsPerPage="itemsPerPage">
                <template v-slot:item.action="{ item }">
                    <v-btn class="mx-1 mdi mdi-update bg-yellow">Update</v-btn>
                    <v-btn class="mx-1 mdi mdi-trash-can bg-red" @click="submit(item.id)">Delete</v-btn>
                </template>
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
                {title: 'Email', value: 'email'},
                {title: 'Actions', value:'action'}
              
            ]
        }
    },
    methods: {
        submit: function (id) {
            if (confirm("Are you sure you want to delete this data?")) {
                this.$inertia.delete('deleteCustomer/'+id);
            }
        },
    },
};

</script>