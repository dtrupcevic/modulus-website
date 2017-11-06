<template>
    <v-layout class="pt-5">
        <v-flex xs8 offset-xs2 class="pt-5">
            <v-data-table
                v-bind:headers="headers"
                :items="items"
                class="elevation-1 pt-5"
                hide-actions
                dark
                >
                <template slot="items" slot-scope="props">
                    <td class="text-xs-left">{{ props.item.nickname }}</td>
                    <td class="text-xs-left">{{ props.item.class.title }}</td>
                    <td class="text-xs-left">
                        <v-avatar size="32px">
                            <img v-bind:src="props.item.specialization.avatar_path"/>
                        </v-avatar>
                        {{ props.item.specialization.title }}
                    </td>
                    <td class="text-xs-left">{{ props.item.specialization.role.title }}</td>
                    <td class="text-xs-left">{{ props.item.rank.title }}</td>
                    <td class="text-xs-left">{{ props.item.flavor }}</td>
                    <td class="text-xs-left"><a v-bind:href="props.item.armory_url" target="_blank">Armory</a></td>
                    <td class="text-xs-left"><a v-bind:href="props.item.warcraftlogs_url" target="_blank">Logs</a></td>
                </template>
            </v-data-table>
        </v-flex>
    </v-layout>
</template>

<script>
    export default {
        mounted() {
            console.log('admin team mounted');

            this.$http.get('/api/team')
            .then(response => {

                this.items = response.body;

            }, errorResponse => {

                console.log(errorResponse);

            });
        },
        data() {
            return {
                headers: [
                    {
                        text: 'Nickname',
                        align: 'left',
                        value: 'nickname'
                    },
                    {
                        text: 'Class',
                        align: 'left',
                        value: 'class.title'
                    },
                    {
                        text: 'Spec',
                        align: 'left',
                        value: 'specialization.title'
                    },
                    {
                        text: 'Role',
                        align: 'left',
                        value: 'specialization.role.title'
                    },
                    {
                        text: 'Rank',
                        align: 'left',
                        value: 'rank.title'
                    },
                    {
                        text: 'Flavor',
                        align: 'left',
                        value: 'flavor'
                    },
                    {
                        text: 'Armory',
                        align: 'left',
                        value: 'armory_url'
                    },
                    {
                        text: 'Armory',
                        align: 'left',
                        value: 'armory_url'
                    }
                ],
                items: []
            }
        }
    }
</script>
