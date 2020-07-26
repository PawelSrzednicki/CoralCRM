<template>
  <v-row>
    <v-col cols="12">
      <v-card>
        <v-card-title primary-title class="primary--text">
            Calendar
            <v-spacer></v-spacer>
              <v-btn
                color="pink"
                dark
                right
                to="Calendar/add"
              >
              Add New
              </v-btn>
        </v-card-title>
        <v-card-text>
            <Calendar/>
        </v-card-text>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
import Calendar from '~/components/calendar/Calendar.vue';

export default{
  components:{
    Calendar
  },
  data() {
    return {
    }
  },
}
</script>
<style lang="scss" scoped>

</style>