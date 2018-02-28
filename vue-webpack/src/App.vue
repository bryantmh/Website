<template>
    <div id="app">
	<app-header></app-header>
	<router-view/>
    </div>
</template>

<script>
 import AppHeader from './components/AppHeader.vue'
 export default {
     name: 'App',
     components: { AppHeader }
 }
</script>

<style>
body {
    font-size: 16px;
    padding: 20px 100px 0px 100px;
    font-family: 'Avenir', Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
</style>
