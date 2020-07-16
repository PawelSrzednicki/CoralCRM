<template>
  <v-row>
    <v-col cols="12">
      <v-card>
        <v-card-title primary-title class="primary--text">
            Contacts
            <v-spacer></v-spacer>
              <v-btn
                color="pink"
                dark
                right
                text
                to="Contacts/add"
              >
              Add New
              </v-btn>
        </v-card-title>
        <v-card-text>
            <list/>
        </v-card-text>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
import list from '~/components/contacts/list.vue';

export default{
  components:{
    list
  },
  data() {
    return {
    }
  },
}
</script>
<style lang="scss" scoped>

</style>