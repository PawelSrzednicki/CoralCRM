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
      <v-btn color="pink" dark right text to="Calendar/add">
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
          :to="{ name: 'index-calendar-id', params: { id: item.id } }"
          >{{ item.name }}</nuxt-link
        >
      </template>
      <template v-slot:item.actions="{ item }">
        <v-btn
          icon
          flat
          :to="{ name: 'index-calendar-edit-id', params: { id: item.id } }"
        >
          <v-icon color="secondary"> mdi-pencil</v-icon>
        </v-btn>
        <v-btn icon @click="deleteItem(item)">
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
          value: "name"
        },
        {
          text: "Start Date",
          value: "start"
        },
        {
          text: "End Date",
          value: "end"
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
    this.$axios.get("event").then(res => {
      if (res.status === 200) {
        this.items = res.data;
      }
    });
  }
};
</script>
