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
      <v-btn
                color="pink"         
                right
                text
                to="Users/add"
              >
              Add New
              </v-btn>
    </v-card-title>
  <v-data-table
  :search="search"
    :headers="headers"
    :items="items"
    class="elevation-0"
    pagination.sync="pagination"
    :item-key="items.id"
  >     
          <template #item.name="{ item }">
              <nuxt-link :to="{ name: 'admin-users-id', params: { id: item.id }}">{{ item.name }}</nuxt-link>
          </template>
        <template v-slot:item.actions="{ item }">
            <v-btn icon flat :to="{ name: 'admin-users-edit-id', params: { id: item.id }}">
              <v-icon color="secondary"> mdi-pencil</v-icon>
            </v-btn>
           <v-btn icon  @click="deleteItem(item)">
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
      search:'',
      headers: [
        {
          text: "name",
          value: "name"
        },
        {
          text: "lastname",
          value: "lastname"
        },
          {
          text: "Adress",
          value: "adress"
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
    this.$axios.get('admin/users').then(res => {
      if (res.status === 200) {
       this.items = res.data
      }
    });
  }
};
</script>
