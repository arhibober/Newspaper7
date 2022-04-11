<?php
  header ("Content-type: text/html; charset=utf-8");
  echo "<meta name='robots content='noindex'/>";
  include "functions147.php";
  $ind = $_GET ["ind"];
  $monthes = array ("Январь", "Февраль", "Март", "Апрель", "Май", "Июнь",
    "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь");
  onBD ($result, "NUMBER");
  while($row = mysqli_fetch_array($result))
    if ($row [0] == $ind)
    {
      echo "<p class='cent'>
        Изменить год выпуска газеты:<br/>            
        <select name='year_drawing'>";
      for ($i = 2004; $i < date ("Y") + 2; $i++)
      {
        echo "<option value='".$i."'";
        if ($row [2] == $i)
          echo " selected";
        echo "/>".$i;
      }    
      echo "</select><br/>
        Изменить месяц выпуска газеты:<br/>
        <select name='monthes' SIZE='1'>";
      for ($j = 0; $j < 12; $j++)
      {
        echo "<option value='".($j + 1)."'";
        if ($j == $row [5] - 1)
          echo " selected";
        echo "/>".$monthes [$j];
      }
      echo "</select><br/>
      Если хотите изменить или добавить вступительный стих, выберите название нового стиха
            из ранее вставленных в данный номер:<br/>        
      <select name='lyrics' SIZE='1'>";
      onBD ($resultLyric, "ARTICLE");
      while ($rowLyric = mysqli_fetch_array ($resultLyric))
      {
        if ($rowLyric [4] == 1 && $rowLyric [5] == $row [0])
        {
          echo "<option value='".$rowLyric [0]."'";
          if ($rowLyric [0] == $row [4])
            echo " selected";
          echo "/>".$rowLyric [1];
        }
      }
      echo "</select><br/>
      <br/>
      <input type='submit' name='Edit' value='Редактировать'/>
      </p>";
    }
?>