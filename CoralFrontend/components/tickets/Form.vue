<template>
  <v-form v-model="valid" autocomplete="off">
    <v-row align="center" justify="center">
      <v-col cols="12" v-if="!ticketId">* - these fields are required
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Name"
          class="pb-2"
          v-model="formData.name"
          :class="ticketId ? 'required' : ''"
        ></v-text-field>
        <span class="subtitle warning--text" v-if="error">{{error.name}}</span>
      </v-col>
      <v-col cols="6">
        <v-v-date-picker
          label="Creation Date"
          v-model="formData.creationDate"
        ></v-v-date-picker>
      </v-col>
      <v-col cols="6">
        <v-select
          :items="picklists.ticket_status"
          label="Ticket Status"
          item-text="value"
          item-value="id"
          v-model="formData.ticket_status"
        >
        <template v-slot:label>
        <div v-if="formData.ticket_status && formData.ticket_status.length === 1">
             {{formData.ticket_status[0].value}}
        </div>
        <div v-else>
            Contact Status
        </div>
        </template>
        </v-select>
      </v-col>

      <v-col cols="6">
        <v-select
          :items="picklists.ticket_priority"
          label="Ticket Priority"
          item-text="value"
          item-value="id"
          v-model="formData.ticket_priority">
       <template v-slot:label>
        <div v-if="formData.ticket_priority && formData.ticket_priority.length === 1">
             {{formData.ticket_priority}}
        </div>
        <div v-else>
            Lifecycle stage
        </div>
        </template>
        </v-select>
      </v-col>
        <v-col cols="12">
        <v-text-field
          label="Description"
          v-model="formData.address"
        ></v-text-field>
      </v-col>
    </v-row>
    <v-btn color="blue darken-1" text @click="save">Save</v-btn>
  </v-form>
</template>

<script>
export default {
  props: {
    ticketId: {
      type: Number,
      required: false,
      default: ""
    }
  },
  data() {
    return {
      valid: false,
      picklists: [],
      formData: [],
      error: ''
    };
  },

  methods: {
    save() {
      if (this.ticketId) {
        this.editItem(this.ticketId);
      } else {
        this.add();
      }
    },
    add() {
      let payload = this.formData;
      return this.$axios
        .post("ticket", payload)
        .then(res => {
            console.log(res);
            this.$router.push({ name: 'index-tickets'})
        })
         .catch(e => {
          console.log(e);
          this.error = e.response ? e.response.data.errors : e.toString();
        });
    },
    editItem(item) {
       let payload = this.formData;
        return this.$axios
        .put(`ticket/${item}`, payload)
        .then(res => {
            console.log(res);
            this.$router.push({ name: 'index-tickets'})
        })
         .catch(e => {
          console.log(e);
          this.error = e.response ? e.response.data.errors : e.toString();
        });
    }
  },

  created() {
    this.$axios.get("ticket/create").then(res => {
      if (res.status === 200) {
        this.picklists = res.data;
      }
    });

    if (this.ticketId) {
      this.$axios.get(`ticket/${this.ticketId}`).then(res => {
       console.log(res.data[0]);  
       this.formData = res.data[0];  
    });
    }
  }
};
</script>
