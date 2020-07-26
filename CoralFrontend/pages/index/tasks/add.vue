<template>
      <v-card>
        <v-card-title primary-title dense>
            Add Task
        </v-card-title>
        <v-card-text>
          <v-container>
              <Form></Form>  
          </v-container>             
        </v-card-text>
      </v-card>
</template>

<script>
import Form from '~/components/tasks/Form.vue';

export default{
  components:{
    Form
  }
}
</script>
<style lang="scss" scoped>

</style>