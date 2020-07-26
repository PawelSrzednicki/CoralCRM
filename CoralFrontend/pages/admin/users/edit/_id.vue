<template>
      <v-card>
        <v-card-title primary-title dense flat>
            Edit User
        </v-card-title>
        <v-card-text>
          <v-container>
              <Form :userId="this.$route.params.id"></Form>  
          </v-container>             
        </v-card-text>
      </v-card>
</template>

<script>
import Form from '~/components/users/Form.vue';

export default{
  components:{
   Form
  },
  data() {
    return {
      
    }
  },
}
</script>
<style lang="scss" scoped>

</style>