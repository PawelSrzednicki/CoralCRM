<template>
  <v-form v-model="valid" autocomplete="off">
    <v-row align="center" justify="center">
      <v-col cols="12">
      <v-toolbar dense flat>
      <v-toolbar-title>Title</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn outlined color="primary" :to="{ name: 'index-tickets-edit-id', params: { id: this.ticketId }}">
        Edit
      </v-btn>
       </v-toolbar>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="name"
          v-model="formData.name"
          readonly
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Creation Date"
          v-model="formData.creationDate"
          readonly
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <span
          v-if="formData.ticket_priority && formData.ticket_priority.length === 1"
        >
          <v-text-field
            label="Ticket Priority"
            v-model="formData.ticket_priority[0].value"
            readonly
          ></v-text-field>
        </span>
      </v-col>

      <v-col cols="6">
        <span
          v-if="
            formData.ticket_status &&
              formData.ticket_status.length === 1
          "
        >
          <v-text-field
            label="Ticket Status"
            v-model="formData.ticket_status[0].value"
            readonly
          ></v-text-field>
        </span>
      </v-col>
      
      <v-col cols="12">
        <v-text-field
          label="Description"
          v-model="formData.description"
          readonly
        ></v-text-field>
      </v-col>
    </v-row>
  </v-form>
</template>

<script>
export default {
  props: {
    contactId: {
      type: Number,
      required: false,
      default: ""
    }
  },
  data() {
    return {
      valid: false,
      formData: []
    };
  },

  methods: {},

  created() {
    if (this.ticketId) {
      this.$axios.get(`ticket/${this.ticketId}`).then(res => {
        console.log(res.data[0]);
        this.formData = res.data[0];
      });
    }
  }
};
</script>
<style lang="scss">
  .theme--light.v-label {
       color: #1E88E5;
   }   
</style>