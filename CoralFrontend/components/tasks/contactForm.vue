<template>
  <v-form v-model="valid" autocomplete="off">
    <v-row align="center" justify="center">
      <v-col cols="12">* - these fields are required
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Firstname"
          class="required"
          filled
          v-model="formData.firstname"
          :error-messages="error.name"
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
          :error-messages="error.address"
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Phone"
          class="required"
          filled
          v-model="formData.phone"
          :error-messages="error.phone"
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Email"
          class="required"
          filled
          v-model="formData.email"
          :error-messages="error.email"
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
        <v-select
          :items="picklists.contactstatus"
          label="Contact Status"
          item-text="value"
          item-value="id"
          filled
          v-model="formData.contactstatus"
        >
        <template v-slot:label>
        <div v-if="formData.contactstatus && formData.contactstatus.length === 1">
             {{formData.contactstatus[0].value}}
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
          filled
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
          :items="picklists.contactleadstatus"
          label="Lead Status"
          item-text="value"
          item-value="id"
          filled
          v-model="formData.contactleadstatus">
         <template v-slot:label>
        <div v-if="formData.contactleadstatus && formData.contactleadstatus.length === 1">
             {{formData.contactleadstatus}}
        </div>
        <div v-else>
            Lead Status
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
      error: ''
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
            this.$router.push({ name: 'contacts'})
        })
         .catch(e => {
          console.log(e);
          this.error = e.response ? e.response.data.errors : e.toString();
        });
    },
    editItem(item) {
      console.log(this.formData.adress);
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
       console.log(res.data[0]);  
       this.formData = res.data[0];  
    });
    }
  }
};
</script>
