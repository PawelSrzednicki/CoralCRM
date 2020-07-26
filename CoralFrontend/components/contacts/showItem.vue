<template>
  <v-form v-model="valid" autocomplete="off">
    <v-row align="center" justify="center">
      <v-col cols="12">
      <v-toolbar dense flat>
      <v-toolbar-title>Contact details of {{formData.firstname}}</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn outlined color="primary" :to="{ name: 'index-contacts-edit-id', params: { id: this.contactId }}">
        Edit
      </v-btn>
       </v-toolbar>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Firstname"
          v-model="formData.firstname"
          readonly
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Surname"
          v-model="formData.lastname"
          readonly
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Address"
          v-model="formData.address"
          readonly
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Phone"
          v-model="formData.phone"
          readonly
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Email"
          v-model="formData.email"
          readonly
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="City"  
          v-model="formData.city"
          readonly
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Zip-Code"
          v-model="formData.zip"
          readonly
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <span
          v-if="formData.contactstatus && formData.contactstatus.length === 1"
        >
          <v-text-field
            label="Contact Status"
            v-model="formData.contactstatus[0].value"
            readonly
          ></v-text-field>
        </span>
      </v-col>

      <v-col cols="6">
        <span
          v-if="
            formData.contactleadstatus &&
              formData.contactleadstatus.length === 1
          "
        >
          <v-text-field
            label="Contact Lead Status"
            v-model="formData.contactleadstatus[0].value"
            readonly
          ></v-text-field>
        </span>
      </v-col>

      <v-col cols="6">
        <span
          v-if="formData.lifecyclestage && formData.lifecyclestage.length === 1"
        >
          <v-text-field
            label="Lifecyclestage"
            v-model="formData.lifecyclestage[0].value"
            readonly
          ></v-text-field>
        </span>
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
    if (this.contactId) {
      this.$axios.get(`contact/${this.contactId}`).then(res => {
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