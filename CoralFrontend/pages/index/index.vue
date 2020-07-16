<template>
<fragment>
  <v-row>
    <v-col cols="12">
      <v-card>
        <v-card-text>
          <p>
            Welcome back
            <span class="primary--text">{{ $auth.user.name }}</span>
          </p>
          <div>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur
            viverra faucibus tortor sed iaculis. Donec id luctus orci. Etiam ut
            sagittis tellus. In et erat ut mauris ultricies ullamcorper et sed
            ante. Cras velit eros, finibus ut augue et, tincidunt varius nibh.
            Maecenas sit amet erat quis lectus dapibus lacinia. Nam hendrerit
            facilisis justo, a dictum ex convallis ac. Curabitur pretium in est
            non ornare. Vestibulum purus neque, dignissim et lobortis aliquam,
            sollicitudin ut ex. Sed vitae laoreet neque.
          </div>
        </v-card-text>
      </v-card>
    </v-col>
  </v-row>
  <v-row>
    <v-col cols="12" sm="12" md="4" lg="4" xl="4">
      <v-card>
        <div class="d-flex flex-no-wrap">
          <v-avatar size="125" tile color="blue darken-3">
            <v-icon color="white" size="50">mdi-account-outline</v-icon>
          </v-avatar>
          <div>
            <v-card-title class="headline">{{randomNumber()}}</v-card-title>

            <v-card-text>New Users</v-card-text>
          </div>
        </div>
      </v-card>
    </v-col>
        <v-col cols="12" sm="12" md="4" lg="4" xl="4">
      <v-card>
        <div class="d-flex flex-no-wrap">
          <v-avatar size="125" tile color="yellow darken-3">
            <v-icon color="white" size="50">mdi-bell-outline</v-icon>
          </v-avatar>
          <div>
            <v-card-title class="headline">{{randomNumber()}}</v-card-title>

            <v-card-text>New Notifications</v-card-text>
          </div>
        </div>
      </v-card>
    </v-col>
        <v-col cols="12" sm="12" md="4" lg="4" xl="4">
      <v-card>
        <div class="d-flex flex-no-wrap">
          <v-avatar size="125" tile color="red darken-3">
            <v-icon color="white" size="50">mdi-alert-outline</v-icon>
          </v-avatar>
          <div>
            <v-card-title class="headline">{{randomNumber()}}</v-card-title>

            <v-card-text>New Tickets</v-card-text>
          </div>
        </div>
      </v-card>
    </v-col>
    </v-row>
    <v-row>
    <v-col cols="12">
      <v-card class="mt-4 mx-auto">
        <v-sheet
          class="v-sheet--offset mx-auto"
          color="cyan"
          elevation="12"
          max-width="calc(100% - 32px)"
        >
          <v-sparkline
            :labels="labels"
            :value="value"
            color="white"
            line-width="2"
            padding="16"
          ></v-sparkline>
        </v-sheet>

        <v-card-text class="pt-0">
          <div class="title font-weight-light mb-2">User Registrations</div>
          <div class="subheading font-weight-light grey--text">
            Last Campaign Performance
          </div>
          <v-divider class="my-2"></v-divider>
          <v-icon class="mr-2" small>
            mdi-clock
          </v-icon>
          <span class="caption grey--text font-weight-light"
            >last registration 26 minutes ago</span
          >
        </v-card-text>
      </v-card>
    </v-col>
</v-row>
  </fragment>
</template>
<script>
  export default {
    data: () => ({
      labels: [
        '12am',
        '3am',
        '6am',
        '9am',
        '12pm',
        '3pm',
        '6pm',
        '9pm',
      ],
      value: [
        200,
        675,
        410,
        390,
        310,
        460,
        250,
        240,
      ],
    }),
     methods: {
    randomNumber : function(){
      return Math.floor(Math.random() * (10 - 1 + 1)) + 1;
    }
     }
  }
</script>