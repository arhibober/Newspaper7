<?php
  header ("Content-type: text/html; charset=utf-8");
  echo "<meta name='robots content='noindex'/>";
  include "functions147.php";
  $ind = $_GET ["ind"];
  onBD ($result, "PHOTO");
  while ($row = mysqli_fetch_array ($result))
    if ($row[0] == $ind)
    {
      if (file_exists ($row [2]))
        echo "<p class='cent'><img src = '".$row [2]."'></p>";
      else
        echo "<p class='cent'>Ни один файл с иллюстрацией не соответствует этой записи из базы данных. Вероятно,
          необходимая Вам иллюстрация ещё не загружена.</p>"; 
      echo "<p class='cent'>
        Изменить название иллюстрации:<br/>
        <input type='text' name='Name_photo' wrap='virtual' value='".$row [2]."'><br/>
        Изменить статью, к которой будет прилагаться иллюстрация:<br/>
        <select name='articles' SIZE='1'>";
      onBD ($resultArticle, "ARTICLE");
      while ($rowArticle = mysqli_fetch_array ($resultArticle))
      {
        echo "<option value='".$rowArticle [0]."'";
        if ($rowArticle [0] == $row [3])
          echo " selected";
        echo "/>".$rowArticle [1];
      }
      echo "</select><br/>
      <br/>
      <input type='submit' name='Edit' value='Редактировать'>
      </p>";
    }
?>