<template>
  <v-data-table
    :headers="headers"
    :items="items"
    class="elevation-0"
    pagination.sync="pagination"
    :item-key="items.id"
  >     
          <template #item.firstname="{ item }">
              <nuxt-link :to="{ name: 'index-contacts-id', params: { id: item.id }}">{{ item.firstname }}</nuxt-link>
          </template>
        <template v-slot:item.actions="{ item }">
            <v-btn icon flat :to="{ name: 'index-contacts-edit-id', params: { id: item.id }}">
              <v-icon> mdi-pencil</v-icon>
            </v-btn>
           <v-btn icon  @click="deleteItem(item)">
              <v-icon> mdi-delete</v-icon>
            </v-btn>
      </template>
  </v-data-table>
</template>

<script>
export default {
  data() {
    return {
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
      items: [],
    };
  },
  created() {
    this.$axios.get('contact').then(res => {
      if (res.status === 200) {
       this.items = res.data
      }
    });
  }
};
</script>
