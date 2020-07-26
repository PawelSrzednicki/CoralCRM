<template>
  <v-row>
    <v-col cols="12">
      <v-card>
        <v-card-title primary-title class="primary--text justify-center">
            Tasks
        </v-card-title>
        <v-card-text>
            <list/>
        </v-card-text>
      </v-card>
    </v-col>
  </v-row>
</template>

<script>
import list from '~/components/tasks/list.vue';

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