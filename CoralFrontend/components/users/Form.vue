<template>
  <v-form v-model="valid" autocomplete="off">
    <v-row align="center" justify="center">
      <v-col cols="12" v-if="!userId">* - these fields are required
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="name"
          class="pb-2"
          v-model="formData.name"
          :class="userId ? 'required' : ''"
        ></v-text-field>
        <span class="subtitle warning--text" v-if="error">{{error.name}}</span>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="lastname"
          v-model="formData.lastname"
        ></v-text-field>
      </v-col>
        <v-col cols="6">
        <v-text-field
          label="Password"
          class="pb-2"
          v-model="formData.password"
          :class="userId ? 'required' : ''"
        ></v-text-field>
        <span class="subtitle warning--text" v-if="error">{{error.password}}</span>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Adress"
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
          class="pb-2"
          :class="userId ? 'required' : ''"
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
      } else {
        this.add();
      }
    },
    add() {
      let payload = this.formData;
      return this.$axios
        .post("admin/users", payload)
        .then(res => {
            console.log(res);
            this.$router.push({ name: 'admin-users'})
        })
         .catch(e => {
          console.log(e);
          this.error = e.response ? e.response.data.errors : e.toString();
        });
    },
       editItem(item) {
       let payload = this.formData;
        return this.$axios
        .put(`admin/users/${item}`, payload)
        .then(res => {
            console.log(res);
            this.$router.push({ name: 'admin-users'})
        })
         .catch(e => {
          console.log(e);
          this.error = e.response ? e.response.data.errors : e.toString();
        });
    }
  },

  created() {
    if (this.userId) {
      this.$axios.get(`admin/users/${this.userId}`).then(res => {
       console.log(res.data);  
       this.formData = res.data;  
    });
    }
  }
};
</script>
