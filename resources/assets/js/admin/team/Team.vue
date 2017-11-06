<template>
    <v-layout row wrap>
        <v-flex xs12>
            <v-btn small right color="primary" class="ml-3 mb-3" @click="createPlayer">
                <v-icon left dark>add</v-icon>
                Add Player
            </v-btn>
        </v-flex>
        <v-flex xs12>
            <v-data-table
                v-bind:headers="headers"
                :items="items"
                item-key="id"
                class="elevation-1 pt-20"
                hide-actions
                dark
                >
                <template slot="items" slot-scope="props">
                    <td class="text-xs-center">{{ props.item.nickname }}</td>
                    <td class="text-xs-center">{{ props.item.class.title }}</td>
                    <td class="text-xs-center">{{ props.item.specialization.title }}</td>
                    <td class="text-xs-center">{{ props.item.specialization.role.title }}</td>
                    <td class="text-xs-center">{{ props.item.rank.title }}</td>
                    <td class="text-xs-center">{{ props.item.flavor }}</td>
                    <td class="text-xs-center">{{ props.item.armory_url }}</td>
                    <td class="text-xs-center">{{ props.item.warcraftlogs_url }}</td>
                    <td class="text-xs-center">
                        <v-btn flat dark icon color="cyan" @click="editPlayer(props.item)">
                          <v-icon dark>edit</v-icon>
                        </v-btn>
                    </td>
                </template>
            </v-data-table>
        </v-flex>
        <v-dialog v-model="modalShown" persistent transition="false" max-width="800px">
            <v-card>
                <v-card-title>
                    <span v-if="selectedPlayer.id" class="headline">Edit Player</span>
                    <span v-else class="headline">Add Player</span>
                </v-card-title>
                <v-card-text>
                    <v-container grid-list-md>
                        <v-layout wrap>
                            <v-flex xs12>
                                <v-text-field
                                 label="Nickname"
                                 v-model="selectedPlayer.nickname"
                                 :error-messages="errors.nickname"
                                 required
                                 ></v-text-field>
                            </v-flex>
                            <v-flex xs12>
                                <v-select
                                 label="Class"
                                 required
                                 :items="classes"
                                 item-text="title"
                                 item-value="id"
                                 :error-messages="errors.class_id"
                                 v-model="selectedPlayer.class_id"
                                 @input="classSelected"
                                 ></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select
                                 label="Spec"
                                 required
                                 :items="selectedClassSpecs"
                                 item-text="title"
                                 item-value="id"
                                 :error-messages=(errors.specialization_id)
                                 v-model="selectedPlayer.specialization_id"
                                 ></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-select
                                 label="Guild Rank"
                                 required
                                 :items="ranks"
                                 item-text="title"
                                 item-value="id"
                                 :error-messages="errors.rank_id"
                                 v-model="selectedPlayer.rank_id"
                                 ></v-select>
                            </v-flex>
                            <v-flex xs12>
                                <v-text-field v-model="selectedPlayer.flavor" label="Flavor"></v-text-field>
                            </v-flex>
                            <v-flex xs12>
                                <v-text-field v-model="selectedPlayer.armory_url" label="Armory URL"></v-text-field>
                            </v-flex>
                            <v-flex xs12>
                                <v-text-field v-model="selectedPlayer.warcraftlogs_url" label="Warcraftlogs URL"></v-text-field>
                            </v-flex>
                        </v-layout>
                    </v-container>
                    <small>*indicates required field</small>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" flat dark @click.native="modalShown = false">Close</v-btn>
                    <v-btn v-if="selectedPlayer.id" dark color="blue darken-1" flat @click="updatePlayer">Update</v-btn>
                    <v-btn v-else color="blue darken-1" dark flat @click="storePlayer">Add</v-btn>
                    <v-btn v-if="selectedPlayer.id" dark color="red darken-1" flat @click.native="deleteConfirm = true">Delete</v-btn>
                </v-card-actions>
            </v-card>
            <v-snackbar
              :timeout="snackbarTimeout"
              :color="snackbarColor"
              v-model="snackbarShown"
              >
              {{ snackbarText }}
            </v-snackbar>
        </v-dialog>
        <v-dialog v-model="deleteConfirm">
            <v-card>
                <v-card-title class="headline">Please confirm</v-card-title>
                <v-card-text>Are you sure you want to delete this player?</v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="green darken-1" flat="flat" @click.native="deleteConfirm = false">Cancel</v-btn>
                    <v-btn color="red darken-1" flat="flat" @click="deletePlayer">Delete</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-layout>
</template>

<script>
    export default {
        mounted() {
            this.fetchPlayerList();

            this.$on(['player-updated', 'player-added', 'player-deleted'], function()
            {
                this.fetchPlayerList();
            });
        },
        methods: {

            fetchPlayerList()
            {
                this.$http.get('/api/admin/players')
                .then(response => {

                    this.items      = response.body.players;
                    this.classes    = response.body.classes;
                    this.ranks      = response.body.ranks;

                }, errorResponse => {

                        this.snackbarColor  = 'error';
                        this.snackbarText   = errorResponse.body.message || 'Failed updating player.';
                        this.snackbarShown  = true;
                });
            },

            editPlayer(player)
            {
                this.selectedPlayer = player;
                this.modalShown = true;
            },

            updatePlayer()
            {
                this.$http.put('/api/admin/players/' + this.selectedPlayer.id, this.selectedPlayer)
                    .then(response => {

                        this.snackbarColor = 'success';
                        this.snackbarText = response.body.nickname + ' added successfully.';
                        this.snackbarShown = true;

                        this.modalShown = false;

                        this.$emit('player-updated');

                    }, errorResponse => {

                        if(_.has(errorResponse, 'body') && _.has(errorResponse.body, 'errors'))
                        {
                            this.errors = errorResponse.body.errors;
                        }

                        this.snackbarColor  = 'error';
                        this.snackbarText   = errorResponse.body.message || 'Failed updating player.';
                        this.snackbarShown  = true;
                    });
            },

            createPlayer()
            {
                this.modalShown = true;
            },

            storePlayer()
            {
                this.$http.post('/api/admin/players', this.selectedPlayer)
                    .then(response => {

                        this.snackbarColor = 'success';
                        this.snackbarText = response.body.nickname + ' added successfully.';
                        this.snackbarShown = true;

                        this.modalShown = false;

                        this.$emit('player-added');

                    }, errorResponse => {

                        if(_.has(errorResponse, 'body') && _.has(errorResponse.body, 'errors'))
                        {
                            this.errors = errorResponse.body.errors;
                        }

                        this.snackbarColor  = 'error';
                        this.snackbarText   = errorResponse.body.message || 'Failed creating player.';
                        this.snackbarShown  = true;
                    });
            },

            deletePlayer()
            {
                this.$http.delete('/api/admin/players/' + this.selectedPlayer.id)
                    .then(response => {

                        this.deleteConfirm  = false;
                        this.modalShown     = false;
                        this.$emit('player-deleted');

                    }, errorResponse => {

                        this.deleteConfirm = false;
                        this.snackbarColor  = 'error';
                        this.snackbarText   = errorResponse.body.message || 'Failed deleting player';
                        this.snackbarShown  = true;

                    });

            },

            classSelected(selected)
            {
                let selectedClass = _.find(this.classes, {id : selected});

                if(!_.isEmpty(selectedClass) && _.has(selectedClass, 'specializations'))
                {
                    this.selectedClassSpecs = selectedClass.specializations;
                }
                else
                {
                    this.selectedClassSpecs = [];
                }
            },

            getEmptyPlayer()
            {
                return {
                    nickname: '',
                    class_id: 0,
                    rank_id: 0,
                    specialization_id: 0,
                    flavor: '',
                    armory_url: '',
                    warcraftlogs_url: ''
                };
            }
        },
        watch: {
            modalShown: function(val)
            {
                if(val == false)
                {
                    this.selectedPlayer = this.getEmptyPlayer();
                    this.errors = {};
                }
            }
        },
        data() {
            return {
                headers: [
                    {
                        text: 'Nickname',
                        align: 'center',
                        value: 'nickname'
                    },
                    {
                        text: 'Class',
                        align: 'center',
                        value: 'class.title'
                    },
                    {
                        text: 'Spec',
                        align: 'center',
                        value: 'specialization.title'
                    },
                    {
                        text: 'Role',
                        align: 'center',
                        value: 'specialization.role.title'
                    },
                    {
                        text: 'Rank',
                        align: 'center',
                        value: 'rank.title'
                    },
                    {
                        text: 'Flavor',
                        align: 'center',
                        value: 'flavor'
                    },
                    {
                        text: 'Armory',
                        align: 'center',
                        value: 'armory_url'
                    },
                    {
                        text: 'Logs',
                        align: 'center',
                        value: 'warcraftlogs_url'
                    },
                    {
                        text: '',
                        align: 'center',
                        value: null
                    }
                ],
                errors: {},
                selectedPlayer: this.getEmptyPlayer(),
                selectedClassSpecs: [],
                items: [],
                modalShown: false,
                deleteConfirm: false,
                classes: [],
                ranks: [],
                snackbarShown: false,
                snackbarTimeout: 5000,
                snackbarText: '',
                snackbarColor: 'info'
            }
        }
    }
</script>
