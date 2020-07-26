<template>
  <v-form v-model="valid" autocomplete="off">
    <v-row align="center" justify="center">
      <v-col cols="12" v-if="!contactId">* - these fields are required
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Firstname"
          class="pb-2"
          v-model="formData.firstname"
          :class="contactId ? 'required' : ''"
        >
        </v-text-field>
        <span class="subtitle warning--text" v-if="error">{{error.firstname}}</span>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Surname"
          v-model="formData.lastname"
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Address"
           class="pb-2"
          v-model="formData.address"
          :class="contactId ? 'required' : ''"
        ></v-text-field>
         <span class="subtitle warning--text" v-if="error">{{error.address}}</span>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Phone"
           class="pb-2"
          v-model="formData.phone"
          :class="contactId ? 'required' : ''"
        ></v-text-field>
         <span class="subtitle warning--text" v-if="error">{{error.phone}}</span>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Email"
          class="pb-2"
          type="email"
          v-model="formData.email"
          :class="contactId ? 'required' : ''"
        > </v-text-field>
         <span class="subtitle warning--text" v-if="error">{{error.email}}</span>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="City"
          v-model="formData.city"
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Zip-Code"
          v-model="formData.zip"
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <v-select
          :items="picklists.contact_status"
          label="Contact Status"
          item-text="value"
          item-value="id"
          v-model="formData.contact_status"
        >
        <template v-slot:label>
        <div v-if="formData.contact_status && formData.contact_status.length === 1">
             {{formData.contact_status[0].value}}
        </div>
        <div v-else>
            Contact Status
        </div>
        </template>
        </v-select>
      </v-col>

      <v-col cols="6">
        <v-select
          :items="picklists.lifecyclestage"
          label="Lifecycle stage"
          item-text="value"
          item-value="id"
          v-model="formData.lifecyclestage">
       <template v-slot:label>
        <div v-if="formData.lifecyclestage && formData.lifecyclestage.length === 1">
             {{formData.lifecyclestage}}
        </div>
        <div v-else>
            Lifecycle stage
        </div>
        </template>
        </v-select>
      </v-col>

      <v-col cols="6">
        <v-select
          :items="picklists.contact_lead_status"
          label="Lead Status"
          item-text="value"
          item-value="id"
          v-model="formData.contactleadstatus">
         <template v-slot:label>
        <div v-if="formData.contact_lead_status && formData.contact_lead_status.length === 1">
             {{formData.contact_lead_status}}
        </div>
        <div v-else>
            Lead Status
        </div>
        </template>
        </v-select>
      </v-col>
       <v-col cols="6">
        <v-select
          :items="picklists.companies"
          label="Lead Status"
          item-text="value"
          item-value="id"
          v-model="formData.companies">
         <template v-slot:label>
        <div v-if="formData.companies && formData.companies.length === 1">
             {{formData.companies}}
        </div>
        <div v-else>
            Company
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
    contactId: {
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
      error: []
    };
  },

  methods: {
    save() {
      if (this.contactId) {
        this.editItem(this.contactId);
      } else {
        this.add();
      }
    },
    add() {
      let payload = this.formData;
      return this.$axios
        .post("contact", payload)
        .then(res => {
            console.log(res);
            this.$router.push({ name: 'index-contacts'})
        })
         .catch(e => {
          console.log(e);
          this.error = e.response ? e.response.data.errors : e.toString();
        });
    },
    editItem(item) {
      let payload = this.formData;
        return this.$axios
        .put(`contact/${item}`, payload)
        .then(res => {
            console.log(res);
            this.$router.push({ name: 'index-contacts'})
        })
         .catch(e => {
          console.log(e);
          this.error = e.response ? e.response.data.errors : e.toString();
        });
    }
  },

  created() {
    this.$axios.get("contact/create").then(res => {
      if (res.status === 200) {
        this.picklists = res.data;
      }
    });

    if (this.contactId) {
      this.$axios.get(`contact/${this.contactId}`).then(res => {
       this.formData = res.data[0];  
    });
    }
  }
};
</script>
