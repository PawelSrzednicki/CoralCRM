<template>
  <v-form v-model="valid" autocomplete="off">
    <v-row align="center" justify="center">
      <v-col cols="12">
      <v-toolbar dense flat>
      <v-toolbar-title>Title</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-btn outlined color="primary" :to="{ name: 'index-tasks-edit-id', params: { id: this.taskId }}">
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
    taskId: {
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
    if (this.taskId) {
      this.$axios.get(`task/${this.taskId}`).then(res => {
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