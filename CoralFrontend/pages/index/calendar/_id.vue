<template>
      <v-card>
        <v-card-text>
          <v-container>
              <showItem :eventId="this.$route.params.id"></showItem>  
          </v-container>             
        </v-card-text>
      </v-card>
</template>

<script>
import showItem from '~/components/calendar/showItem.vue';

export default{
  components:{
    showItem
  },
  data() {
    return {
      
    }
  },
}
</script>
<style lang="scss" scoped>

</style>