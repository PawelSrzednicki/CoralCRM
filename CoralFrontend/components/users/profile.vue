<template>
  <v-form v-model="valid" autocomplete="off">
    <v-row align="center" justify="center">
      <v-col cols="12">
      <v-toolbar dense flat>
      <v-toolbar-title>{{formData.name}} user profile</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn nuxt outlined color="primary" :to="{ name: 'admin-users-edit-id', params: { id: this.userId }}" v-if="this.$route.name == 'admin-users-id'">
        Edit
      </v-btn>
      <v-btn nuxt outlined color="primary" :to="{ name: 'index-user-edit-id', params: { id: this.userId }}" v-else>
        Edit
      </v-btn>
       </v-toolbar>
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="name"
          v-model="formData.name"
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
          label="Adress"
          v-model="formData.adress"
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
    </v-row>
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
      formData: []
    };
  },
  created() {
      this.$axios.get(`user/profile/${this.userId}`).then(res => {
        console.log(res.data);
        this.formData = res.data;
      });
  }
};
</script>
<style lang="scss">
  .theme--light.v-label {
       color: #1E88E5;
   }   
</style>