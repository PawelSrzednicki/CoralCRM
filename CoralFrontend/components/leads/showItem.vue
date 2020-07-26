<template>
  <v-form v-model="valid" autocomplete="off">
    <v-row align="center" justify="center">
      <v-col cols="12">
      <v-toolbar dense flat>
      <v-toolbar-title>Title</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn outlined color="primary" :to="{ name: 'index-leads-edit-id', params: { id: this.leadId }}">
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
          label="Amount"       
          v-model="formData.amount"
          readonly
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Lead Close Date"
          v-model="formData.leadCloseDate"
          readonly
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <span
          v-if="formData.lead_status && formData.lead_status.length === 1"
        >
          <v-text-field
            label="Lead Status"
            v-model="formData.lead_status[0].value"
            readonly
          ></v-text-field>
        </span>
      </v-col>

      <v-col cols="6">
        <span
          v-if="
            formData.lead_type &&
              formData.lead_type.length === 1
          "
        >
          <v-text-field
            label="Lead Type"
            v-model="formData.lead_type[0].value"
            readonly
          ></v-text-field>
        </span>
      </v-col>

      <v-col cols="6">
        <span
          v-if="formData.sales_pipeline && formData.sales_pipeline.length === 1"
        >
          <v-text-field
            label="Sales Pipeline"
            filled
            v-model="formData.sales_pipeline[0].value"
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
    leadId: {
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
    if (this.leadId) {
      this.$axios.get(`lead/${this.leadId}`).then(res => {
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