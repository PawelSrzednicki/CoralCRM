<template>
  <div>
    <nuxt-child />
  </div>
</template>

<script>
export default {
  name:"AdminPages",
  layout: "admin",
  middleware: "auth"
};
</script>
