<template>
      <v-card>
        <v-card-text>
          <v-container>
              <showItem :ticketId="this.$route.params.id"></showItem>  
          </v-container>             
        </v-card-text>
      </v-card>
</template>

<script>
import showItem from '~/components/tickets/showItem.vue';

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