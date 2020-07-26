<template>
  <v-card flat>
    <v-card-title>
      <v-text-field
        v-model="search"
        append-icon="mdi-magnify"
        label="Search"
        single-line
        hide-details
        class="shrink mx-10"
      ></v-text-field>
      <v-spacer></v-spacer>
      <v-btn color="pink" dark right text to="Contacts/add">
        Add New
      </v-btn>
    </v-card-title>
    <v-data-table
      :headers="headers"
      :items="items"
      class="elevation-0"
      pagination.sync="pagination"
      :item-key="items.id"
      :search="search"
    >
      <template #item.firstname="{ item }">
        <nuxt-link
          :to="{ name: 'index-contacts-id', params: { id: item.id } }"
          >{{ item.firstname }}</nuxt-link
        >
      </template>
      <template v-slot:item.actions="{ item }">
        <v-btn
          icon
          text
          :to="{ name: 'index-contacts-edit-id', params: { id: item.id } }"
        >
          <v-icon color="secondary"> mdi-pencil</v-icon>
        </v-btn>
        <v-btn icon @click="deleteItem(item.id)">
          <v-icon color="warning"> mdi-delete</v-icon>
        </v-btn>
      </template>
    </v-data-table>
  </v-card>
</template>

<script>
export default {
  data() {
    return {
      search: "",
      headers: [
        {
          text: "Name",
          value: "firstname"
        },
        {
          text: "Surname",
          value: "lastname"
        },
        {
          text: "Address",
          value: "address"
        },
        {
          text: "Email",
          value: "email"
        },
        {
          text: "Actions",
          value: "actions"
        }
      ],
      items: []
    };
  },
  created() {
    this.$axios.get("contact").then(res => {
      if (res.status === 200) {
        this.items = res.data;
      }
    });
  },
  methods: {
    deleteItem(item) {
      this.$axios.delete(`contact/${item}`).then(res => {
        if (res.status === 200) {
          this.$router.push({ name: "index-contacts" });
        }
      });
    }
  }
};
</script>
