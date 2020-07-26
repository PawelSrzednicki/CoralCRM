<template>
  <div>
    <h1 v-if="$auth.user.admin">Welcome to administration Dashboard {{ $auth.user.name }}</h1>
  </div>
</template>