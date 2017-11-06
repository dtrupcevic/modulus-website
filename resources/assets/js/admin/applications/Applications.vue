<template>
    <v-layout class="pt-5">
        <v-flex xs12 class="pt-3">
            <v-data-table
                v-bind:headers="headers"
                :items="items"
                item-key="id"
                class="elevation-1 pt-20"
                hide-actions
                dark
                >
                <template slot="items" slot-scope="props">
                    <td class="text-xs-center">{{ props.item.created_at | datetime }}</td>
                    <td class="text-xs-center">{{ props.item.battletag }}</td>
                    <td class="text-xs-center">{{ props.item.nickname }}</td>
                    <td class="text-xs-center">{{ props.item.class.title }}</td>
                    <td class="text-xs-center">{{ props.item.specialization.title }}</td>
                    <td class="text-xs-center"><a v-bind:href="props.item.armory_url" target="_blank">Link</a></td>
                    <td class="text-xs-center"><a v-bind:href="props.item.warcraftlogs_url" target="_blank">Link</a></td>
                    <td class="text-xs-center">
                        <v-btn flat icon color="blue" @click="selectApplication(props.item)">
                            <v-icon>pageview</v-icon>
                        </v-btn>
                    </td>
                    <td class="text-xs-center">

                        <v-btn v-if="props.item.is_approved === 1" disabled color="green">
                            Accepted
                        </v-btn>

                        <v-btn v-else-if="props.item.is_approved === 0" disabled color="red">
                            Denied
                        </v-btn>
                        <span v-else>
                            <v-btn flat icon color="green" @click="acceptApplication(props.item)">
                                <v-icon>check</v-icon>
                            </v-btn>
                            <v-btn flat icon color="red" @click="denyApplication(props.item)">
                                <v-icon>block</v-icon>
                            </v-btn>
                        </span>
                    </td>
                    <td class="text-xs-center">
                        <v-btn v-if="props.item.user" disabled flat dark color="green" >
                            Assigned to {{props.item.user.name}}
                        </v-btn>
                        <v-btn v-else flat dark color="orange" @click="assignToLoggedInUser(props.item)">
                            Assign to me
                        </v-btn>
                    </td>
                </template>
            </v-data-table>
            <v-dialog v-model="modalShown" transition="false" max-width="800px">
                <v-card>
                    <v-card-text>
                        <v-container grid-list-md>
                            <v-layout wrap>
                                <v-flex xs12>
                                    <v-text-field
                                     label="About yourself"
                                     v-model="selectedApplication.about"
                                     textarea
                                     required
                                     ></v-text-field>
                                </v-flex>
                                <v-flex xs12>
                                    <v-text-field
                                     label="Experience"
                                     v-model="selectedApplication.experience"
                                     textarea
                                     required
                                     ></v-text-field>
                                </v-flex>
                                <v-flex xs12>
                                    <v-text-field
                                     label="Previous guild"
                                     v-model="selectedApplication.previous_guild"
                                     textarea
                                     required
                                     ></v-text-field>
                                </v-flex>
                                <v-flex xs12>
                                    <v-text-field
                                     label="What are you looking for in the guild"
                                     v-model="selectedApplication.expectations_from_guild"
                                     textarea
                                     required
                                     ></v-text-field>
                                </v-flex>
                            </v-layout>
                        </v-container>
                    </v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn color="blue darken-1" flat dark @click="closeModal">Close</v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
            <v-snackbar
              :timeout="snackbarTimeout"
              :color="snackbarColor"
              v-model="snackbarShown"
              >
              {{ snackbarText }}
            </v-snackbar>
        </v-flex>
    </v-layout>
</template>

<script>
    export default {

        mounted() {
            this.fetchApplications();
        },

        methods: {
            fetchApplications()
            {
                this.$http.get('/api/admin/applications')
                .then(response => {

                    this.items = response.body;

                }, errorResponse => {



                });
            },

            selectApplication(application)
            {
                this.selectedApplication = application;

                this.modalShown = true;
            }, 

            acceptApplication(application)
            {
                this.$http.put('/api/admin/applications/' + application.id + '/accept')
                .then(response => {

                    this.snackbarText = 'Application accepted';
                    this.snackbarColor = 'green';
                    this.snackbarShown = true;

                    this.fetchApplications();

                }, errorResponse => {

                    this.snackbarText = 'Failed accepting application';
                    this.snackbarColor = 'red';
                    this.snackbarShown = true;

                });
            },

            denyApplication(application)
            {
                this.$http.put('/api/admin/applications/' + application.id + '/deny')
                .then(response => {

                    this.snackbarText = 'Application denied';
                    this.snackbarColor = 'green';
                    this.snackbarShown = true;

                    this.fetchApplications();

                }, errorResponse => {

                    this.snackbarText = 'Failed denying application';
                    this.snackbarColor = 'red';
                    this.snackbarShown = true;

                });
            },

            assignToLoggedInUser(application)
            {
                this.$http.put('/api/admin/applications/' + application.id + '/assign')
                .then(response => {

                    this.snackbarText = 'Application assigned';
                    this.snackbarColor = 'green';
                    this.snackbarShown = true;

                    this.fetchApplications();

                }, errorResponse => {

                    this.snackbarText = 'Failed assigning application';
                    this.snackbarColor = 'red';
                    this.snackbarShown = true;

                });
            },

            closeModal()
            {
                this.selectedApplication = {};

                this.modalShown = false;
            }
        },

        data() {
            return {
                modalShown: false,
                selectedApplication: {},
                headers: [
                    {
                        text: 'Applied At',
                        align: 'center',
                        value: 'created_at'
                    },
                    {
                        text: 'BattleTag',
                        align: 'center',
                        value: 'battletag'
                    },
                    {
                        text: 'Character Name',
                        align: 'center',
                        value: 'nickname'
                    },
                    {
                        text: 'Class',
                        align: 'center',
                        value: 'class_id'
                    },
                    {
                        text: 'Spec',
                        align: 'center',
                        value: 'specialization_id'
                    },
                    {
                        text: 'Armory',
                        align: 'center',
                        sortable: false,
                        value: 'amory_url'
                    },
                    {
                        text: 'Logs',
                        align: 'center',
                        sortable: false,
                        value: 'warcraftlogs_url'
                    },
                    {
                        text: 'Details',
                        align: 'center',
                        value: null,
                        sortable: false
                    },
                    {
                        text: 'Actions',
                        align: 'center',
                        value: null,
                        sortable: false
                    },
                    {
                        text: 'Status',
                        align: 'center',
                        value: null,
                        sortable: false
                    }
                ],
                snackbarTimeout: 5000,
                snackbarShown: false,
                snackbarText: '',
                snackbarColor: 'green',
                items: []
            }
        }
    }
</script>
