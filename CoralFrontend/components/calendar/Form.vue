<template>
  <v-form v-model="valid" autocomplete="off">
    <v-row align="center" justify="center">
      <v-col cols="12" v-if="!eventId">* - these fields are required </v-col>
      <v-col cols="6">
        <v-text-field
          label="Name"
          type="text"
          class="pb-2"
          v-model="formData.name"
          :class="eventId ? 'required' : ''"
        ></v-text-field>
        <span class="subtitle warning--text" v-if="error">{{
          error.name
        }}</span>
      </v-col>
      <v-col cols="6">
         <v-menu
        v-model="menu"
        :close-on-content-click="false"
        :nudge-right="40"
        transition="scale-transition"
        offset-y
        min-width="290px"
      >
        <template v-slot:activator="{ on, attrs }">
          <v-text-field
            v-model="formData.start"
            label="Event Start Date"
            readonly
            v-bind="attrs"
            v-on="on"
          ></v-text-field>
        </template>
        <v-date-picker v-model="formData.start" @input="menu = false"></v-date-picker>
      </v-menu>
      </v-col>
      <v-col cols="6">
     <v-menu
        v-model="menu2"
        :close-on-content-click="false"
        :nudge-right="40"
        transition="scale-transition"
        offset-y
        min-width="290px"
      >
        <template v-slot:activator="{ on, attrs }">
          <v-text-field
            v-model="formData.end"
            label="Event End Date"
            readonly
            v-bind="attrs"
            v-on="on"
          ></v-text-field>
        </template>
        <v-date-picker v-model="formData.end" @input="menu2 = false"></v-date-picker>
      </v-menu>
      </v-col>
      <v-col cols="6">
        <v-select
          :items="picklists.event_type"
          label="Event Type"
          item-text="value"
          item-value="id"
          v-model="formData.event_type"
        >
          <template v-slot:label>
            <div v-if="formData.event_type && formData.event_type.length === 1">
              {{ formData.event_type[0].value }}
            </div>
            <div v-else>
              Event Type
            </div>
          </template>
        </v-select>
      </v-col>
      <v-col cols="12">
        <v-text-field
          label="Description"
          v-model="formData.details"
        ></v-text-field>
      </v-col>
    </v-row>
    <v-btn color="blue darken-1" text @click="save">Save</v-btn>
  </v-form>
</template>

<script>
export default {
  props: {
    eventId: {
      type: Number,
      required: false,
      default: ""
    }
  },
  data() {
    return {
      valid: false,
      picklists: [],
      formData: {},
      error: "",
      menu: false,
      menu2: false,
    };
  },

  methods: {
    save() {
      if (this.eventId) {
        this.editItem(this.eventId);
      } else {
        this.add();
      }
    },
    add() {
      let payload = this.formData;
      return this.$axios.post("event", payload)
        .then(res => {
          this.$router.push({ name: "index-calendar" });
        })
        .catch(e => {
          this.error = e.response ? e.response.data.errors : e.toString();
        });
    },
    editItem(item) {
      let payload = this.formData;
      return this.$axios
        .put(`event/${item}`, payload)
        .then(res => {
          this.$router.push({ name: "index-calendar" });
        })
        .catch(e => {
          this.error = e.response ? e.response.data.errors : e.toString();
        });
    }
  },

  created() {
    this.$axios.get("event/create").then(res => {
      if (res.status === 200) {
        this.picklists = res.data;
      }
    });

    if (this.eventId) {
      this.$axios.get(`event/${this.eventId}`).then(res => {
        this.formData = res.data[0];
      });
    }
  }
};
</script>
