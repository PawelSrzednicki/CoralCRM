<template>
  <v-row align="center" justify="center">
    <v-col cols="12">
      <v-card outlined>
        <v-row align="center" justify="center">
          <v-col cols="auto">
            <v-subheader>Select Picklist:</v-subheader>
          </v-col>
          <v-col cols="auto">
            <v-select
              :items="list"
              v-model="pick"
              class="mt-5 picklist"
              color="primary">
              <template v-slot:append>
                  <v-icon>mdi-plus</v-icon>
              </template>
            </v-select>
          </v-col>
        </v-row>
      </v-card>
    </v-col>

    <v-col cols="12">
      <v-card>
        <PicklistIndex :PicklistData="pick" />
      </v-card>
    </v-col>
  </v-row>
</template>
<script>
import PicklistIndex from "~/components/picklists/PicklistIndex.vue";
export default {
  components: {
    PicklistIndex,
  },
  data() {
    return {
      appendIcon: true,
      list: [],
      pick: ""
    };
  },
  created() {
    this.$axios.get('admin/picklists').then(res => {
      if (res.status === 200) {
       this.list = res.data
      }
    });
  }
};
</script>
<style lang="scss" scoped>

</style>
