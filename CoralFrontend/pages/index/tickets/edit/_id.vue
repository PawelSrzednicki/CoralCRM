<template>
      <v-card>
        <v-card-title primary-title dense flat>
            Edit Ticket
        </v-card-title>
        <v-card-text>
          <v-container>
              <Form :ticketId="this.$route.params.id"></Form>  
          </v-container>             
        </v-card-text>
      </v-card>
</template>

<script>
import Form from '~/components/tickets/Form.vue';

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