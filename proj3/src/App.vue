<template>
  <div id="app">
    <app-header></app-header>
    <router-view/>
    <app-footer></app-footer>
  </div>
</template>

<script>
  import AppHeader from './components/AppHeader.vue'
  import AppFooter from './components/AppFooter.vue'
  export default {
    name: 'App',
    components: {
      AppHeader,
      AppFooter
    }
  }
</script>

<style>

  html {
    position: relative;
    min-height: 100%;
  }

  body {
    font-family: Verdana;
    margin-bottom: 60px;
  }
</style>
