<template>
      <v-card>
        <v-card-text>
            {{$nuxt.$route.name}}
          <v-container>
              <Profile :userId="this.$route.params.id"></Profile>  
          </v-container>             
        </v-card-text>
      </v-card>
</template>

<script>
import Profile from '~/components/users/Profile.vue';

export default{
  components:{
    Profile
  },
  data() {
    return {
      
    }
  },
}
</script>
<style lang="scss" scoped>

</style>