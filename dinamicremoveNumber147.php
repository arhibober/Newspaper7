<?php
  header ("Content-type: text/html; charset=utf-8");
  echo "<meta name='robots content='noindex'/>";
  include "functions147.php";
  $ind = $_GET ["ind"];
  echo "<p class='cent'><a href='number_info.php?id=".$ind."'>Просмотреть информацию о номере</a></p>";
?>