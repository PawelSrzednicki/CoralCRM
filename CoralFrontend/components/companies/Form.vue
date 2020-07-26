<template>
  <v-form v-model="valid" autocomplete="off">
    <v-row align="center" justify="center">
       <v-col cols="12" v-if="!companyId">* - these fields are required
      </v-col>
        <v-col cols="6">
        <v-text-field
          label="Name"
          class="pb-2"
          v-model="formData.name"
          :class="companyId ? 'required' : ''"
        ></v-text-field>
        <span class="subtitle warning--text" v-if="error">{{error.name}}</span>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Zip"
          v-model="formData.zip"
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Address"
          class="pb-2"
          v-model="formData.address"
          :class="companyId ? 'required' : ''"
        ></v-text-field>
        <span class="subtitle warning--text" v-if="error">{{error.address}}</span>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Phone"
          class="pb-2"
          v-model="formData.phone"
          :class="companyId ? 'required' : ''"
        ></v-text-field>
        <span class="subtitle warning--text" v-if="error">{{error.phone}}</span>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Email"
          class="pb-2"
          v-model="formData.email"
          :class="companyId ? 'required' : ''"
        ></v-text-field>
        <span class="subtitle warning--text" v-if="error">{{error.email}}</span>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Website"
          v-model="formData.website"
        ></v-text-field>
      </v-col>

      <v-col cols="6">
        <v-select
          :items="picklists.company_status"
          label="Company Status"
          item-text="value"
          item-value="id"
          v-model="formData.company_status"
        >
        <template v-slot:label>
        <div v-if="formData.company_status && formData.company_status.length === 1">
             {{formData.company_status[0].value}}
        </div>
        <div v-else>
            Company Status
        </div>
        </template>
        </v-select>
      </v-col>

      <v-col cols="6">
        <v-select
          :items="picklists.industry"
          label="Industry"
          item-text="value"
          item-value="id"
          v-model="formData.industry">
       <template v-slot:label>
        <div v-if="formData.industry && formData.industry.length === 1">
             {{formData.industry}}
        </div>
        <div v-else>
            Industry
        </div>
        </template>
        </v-select>
      </v-col>
           <v-col cols="12">
        <v-textarea
          label="Description"
          v-model="formData.description"
        ></v-textarea>
      </v-col>
    </v-row>
    <v-btn color="blue darken-1" text @click="save">Save</v-btn>
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
      picklists: [],
      formData: [],
      error: ''
    };
  },

  methods: {
    save() {
      if (this.companyId) {
        this.editItem(this.companyId);
      } else {
        this.add();
      }
    },
    add() {
      let payload = this.formData;
      return this.$axios
        .post("company", payload)
        .then(res => {
            this.$router.push({ name: 'index-companies'})
        })
         .catch(e => {
          this.error = e.response ? e.response.data.errors : e.toString();
        });
    },
    editItem(item) {
       let payload = this.formData;
        return this.$axios
        .put(`company/${item}`, payload)
        .then(res => {
            this.$router.push({ name: 'index-companies'})
        })
         .catch(e => {
          this.error = e.response ? e.response.data.errors : e.toString();
        });
    }
  },

  created() {
    this.$axios.get("company/create").then(res => {
      if (res.status === 200) {
        this.picklists = res.data;
      }
    });

    if (this.contactId) {
      this.$axios.get(`company/${this.contactId}`).then(res => { 
       this.formData = res.data[0];  
    });
    }
  }
};
</script>
