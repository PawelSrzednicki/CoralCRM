<template>
  <v-app>
    <v-content>
      <navigation/>
      <v-container>
        <nuxt />
      </v-container>
    </v-content>
    <appFooter/>
  </v-app>
</template>

<script>
import navigation from './includes/user/navigation';
import appFooter from './includes/user/footer';

export default{
  components:{
    navigation, appFooter
  }
}
</script>
<style lang="scss" scoped>

</style>
