<template>
      <v-card>
        <v-card-title primary-title dense flat>
            Edit User Profile
        </v-card-title>
        <v-card-text>
          <v-container>
              <EditProfile :userId="this.$route.params.id"></EditProfile>  
          </v-container>             
        </v-card-text>
      </v-card>
</template>

<script>
import EditProfile from '~/components/users/EditProfile.vue';

export default{
  components:{
    EditProfile
  },
  data() {
    return {
      
    }
  },
}
</script>
<style lang="scss" scoped>

</style>