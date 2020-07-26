<template>
  <v-form v-model="valid" autocomplete="off">
    <v-row align="center" justify="center">
      <v-col cols="6">
        <v-text-field
          label="name"
          v-model="formData.name"
        ></v-text-field>
        <span class="subtitle warning--text" v-if="error">{{error.name}}</span>
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
          v-model="formData.adress"
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Phone"
          v-model="formData.phone"
        ></v-text-field>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Email"
          v-model="formData.email"
        ></v-text-field>
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
    </v-row>
    <v-btn color="blue darken-1" text @click="save">Save</v-btn>
  </v-form>
</template>

<script>
export default {
  props: {
    userId: {
      type: Number,
      required: false,
      default: ""
    }
  },
  data() {
    return {
      valid: false,
      formData: [],
      error: ''
    };
  },

  methods: {
    save() {
      if (this.userId) {
        this.editItem(this.userId);
      }
    },
    editItem(item) {
       let payload = this.formData;
        return this.$axios
        .put(`user/profile/${item}`, payload)
        .then(res => {
            console.log(res);
            this.$router.push({ name: 'index-tickets'})
        })
         .catch(e => {
          console.log(e);
          this.error = e.response ? e.response.data.errors : e.toString();
        });
    }
  },

  created() {
    if (this.userId) {
      this.$axios.get(`user/profile/${this.userId}`).then(res => {
       console.log(res.data);  
       this.formData = res.data;  
    });
    }
  }
};
</script>