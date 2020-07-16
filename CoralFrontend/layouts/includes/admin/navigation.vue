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
      <v-btn icon :ripple="false">
        <v-icon class="mx-4" color="white" @click="logout"
          >mdi-exit-to-app</v-icon
        >
      </v-btn>
    </v-app-bar>
    <!-- mobile drawer starts-->
    <v-navigation-drawer v-model="drawer" app>
      <v-toolbar flat>
        <v-toolbar-title class="mr-12 align-center">
          <span class="title">Coral Crm</span>
        </v-toolbar-title>
      </v-toolbar>
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
    <!-- mobile drawer ends-->
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
        { text: "Go Back", icon: "mdi-home", link: "/" },
        {
          text: "Picklists Settings",
          icon: "mdi-clock",
          link: "/admin/settings/picklists"
        }
      ]
    };
  },
    methods: {
    logout() {
      this.$axios.post("logout").then(res => {
        if (res.status === 200) {
          router.push({ path: "login" });
        }
      });
    }
  }
};
</script>
<style lang="scss" scoped>
.v-btn:before {
  display: none;
}
</style>
