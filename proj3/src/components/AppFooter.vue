<template>
  <footer class="footer">
    <div class="container">
      <a href="https://github.com/BYU-CS260-Winter-2018/Website">Github Link</a>
    </div>
  </footer>
</template>

<script>
 export default {
     name: 'AppHeader'
 }
</script>

<style>
  .footer {
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 60px;
    line-height: 60px;
    background-color: #212529;
    color: white;
  }

  .footer a {
      color: white;
  }
</style>