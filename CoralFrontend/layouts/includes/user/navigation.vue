<template>
  <fragment>
    <v-app-bar app clipped-left dense color="blue accent-4">
      <v-app-bar-nav-icon
        @click.stop="drawer = !drawer"
        :ripple="false"
        color="white"
      ></v-app-bar-nav-icon>
      <v-toolbar-title class="mr-12 align-center">
        <span class="white--text text--darken-3">Coral</span>
        <span class="pl-1 font-weight-light  white--text text--darken-3"
          >CRM</span
        >
      </v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn icon :ripple="false" v-if="$auth.user.admin" to="admin">
        <v-icon class="mx-4" color="white">mdi-cog</v-icon>
      </v-btn>
      <v-btn icon :ripple="false">
        <v-icon class="mx-4" color="white" @click="logout"
          >mdi-exit-to-app</v-icon
        >
      </v-btn>
    </v-app-bar>
    <!-- mobile drawer starts -->
    <v-navigation-drawer v-model="drawer" app clipped>
      <v-list-group value="true" no-action v-model="profile" color="primary">
        <template v-slot:activator>
          <v-list-item-avatar>
            <v-img
              src="https://randomuser.me/api/portraits/women/85.jpg"
            ></v-img>
          </v-list-item-avatar>
          <v-list-item-content>
            <v-list-item-title>{{ $auth.user.name }}</v-list-item-title>
          </v-list-item-content>
        </template>
        <v-list-item to="/profile">
          <v-list-item-icon>
            <v-icon>mdi-account</v-icon>
          </v-list-item-icon>
          <v-list-item-title>Profile</v-list-item-title>
        </v-list-item>
      </v-list-group>
      <v-divider></v-divider>
      <v-list shaped>
        <v-list-item-group color="primary">
          <v-list-item v-for="(item, i) in items" :key="i" :to="item.link">
            <v-list-item-icon>
              <v-icon v-text="item.icon"></v-icon>
            </v-list-item-icon>
            <v-list-item-content>
              <v-list-item-title v-text="item.text"></v-list-item-title>
            </v-list-item-content>
          </v-list-item>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>
    <!-- mobile drawer ends -->
  </fragment>
</template>

<script>
export default {
  data() {
    return {
      drawer: false,
      profile: false,
      item: 1,
      items: [
        { text: "Home", icon: "mdi-home", link: "/" },
        { text: "Contacts", icon: "mdi-clock", link: "/Contacts" },
        { text: "Companies", icon: "mdi-account", link: "/companies" },
        { text: "Calendar", icon: "mdi-flag", link: "/calendar" },
        { text: "Leads", icon: "mdi-flag", link: "/leads" },
        { text: "Tasks", icon: "mdi-flag", link: "/tasks" },
        { text: "Tickets", icon: "mdi-flag", link: "/tickets" }
      ]
    };
  },
  methods: {
    logout() {
      this.$auth.logout();
    }
  }
};
</script>
<style lang="scss" scoped>
.v-btn:before {
  display: none;
}
</style>
