<?php
  header ("Content-type: text/html; charset=utf-8");
  echo "<meta name='robots content='noindex'/>";
  include "functions147.php";
  $ind = $_GET ["ind"];
  onBD ($result, "RUBRIC");   
    while ($row = mysqli_fetch_array ($result))
      if ($row [0] == $ind)
        echo "<p class='cent'>
          Название рубрики в единственном числе:<br/>
          <input type='text' name='rubric_one' wrap='virtual' value='".$row[1]."'/><br/>
          Название рубрики во множественном числе:<br/>
          <input type='text' name='rubric_many' wrap='virtual' value='".$row[2]."'/><br/>
          <br/>
          <input type='submit' name='Edit' value='Редактировать'/>
        </p>";
?>