<template>
  <v-card class=" transparent" outlined>
    <v-data-table
      :headers="headers"
      :items="items"
      sort-by="calories"
      >
      <template v-slot:top>
        <v-toolbar flat>
          <v-toolbar-title>{{ PicklistData }}</v-toolbar-title>
          <v-spacer></v-spacer>
          <v-dialog v-model="dialog" max-width="500px">
            <template v-slot:activator="{ on, attrs }">
              <v-btn color="primary" dark class="mb-2" v-bind="attrs" v-on="on"
                >New Item</v-btn
              >
            </template>
            <v-card>
              <v-card-title>
                <span class="headline">{{ formTitle }}</span>
              </v-card-title>
              <v-card-text>
                <v-container>
                  <v-row>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field
                        v-model="editedItem.value"
                        label="Value"
                      ></v-text-field>
                    </v-col>
                    <v-col cols="12" sm="6" md="4">
                      <v-text-field
                        v-model="editedItem.description"
                        label="Description"
                      ></v-text-field>
                    </v-col>
                  </v-row>
                </v-container>
              </v-card-text>

              <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" text @click="close">Cancel</v-btn>
                <v-btn color="blue darken-1" text @click="save">Save</v-btn>
              </v-card-actions>
            </v-card>
          </v-dialog>
        </v-toolbar>
      </template>
      <template v-slot:item.actions="{ item }">
        <v-icon small class="mr-2" @click="editItem(item)">
          mdi-pencil
        </v-icon>
        <v-icon small @click="deleteItem(item)">
          mdi-delete
        </v-icon>
      </template>
    </v-data-table>
  </v-card>
</template>

<script>
export default {
  props: {
    PicklistData: {
      type: String,
      required: false,
      default: ""
    }
  },
  data() {
    return {
      headers: [
        {
          text: "Name",
          value: "value"
        },
        {
          text: "Description",
          value: "description"
        },
        {
          text: "Actions",
          value: "actions"
        }
      ],
      items: [],
      dialog: false,
      editedIndex: -1,
      editedItem: {},
    };
  },
  methods: {
    loadItems() {
      this.items = [];
      this.$axios
        .get(`api/admin/picklist/${this.PicklistData}`)
        .then(response => {
          this.items = response.data;
        })
        .catch(error => {
          console.log(error);
        });
    },
    close() {
      this.dialog = false;
      this.$nextTick(() => {
        this.editedItem = Object.assign({}, this.defaultItem);
        this.editedIndex = -1;
      });
    },
    add() {
        let payload = {
          value: this.editedItem.value,
          description: this.editedItem.description,
        }
        this.$axios.post(`api/admin/picklist/${this.PicklistData}/add`,payload).then(res => {
          if (res.status === 200) {
              console.log('succes');
               this.loadItems();
          }
        });
    },
     save () {
      if (this.editedIndex > -1) {
        this.editItem(this.editedItem);
      } else {
        this.add();
      }
      this.close()
    },
    editItem(item) {
      this.editedIndex = this.items.indexOf(item);
      this.editedItem = Object.assign({},item);
      this.dialog = true;
      let payload = {
        value:   this.editedItem.value,
        description:   this.editedItem.description,
      }
      this.$axios.patch(`api/admin/picklist/${this.PicklistData}/${this.editedItem.id}/update`,payload).then(res => {
          if (res.status === 200) {
               console.log('succes');
                this.loadItems();
          }
      });
    },

    deleteItem(item) {
      const index = this.items.indexOf(item);
      confirm("Are you sure you want to delete this item?");
      this.$axios.delete(`api/admin/picklist/${this.PicklistData}/${item.id}/delete`, item.id).then(res => {
          if (res.status === 200) {
            this.loadItems();
          }
      });
    }
  },
  watch: {
    PicklistData(val) {
      this.loadItems(val);
    }
  },
  computed: {
    formTitle() {
      return this.editedIndex === -1 ? "New Item" : "Edit Item";
    }
  }
};
</script>
