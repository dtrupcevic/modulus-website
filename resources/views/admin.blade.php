<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Modulus Admin</title>

        <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet">
        <link href='/css/vuetify.min.css' rel="stylesheet">
        <!-- <link href="https://unpkg.com/vuetify/dist/vuetify.min.css" rel="stylesheet"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    </head>
    <body>
        <div id="application">
            <v-app dark>
                <v-toolbar app dark color="primary" fixed>
                    <v-toolbar-title class="white--text">
                        <v-btn flat href="/">Modulus</a>
                    </v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-toolbar-items class="hidden-sm-and-down">
                        <v-btn flat to="/admin">Admin Dashboard</v-btn>
                        <v-btn flat to="/admin/posts">Posts</v-btn>
                        <v-btn flat to="/admin/applications">Applications</v-btn>
                        <v-btn flat to="/admin/recruitment">Recruitment</v-btn>
                        <v-btn flat to="/admin/team">Team</v-btn>
                        <v-btn flat to="/admin/streams">Streams</v-btn>
                        <v-btn flat href="/logout">Logout</v-btn>
                    </v-toolbar-items>
                </v-toolbar>
                <main>
                <v-content dark>
                    <v-container dark fluid>
                        <router-view></router-view>
                    </v-container>
                </v-content>
                </main>
                <v-footer class="blue">
                  <v-layout row wrap align-center>
                    <v-flex xs12>
                      <div class="white--text ml-3">
                          Modulus
                      </div>
                    </v-flex>
                  </v-layout>
                </v-footer>
            </v-app>
        </div>
    </body>
    <script src="{{ mix('js/admin/app.js') }}" charset="utf-8"></script>
</html>
