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
                dark
                right
                text
                to="Companies/add"
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
          <template #item.firstname="{ item }">
              <nuxt-link :to="{ name: 'index-companies-id', params: { id: item.id }}">{{ item.name }}</nuxt-link>
          </template>
        <template v-slot:item.actions="{ item }">
            <v-btn icon flat :to="{ name: 'index-companies-edit-id', params: { id: item.id }}">
              <v-icon color="secondary"> mdi-pencil</v-icon>
            </v-btn>
           <v-btn icon  @click="deleteItem(item.id)">
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
      search: '',
      headers: [
        {
          text: "Name",
          value: "name"
        },
        {
          text: "Address",
          value: "address"
        },
          {
          text: "City",
          value: "city"
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
    this.$axios.get('company').then(res => {
      if (res.status === 200) {
       this.items = res.data
      }
    });
  },
  methods: {
    deleteItem(item){
      this.$axios.delete(`company/${item}`).then(res => {
      if (res.status === 200) {
        this.$router.push({ name: 'index-companies'})
      }
    });
    }
  },
};
</script>
