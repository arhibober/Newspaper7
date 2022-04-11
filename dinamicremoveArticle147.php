<?php
  header ("Content-type: text/html; charset=utf-8");
  echo "<meta name='robots' content='noindex'/>";
  include "functions147.php";
  $ind = $_GET ["ind"];
  echo "<p class='cent'><a href='article_text.php?id=".$ind."'>Просмотреть информацию о статье</a></p>";
?>