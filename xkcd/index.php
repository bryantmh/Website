<?php
  $title = "XKCD Browser";
  $pageName = "BryantHinton.com";
  $body = "./main.php";
  $icon = '<i class="far fa-lemon"></i>';
  $header = '<link rel="stylesheet" href="./styles.css"/>';
  $footer = '
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>
    <script src="https://unpkg.com/vue-star-rating/dist/star-rating.min.js"></script>
    <script src="./script.js"></script>';
  require($_SERVER['DOCUMENT_ROOT']."/templateBootstrap.php");
?>