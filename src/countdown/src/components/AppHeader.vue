<template>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark static-top">
    <a class="navbar-brand" href="#">Creative Project 4</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navTabs" aria-controls="navTabs" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navTabs">
      <div class="navbar-nav">
        <router-link to="/" class="nav-item nav-link active">Countdown <span class="sr-only">(current)</span></router-link>
      </div>
    </div>
    <ul id="menu">
     <li class="right" v-if="loggedIn"><a @click="logout" href="#">Logout</a></li>
     <li class="right" v-if="loggedIn">{{user.username}}</li>
     <form v-else class="right" v-on:submit.prevent="login">
      <input v-model="email" placeholder="Email Address">
      <input v-model="password" placeholder="Password">
      <button class="primary" type="submit">Login</button>
     </form>
    </ul>
  <div class="flexWrapper errorPlace">
    <p v-if="loginError" class="flexRight error">{{loginError}}</p>
  </div>
</nav>
</template>

<script>
 export default {
   name: 'AppHeader',
   data () {
     return {
       email: '',
       password: '',
     }
   },
   computed: {
     user: function() {
       return this.$store.getters.user;
     },
     loggedIn: function() {
       return this.$store.getters.loggedIn;
     },
     loginError: function() {
       return this.$store.getters.loginError;
     },
   },
   methods: {
     login: function() {
       this.$store.dispatch('login',{
         email: this.email,
         password: this.password,
       }).then(user => {
   this.email = '';
   this.password = '';
       });
     },
     logout: function() {
       this.$store.dispatch('logout');
     }
   }
 }
</script>

<style scoped>
 /* Strip the ul of padding and list styling */
 ul {
     list-style-type:none;
     margin:0;
     padding:0;
 }
 /* Create a horizontal list with spacing */
 li {
     display:inline-block;
     float: left;
     margin-right: 20px;
     height: 50px;
     text-align: center;
     line-height: 50px;
     color: #666;
 }
 /*Active color*/
 li a.active {
 }
 /*Hover state for top level links*/
 li:hover a {
 }
 .right {
     float: right;
 }
 .errorPlace {
     height: 20px;
 }
 img {
     width: 50px;
 }
</style>