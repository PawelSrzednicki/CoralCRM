<template>
  <v-form v-model="valid" autocomplete="off">
    <v-row align="center" justify="center">
      <v-col cols="12">
      <v-toolbar dense flat>
      <v-toolbar-title>{{formData.name}}</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn outlined color="primary" :to="{ name: 'index-companies-edit-id', params: { id: this.companyId }}">
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
          label="Zip"
          v-model="formData.zip"
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
          label="Website"
          v-model="formData.website"
          readonly
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <span
          v-if="formData.company_status && formData.company_status.length === 1"
        >
          <v-text-field
            label="Company Status"
            v-model="formData.company_status[0].value"
            readonly
          ></v-text-field>
        </span>
      </v-col>

      <v-col cols="6">
        <span
          v-if="
            formData.industry &&
              formData.industry.length === 1
          "
        >
          <v-text-field
            label="Industry"
            v-model="formData.industry[0].value"
            readonly
          ></v-text-field>
        </span>
      </v-col>
         <v-col cols="12">
        <v-textarea
          label="Description"
          v-model="formData.description"
          readonly
        ></v-textarea>
      </v-col>
    </v-row>
  </v-form>
</template>

<script>
export default {
  props: {
    companyId: {
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
    if (this.companyId) {
      this.$axios.get(`company/${this.companyId}`).then(res => {
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