<template>
  <v-form v-model="valid" autocomplete="off">
    <v-row align="center" justify="center">
      <v-col cols="12" v-if="!taskId">* - these fields are required
      </v-col>
      <v-col cols="6">
        <v-text-field
          label="Name"
          class="pb-2"
          v-model="formData.name"
          :class="taskId ? 'required' : ''"
        ></v-text-field>
        <span class="subtitle warning--text" v-if="error">{{error.name}}</span>
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
    taskId: {
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
      if (this.taskId) {
        this.editItem(this.taskId);
      } else {
        this.add();
      }
    },
    add() {
      let payload = this.formData;
      return this.$axios
        .post("task", payload)
        .then(res => {
            console.log(res);
            this.$router.push({ name: 'index-tasks'})
        })
         .catch(e => {
          console.log(e);
          this.error = e.response ? e.response.data.errors : e.toString();
        });
    },
    editItem(item) {
       let payload = this.formData;
        return this.$axios
        .put(`task/${item}`, payload)
        .then(res => {
            console.log(res);
            this.$router.push({ name: 'index-tasks'})
        })
         .catch(e => {
          console.log(e);
          this.error = e.response ? e.response.data.errors : e.toString();
        });
    }
  },

  created() {
    this.$axios.get("task/create").then(res => {
      if (res.status === 200) {
        this.picklists = res.data;
      }
    });

    if (this.taskId) {
      this.$axios.get(`task/${this.contactId}`).then(res => {
       console.log(res.data[0]);  
       this.formData = res.data[0];  
    });
    }
  }
};
</script>
