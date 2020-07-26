<template>
  <v-form v-model="valid" autocomplete="off">
    <v-row align="center" justify="center">
      <v-col cols="12" v-if="!leadId">* - these fields are required
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Name"
          class="pb-2"
          v-model="formData.name"
          :class="leadId ? 'required' : ''"
        ></v-text-field>
        <span class="subtitle warning--text" v-if="error">{{error.name}}</span>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Amount"
          v-model="formData.amount"
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Lead Close Date"
          filled
          v-model="formData.leadCloseDate"
          :error-messages="error.address"
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <v-select
          :items="picklists.lead_status"
          label="Lead Status"
          item-text="value"
          item-value="id"
          filled
          v-model="formData.lead_status"
        >
        <template v-slot:label>
        <div v-if="formData.lead_status && formData.lead_status.length === 1">
             {{formData.lead_status[0].value}}
        </div>
        <div v-else>
            Lead Status
        </div>
        </template>
        </v-select>
      </v-col>

      <v-col cols="6">
        <v-select
          :items="picklists.lead_type"
          label="Lead Type"
          item-text="value"
          item-value="id"
          filled
          v-model="formData.lead_type">
       <template v-slot:label>
        <div v-if="formData.lead_type && formData.lead_type.length === 1">
             {{formData.lead_type}}
        </div>
        <div v-else>
            Lead Type
        </div>
        </template>
        </v-select>
      </v-col>

      <v-col cols="6">
        <v-select
          :items="picklists.sales_pipeline"
          label="Sales Pipeline"
          item-text="value"
          item-value="id"
          filled
          v-model="formData.sales_pipeline">
         <template v-slot:label>
        <div v-if="formData.sales_pipeline && formData.sales_pipeline.length === 1">
             {{formData.sales_pipeline}}
        </div>
        <div v-else>
            Sales Pipeline
        </div>
        </template>
        </v-select>
      </v-col>
    </v-row>
    <v-btn color="blue darken-1" text @click="save">Save</v-btn>
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
      picklists: [],
      formData: [],
      error: ''
    };
  },

  methods: {
    save() {
      if (this.leadId) {
        this.editItem(this.leadId);
      } else {
        this.add();
      }
    },
    add() {
      let payload = this.formData;
      return this.$axios
        .post("lead", payload)
        .then(res => {
            console.log(res);
            this.$router.push({ name: 'index-leads'})
        })
         .catch(e => {
          console.log(e);
          this.error = e.response ? e.response.data.errors : e.toString();
        });
    },
    editItem(item) {
       let payload = this.formData;
        return this.$axios
        .put(`lead/${item}`, payload)
        .then(res => {
            console.log(res);
            this.$router.push({ name: 'index-leads'})
        })
         .catch(e => {
          console.log(e);
          this.error = e.response ? e.response.data.errors : e.toString();
        });
    }
  },

  created() {
    this.$axios.get("lead/create").then(res => {
      if (res.status === 200) {
        this.picklists = res.data;
      }
    });

    if (this.leadId) {
      this.$axios.get(`lead/${this.contactId}`).then(res => {
       console.log(res.data[0]);  
       this.formData = res.data[0];  
    });
    }
  }
};
</script>
