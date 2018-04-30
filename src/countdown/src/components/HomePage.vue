<template>
  <div>
    <div v-if="loggedIn">
      <countdown/>
    </div>
    <div v-else>
      <welcome-page/>
    </div>
  </div>
</template>

<script>
 import WelcomePage from './WelcomePage';
 import countdown from './countdown';
 export default {
   name: 'HomePage',
   components: {WelcomePage,countdown},
   computed: {
     loggedIn: function() {
       return this.$store.getters.loggedIn;
     },
   },
 }
</script>

<style scoped>
</style>