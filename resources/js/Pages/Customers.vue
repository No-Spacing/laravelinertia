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
                    <!-- <v-btn class="mx-1 mdi mdi-update bg-yellow">Update</v-btn> -->
                    <v-btn
                        class="mx-1 mdi mdi-update bg-yellow"
                        @click="edit(item)"
                        >
                        Update
                    </v-btn>
                    <v-btn class="mx-1 mdi mdi-trash-can bg-red" @click="submit(item.id)">Delete</v-btn>
                </template>
            </v-data-table>
            <v-dialog
            v-model="dialog"
            width="520px"
            >
                <v-card>
                    <v-card-title>
                        Update Customer
                    </v-card-title>
                    <v-card-text>   
                        <form @submit.prevent="update">
                            <v-text-field 
                                class="py-1"
                                v-model="form.firstname" 
                                placeholder="First Name"
                                :error-messages="$page.props.errors.firstname"
                            ></v-text-field>
                            <v-text-field
                                class="py-1"
                                v-model="form.lastname" 
                                placeholder="Last Name"
                                :error-messages="$page.props.errors.lastname"
                            ></v-text-field>
                            <v-text-field 
                                class="py-1"
                                v-model="form.email" 
                                placeholder="Email"
                                :error-messages="$page.props.errors.email"
                            ></v-text-field>
                            <v-btn type="submit">Update</v-btn>
                        </form>
                    </v-card-text>
                    <v-card-actions>
                    <v-btn color="primary" block @click="dialog = false">Close Dialog</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
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
              
            ],
            dialog: false,
            form: { 
                firstname: '',
                lastname: '',
                email: '',
            }
        }
    },
    methods: {
        submit: function (id) {
            if (confirm("Are you sure you want to delete this data?")) {
                this.$inertia.delete('deleteCustomer/'+id);
            }
        },
        edit: function (data) {
            this.form = Object.assign({}, data);
            this.dialog = true;
        },
        update: function() {
            this.$inertia.post('/updateCustomer', this.form,
            {
                onSuccess: () => { 
                    alert("Success");
                    this.dialog = false;
                },
            });
            
        }
    },
}; 
</script>