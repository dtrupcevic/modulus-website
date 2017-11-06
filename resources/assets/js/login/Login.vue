<template>
    <v-layout class="pt-5">
    <v-flex xs6 offset-xs3 class="pt-3">
        <v-form @submit="submitForm">
            <v-text-field
                label="Email"
                v-model="email"
                :error-messages="errors.email"
                required
                ></v-text-field>
                <v-text-field
                label="Password"
                v-model="password"
                :error-messages="errors.password"
                :append-icon="password_visible ? 'visibility' : 'visibility_off'"
                :append-icon-cb="() => (password_visible = !password_visible)"
                :type="password_visible ? 'text' : 'password'"
                required
                ></v-text-field>
                <v-btn type="submit">Submit</v-btn>
        </v-form>
    </v-flex>
    </v-layout>
</template>

<script>
    import _ from 'lodash';

    export default {
        methods: {
            submitForm(e)
            {
                e.preventDefault();

                this.$http.post('/login', {
                    email:      this.email,
                    password:   this.password
                }).then(response => {

                    window.location.href = '/admin';

                }, errorResponse => {

                    if(_.has(errorResponse.body, 'errors'))
                    {
                        this.errors = errorResponse.body.errors;
                    }
                });
            }
        },
        data() {
            return {
                errors: [],
                password_visible: false,
                email: '',
                password: ''
            }
        }
    }
</script>
