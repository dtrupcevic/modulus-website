<template>
    <v-layout class="pt-5">
        <v-flex xs4 class="pt-5">
            <v-card>
                <v-toolbar color="grey" dark>
                    <v-toolbar-title>Currently Recruiting</v-toolbar-title>
                </v-toolbar>
                <v-list>
                    <v-list-tile clas="ml-0" avatar v-for="item in recruiting" v-bind:key="item.priority_id" @click="">
                        <v-list-tile-action>
                            <v-icon v-if="item.priority.id == 1" large color="red">trending_down</v-icon>
                            <v-icon v-if="item.priority.id == 2" large color="yellow">trending_flat</v-icon>
                            <v-icon v-if="item.priority.id == 3" large color="green">trending_up</v-icon>
                        </v-list-tile-action>
                        <v-list-tile-content class="ml-3">
                            <v-list-tile-title v-text="item.specialization.title + ' ' + item.class.title"></v-list-tile-title>
                        </v-list-tile-content>
                        <v-list-tile-avatar>
                            <img v-bind:src="item.specialization.avatar_path"/>
                        </v-list-tile-avatar>
                    </v-list-tile>
                </v-list>
            </v-card>
        </v-flex>
        <v-flex xs7 offset-xs1 class="pt-5">
            <v-alert v-if="application_submitted" color="success" dissmissable icon="check_circle" value="true">
                Your application has been submitted. We'll review it and get back to you.
            </v-alert>
            <v-form v-else ref="form">
                <v-text-field
                label="BattleTag"
                v-model="application.battletag"
                :error-messages="errors.battletag"
                required
                hint="So we can contact you ingame"
                ></v-text-field>

                <v-text-field
                label="Character Name"
                v-model="application.nickname"
                :error-messages="errors.nickname"
                required
                ></v-text-field>

                <v-select
                label="Class"
                v-model="application.class_id"
                item-value="id"
                item-text="title"
                :items="classes"
                :error-messages="errors.class_id"
                @input="selectClass"
                required
                ></v-select>

                <v-select
                label="Spec"
                v-model="application.specialization_id"
                item-value="id"
                item-text="title"
                :items="selectedClass.specializations"
                :error-messages="errors.specialization_id"
                required
                ></v-select>

                <v-text-field
                label="Armory URL"
                v-model="application.armory_url"
                :error-messages="errors.armory_url"
                required
                ></v-text-field>

                <v-text-field
                label="Warcraftlogs URL"
                v-model="application.warcraftlogs_url"
                :error-messages="errors.warcraftlogs_url"
                required
                ></v-text-field>

                <v-text-field
                v-model="application.about"
                label="Tell us about yourself!"
                :error-messages="errors.about"
                rows="5"
                hint="Age, occupation, hobbies etc."
                required
                textarea
                ></v-text-field>

                <v-text-field
                v-model="application.experience"
                label="Experience"
                :error-messages="errors.experience"
                rows="5"
                hint="Please write a bit about your previous raiding experience"
                required
                textarea
                ></v-text-field>

                <v-text-field
                v-model="application.previous_guild"
                label="What were your previous guilds and why did you leave?"
                :error-messages="errors.previous_guild"
                rows="5"
                required
                textarea
                ></v-text-field>

                <v-text-field
                v-model="application.expectations_from_guild"
                label="What are you looking for in the guild?"
                :error-messages="errors.expectations_from_guild"
                rows="5"
                required
                textarea
                ></v-text-field>

                <v-switch
                label="I'm able to achieve close to 100% attendance on our progress raids(Wed/Thur/Sun 20:00-22:30 server time)?"
                true-value="1"
                false-value="0"
                v-model="application.can_attend" dark
                ></v-switch>

                <v-btn
                @click="submitApplication"
                >
                    Submit
                </v-btn>
            </v-form>
        </v-flex>
    </v-layout>
</template>

<script>
    export default {
        mounted() {
            this.getRecruitment();
            this.getClasses();
        },
        methods: {
            getRecruitment()
            {
                this.$http.get('/api/recruitment')
                .then(response => {

                    this.recruiting = response.body;

                }, errorResponse => {

                    console.log(errorResponse);

                });
            },

            getClasses()
            {
                this.$http.get('/api/classes')
                .then(response => {

                    this.classes = response.body;

                }, errorResponse =>  {

                    console.log(errorResponse);

                });
            },

            selectClass(selected)
            {
                let selectedClass = _.find(this.classes, {id : selected});

                this.selectedClass = selectedClass;
            },

            submitApplication()
            {
                this.$http.post('/api/application', this.application)
                .then(response => {

                    this.application_submitted = true;

                }, errorResponse => {

                    if(_.has(errorResponse.body, 'errors'))
                    {
                        this.errors = errorResponse.body.errors;
                    }

                })
            }
        },
        data() {
            return {
                application: {},
                errors: {},
                application_submitted: false,
                classes: [],
                selectedClass: {},
                recruiting: []
            }
        }
    }
</script>
