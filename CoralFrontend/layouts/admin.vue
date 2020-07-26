<template>
  <v-app>
    <v-content>
      <navigation/>
      <v-container fluid>
        <nuxt />
      </v-container>
    </v-content>
     <appFooter/>
  </v-app>
</template>

<script>
import navigation from './includes/admin/navigation';
import appFooter from './includes/admin/footer';
  export default{
    name:"AdminLayout",
    components:{
    navigation, appFooter
  }
  }
</script>
<style lang="scss" scoped>

</style>
