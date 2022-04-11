<?php
  header ("Content-type: text/html; charset=utf-8");
  echo "<meta name='robots content='noindex'/>";
  include "functions147.php";
  $ind = $_GET ["ind"];
  onBD ($result, "CONNECTION"); 
  while ($row = mysqli_fetch_array ($result))
    if ($row [0] == $ind)
    {
      onBD ($result, "MEMBER"); 
      while ($rowAutor = mysqli_fetch_array ($result))
        if ($rowAutor [0] == $row [2])
          $init=$rowAutor [1]." ".$rowAutor [2];
      echo "<p class='cent'>Связь установлена между участником ".$init." и номером ".$row [1]."</p>";
    }
?>