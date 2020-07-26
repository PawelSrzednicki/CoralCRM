<template>
  <v-form v-model="valid" autocomplete="off">
    <v-row align="center" justify="center">
      <v-col cols="12">
      <v-toolbar dense flat>
      <v-toolbar-title>{{formData.name}}</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn outlined color="primary" :to="{ name: 'index-calendar-edit-id', params: { id: this.eventId }}">
        Edit
      </v-btn>
       </v-toolbar>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Name"
          v-model="formData.name"
          readonly
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Start Date"
          v-model="formData.startDate"
          readonly
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="End Date"
          v-model="formData.endDate"
          readonly
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <span
          v-if="formData.event_type && formData.event_type.length === 1"
        >
          <v-text-field
            label="event Type"
            v-model="formData.event_type[0].value"
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
    eventId: {
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
    if (this.eventId) {
      this.$axios.get(`event/${this.eventId}`).then(res => {
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