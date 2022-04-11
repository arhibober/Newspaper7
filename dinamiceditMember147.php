<?php
  header("Content-type: text/html; charset=utf-8");
  echo "<meta name='robots content='noindex'/>";
  include "functions147.php";
  $ind = $_GET ["ind"];
  onBD ($result, "MEMBER");   
  while ($row = mysqli_fetch_array ($result))
    if ($row [0] == $ind)
      echo "<p class='cent'>
        Имя участника:<br/>
        <input type='text' name='Name_member' wrap='virtual' value='".$row[1]."'/><br/>
        Фамилия участника:<br/>
        <input type='text' name='Sername_member' wrap='virtual' value='".$row[2]."'/><br/>
        Должность участника:<br/>
        <input type='text' name='Status_member' wrap='virtual' value='".$row[3]."'/><br/>
        <br/>
        <input type='submit' name='Edit' value='Редактировать'>
        </p>";
?>