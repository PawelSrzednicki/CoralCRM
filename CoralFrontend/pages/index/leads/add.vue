<template>
      <v-card>
        <v-card-title primary-title dense flat>
            Add Contact
        </v-card-title>
        <v-card-text>
          <v-container>
              <contactForm></contactForm>  
          </v-container>             
        </v-card-text>
      </v-card>
</template>

<script>
import contactForm from '~/components/contacts/contactForm.vue';

export default{
  components:{
    contactForm
  }
}
</script>
<style lang="scss" scoped>

</style>