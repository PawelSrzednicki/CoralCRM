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
          class="required"
          filled
          v-model="formData.firstname"
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Surname"
          filled
          v-model="formData.lastname"
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Address"
          class="required"
          filled
          v-model="formData.address"
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Phone"
          class="required"
          filled
          v-model="formData.phone"
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Email"
          class="required"
          filled
          v-model="formData.email"
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="City"
          filled
          v-model="formData.city"
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Zip-Code"
          filled
          v-model="formData.zip"
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <span
          v-if="formData.contactstatus && formData.contactstatus.length === 1"
        >
          <v-text-field
            label="Contact Status"
            filled
            v-model="formData.contactstatus[0].value"
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
            filled
            v-model="formData.contactleadstatus[0].value"
          ></v-text-field>
        </span>
      </v-col>

      <v-col cols="6">
        <span
          v-if="formData.lifecyclestage && formData.lifecyclestage.length === 1"
        >
          <v-text-field
            label="Lifecyclestage"
            filled
            v-model="formData.lifecyclestage[0].value"
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
