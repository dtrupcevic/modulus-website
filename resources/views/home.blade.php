<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Modulus - Stormscale - EU</title>

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
                        <v-btn flat class="green lighten-2" to="/apply">Apply</v-btn>
                        <v-btn flat to="/team">Team</v-btn>
                        <v-btn flat to="/streams">Streams</v-btn>
                        <v-btn flat to="/discord">Discord</v-btn>
                        @if(Auth::check())
                            <v-btn flat href="/admin">Login</v-btn>
                        @else
                            <v-btn flat href="/login">Login</v-btn>
                        @endif
                    </v-toolbar-items>
                </v-toolbar>
                <main>
                <v-content dark class="pt-0">
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
    <script src="{{ mix('js/app.js') }}" charset="utf-8"></script>
</html>
