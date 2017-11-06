<template>
    <v-layout class="pt-5">
        <v-flex xs6 offset-xs3 class="pt-5">
            <v-card>
                <v-card-title>
                   Recruitment 
                    <v-spacer></v-spacer>
                    <v-text-field
                       append-icon="search"
                       label="Search"
                       single-line
                       hide-details
                       v-model="search"
                       ></v-text-field>
                </v-card-title>
            </v-card>
            <v-data-table
                v-bind:headers="headers"
                :items="items"
                item-key="id"
                class="elevation-1 pt-20"
                v-bind:search="search"
                :filter="filterRecruitment"
                hide-actions
                dark
                >
                <template slot="items" slot-scope="props">
                    <td class="text-xs-center">{{ props.item.class.title }}</td>
                    <td class="text-xs-center">
                        {{ props.item.specialization.title }}
                        <v-avatar size="32px">
                            <img v-bind:src="props.item.specialization.avatar_path"/>
                        </v-avatar>
                    </td>
                    <td class="text-xs-center">{{ props.item.priority.title }}</td>
                    <td class="text-xs-center">
                         <v-slider min="1" max="3" step="1" v-model="props.item.priority_id" @input="updateRecruitmentPriority(props.item)"></v-slider>
                    </td>
                </template>
            </v-data-table>
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

            this.loadRecruitments();

        },
        methods: {

            filterRecruitment(val, search)
            {
                return val.title !== null && ['undefined', 'boolean'].indexOf(typeof val.title) === -1 && val.title.toString().toLowerCase().indexOf(search) !== -1;
            },

            loadRecruitments()
            {
                this.$http.get('/api/admin/recruitment')
                .then(response => {

                    this.items = response.body.recruitments;
                    this.priorities = response.body.priorities;

                }, errorResponse => {

                        this.snackbarColor = 'error';
                        this.snackbarText = 'Failed loading recruitment list.';
                        this.snackbarShown = true;

                });
            },

            updateRecruitmentPriority(recruitment)
            {
                this.$http.put('/api/admin/recruitment/' + recruitment.id, {priority_id: recruitment.priority_id})
                    .then(response => {

                        this.snackbarColor = 'success';
                        this.snackbarText = 'Status updated successfully';
                        this.snackbarShown = true;

                        recruitment.priority = _.find(this.priorities, {id: recruitment.priority_id});

                    }, errorResponse => {

                        this.snackbarColor = 'error';
                        this.snackbarText = 'Failed updating status';
                        this.snackbarShown = true;

                    });
            }
        },
        data() {
            return {
                headers: [
                    {
                        text: 'Class',
                        align: 'center',
                        value: 'item.class_id'
                    },
                    {
                        text: 'Spec',
                        align: 'center',
                        value: 'item.specialization_id'
                    },
                    {
                        text: 'Priority',
                        align: 'center',
                        value: 'priority_id',
                        sortable: false
                    },
                    {
                        text: 'Slide to update',
                        align: 'center',
                        value: null
                    }
                ],
                search: '',
                items: [],
                priorities: [],
                snackbarColor: '',
                snackbarText: '',
                snackbarTimeout: 5000,
                snackbarShown: false
            }
        }
    }
</script>
