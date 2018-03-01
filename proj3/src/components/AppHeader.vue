<template>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark static-top">
        <a class="navbar-brand" href="#">Countdown</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navTabs" aria-controls="navTabs" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navTabs">
          <div class="navbar-nav">
            <router-link to="/" class="nav-item nav-link active">Countdown <span class="sr-only">(current)</span></router-link>
          </div>
        </div>
      </nav>
</template>

<script>
 export default {
     name: 'AppHeader'
 }
</script>