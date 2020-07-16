<template>
      <v-card>
        <v-card-title primary-title dense flat>
            Edit Contact
        </v-card-title>
        <v-card-text>
          <v-container>
              <contactForm :contactId="this.$route.params.id"></contactForm>  
          </v-container>             
        </v-card-text>
      </v-card>
</template>

<script>
import contactForm from '~/components/contacts/contactForm.vue';

export default{
  components:{
    contactForm
  },
  data() {
    return {
      
    }
  },
}
</script>
<style lang="scss" scoped>

</style>