<?php
  header ("Content-type: text/html; charset=utf-8");
  echo "<meta name='robots content='noindex'/>";
  include "functions147.php";
  $ind = $_GET ["ind"];
  onBD ($result, "PHOTO");
  while ($row = mysqli_fetch_array ($result))
    if ($row [0] == $ind)
      if (file_exists ($row [2]))
        echo "<p class='cent'><img src = '".$row [2]."'></p><br/>";
      else
        echo "<p class='cent'>Ни один файл с иллюстрацией не соответствует этой записи из базы данных.
        Вероятно, необходимая Вам иллюстрация ещё не загружена.</p><br/>";
?>