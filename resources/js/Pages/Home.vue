<template>
    <v-card>
        <v-card-title>
            Add Customer
        </v-card-title>
        <v-card-text>
            <v-form @submit.prevent="submit">
                <v-col>
                    
                    <v-row class="ma-2 pa-2">
                        <v-text-field
                            v-model="form.firstname"
                            label="First name"
                            :error-messages="form.errors.firstname"
                        ></v-text-field>
                    </v-row>
                
                    <v-row class="ma-2 pa-2">
                        <v-text-field
                            v-model="form.lastname"
                            label="Last name"
                            :error-messages="form.errors.lastname"
                        ></v-text-field>
                    </v-row>
                                
                    <v-row class="ma-2 pa-2">
                        <v-text-field
                            v-model="form.email"
                            label="E-mail"
                            :error-messages="form.errors.email"
                        ></v-text-field>
                    </v-row>
                    <v-row class="ma-2 pa-2">
                        <v-btn type="submit" :disabled="form.processing">Submit</v-btn>
                    </v-row> 
                    
                </v-col>

            </v-form>
        </v-card-text>
    </v-card>
</template>

<script setup>
    import { useForm } from '@inertiajs/vue3'

    const form = useForm({
        firstname: '',
        lastname: '',
        email: '',
        
    })
    function submit() {
        form.post('/add', {
            preserveScroll: true,
            onSuccess: () => { 
                alert("Success"),
                form.reset() 
            },
        })
    }

</script>
<script>
    export default {
        data () {
            return {
                dialog: false,
            }
        },
    }
</script>
