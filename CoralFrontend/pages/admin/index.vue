<template>
  <div>
    <p>{{ $auth.user.admin }}</p>
    <h1 v-if="$auth.user.admin">Vue is awesome!</h1>
  </div>
</template>