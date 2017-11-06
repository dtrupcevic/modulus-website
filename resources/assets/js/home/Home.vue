<template>
<v-content>
    <section>
      <v-parallax src="assets/background.jpg" height="400">
        <v-layout dark
          column
          align-center
          justify-center
          class="white--text"
        >
          <img src="assets/horde.png" alt="Horde" height="200">
          <h1 class="white--text mb-2 display-1 text-xs-center">Modulus</h1>
          <h2 class="white--text mb-2 display-1 text-xs-center">Stormscale EU</h2>
          <v-btn
            class="green lighten-2 mt-5"
            dark
            large
            to="/apply"
          >
           Apply Now 
          </v-btn>
        </v-layout>
      </v-parallax>
    </section>

    <section>
      <v-layout
        column
        wrap
        class="my-5"
        align-center
      >
        <v-flex xs12 sm4 class="my-3">
          <div class="text-xs-center">
            <h2 class="headline">A World of Warcraft guild @ Stormscale EU</h2>
            <span class="subheading">
                Join us before we're gone - in limited supply
            </span>
          </div>
        </v-flex>
        <v-flex xs12>
          <v-container dark grid-list-xl>
            <v-layout dark row wrap align-center>
              <v-flex xs12 md4>
                <v-card class="elevation-0 transparent">
                  <v-card-text class="text-xs-center">
                    <v-icon x-large class="blue--text text--lighten-2">accessible</v-icon>
                  </v-card-text>
                  <v-card-title primary-title class="layout justify-center">
                    <div class="headline text-xs-center">Accessible</div>
                  </v-card-title>
                  <v-card-text>
                      We're all practically retards extraordinare - so you're pretty much guaranteed
                      to fit right in no matter how badly you behave. We like to bash each other with
                      insults and in our spare time we also fight cancer because fuck cancer. Fuck it really hard.
                  </v-card-text>
                </v-card>
              </v-flex>
              <v-flex xs12 md4>
                <v-card class="elevation-0 transparent">
                  <v-card-text class="text-xs-center">
                    <v-icon x-large class="blue--text text--lighten-2">face</v-icon>
                  </v-card-text>
                  <v-card-title primary-title class="layout justify-center">
                    <div class="headline">Awesome Community</div>
                  </v-card-title>
                  <v-card-text>
                      We can safely say we play better than most people and our private logs prove that.
                      No you can't see our logs - they're private. You'll just have to trust us. We also value
                      social interaction and take special care of our social members - they're regularly boosting
                      our core raiders absolutely free of charge.
                  </v-card-text>
                </v-card>
              </v-flex>
              <v-flex xs12 md4>
                <v-card class="elevation-0 transparent">
                  <v-card-text class="text-xs-center">
                    <v-icon x-large class="blue--text text--lighten-2">trending_up</v-icon>
                  </v-card-text>
                  <v-card-title primary-title class="layout justify-center">
                    <div class="headline text-xs-center">Unparalleled progress</div>
                  </v-card-title>
                  <v-card-text>
                      We regularly clear normal, heroic and sometimes even mythic (!!!) level of content.
                      We kill bossess quickly and easily, with minimal mistakes after a few hundred wipes.
                      We could wipe more, but our raid leader tends to get upset so we eventually get things
                      right to stop the bleeding in our ears.
                  </v-card-text>
                </v-card>
              </v-flex>
            </v-layout>
          </v-container>
        </v-flex>
      </v-layout>
    </section>

    <section>
      <v-container grid-list-xl>
        <v-layout row wrap justify-center class="my-5">
          <v-flex xs12 sm4>
            <v-card class="elevation-0 transparent">
              <v-card-title primary-title class="layout justify-center">
                <div class="headline">Guild Info</div>
              </v-card-title>
              <v-card-text>
                  A bit of content about the guild should go here
              </v-card-text>
            </v-card>
          </v-flex>
          <v-flex xs12 sm4 offset-sm1>
            <v-card class="elevation-0 transparent">
              <v-card-title primary-title class="layout justify-center">
                  <div class="headline">Raid Times</div>
              </v-card-title>
              <v-list class="transparent">
                <v-list-tile>
                  <v-list-tile-action>
                    <v-icon class="blue--text text--lighten-2">today</v-icon>
                  </v-list-tile-action>
                  <v-list-tile-content>
                    <v-list-tile-title>Wednesday, Thursday and Sunday</v-list-tile-title>
                  </v-list-tile-content>
                </v-list-tile>
                <v-list-tile>
                  <v-list-tile-action>
                    <v-icon class="blue--text text--lighten-2">timer</v-icon>
                  </v-list-tile-action>
                  <v-list-tile-content>
                    <v-list-tile-title>Raid start at 20:00 Server Time</v-list-tile-title>
                  </v-list-tile-content>
                </v-list-tile>
                <v-list-tile>
                  <v-list-tile-action>
                    <v-icon class="blue--text text--lighten-2">timer_off</v-icon>
                  </v-list-tile-action>
                  <v-list-tile-content>
                    <v-list-tile-title>Raid end at 22:30 Server Time</v-list-tile-title>
                  </v-list-tile-content>
                </v-list-tile>
              </v-list>
            </v-card>
          </v-flex>
        </v-layout>
      </v-container>
    </section>
</v-content>
</template>

<script>
    export default {
        mounted() {
            console.log('Home mounted.')
        }
    }
</script>
