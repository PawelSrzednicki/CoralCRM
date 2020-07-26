<template>
      <v-card>
        <v-card-title primary-title dense>
            Edit Calendar event
        </v-card-title>
        <v-card-text>
          <v-container>
              <Form :eventId="this.$route.params.id"></Form>  
          </v-container>             
        </v-card-text>
      </v-card>
</template>

<script>
import Form from '~/components/calendar/Form.vue';

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