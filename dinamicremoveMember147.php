<?php
  header ("Content-type: text/html; charset=utf-8");
  echo "<meta name='robots content='noindex'/>";
  include "functions147.php";
  $ind = $_GET ["ind"];
  onBD ($result, "MEMBER"); 
  while ($row = mysqli_fetch_array ($result))
    if ($row [0] == $ind)
      echo "Учасник ".$row [1]." ".$row [2];
?>