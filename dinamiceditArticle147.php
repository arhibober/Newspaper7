<script type="text/javascript" src="ajax.js"></script>
<?php
  header ("Content-type: text/html; charset=utf-8");
  echo "<meta name='robots content='noindex'/>";
  include "functions147.php";
  $ind = $_GET ["ind"];
  onBD ($result, "ARTICLE");
  while ($row = mysqli_fetch_array ($result))
    if ($row [0] == $ind)
    {
      echo "<p class='cent'>
      Изменить название статьи:<br/>
      <input type='text' name='Name_article' wrap='virtual' value='".$row[1]."'><br/>
      Изменить номер газеты, в котором будет содержаться статья:<br/>
      <select name='numbers' SIZE='1'>";
      onBD ($resultNumber, "NUMBER");
      while ($rowNumber = mysqli_fetch_array ($resultNumber))
      {
        echo "<option value='".$rowNumber [0]."'";
        if ($rowNumber [0] == $row [5])
          echo " selected";
        echo "/>".$rowNumber [0];
      }
      echo "</select><br/>
      Изменить рубрику:<br/>
      <select name='rubrics' SIZE='1'>";
      onBD ($resultRubric, "RUBRIC");
      while ($rowRubric = mysqli_fetch_array ($resultRubric))
      {
       	echo "<option value='".$rowRubric [0]."'";
        if ($rowRubric [0] == $row [4])
          echo " selected";
        echo "/>".$rowRubric [1];
      }
      echo "</select><br/>
      Изменить автора статьи:<br/>
      <select name='autors' SIZE='1'>";
      onBD ($resultAutor, "MEMBER");
      while ($rowAutor = mysqli_fetch_array ($resultAutor))
      {
        echo "<option value='".$rowAutor [0]."'";
        if ($rowAutor [0] == $row [2])
          echo " selected";
        echo "/>".$rowAutor [1]." ".$rowAutor [2];
      }
      echo "</select></p>";
      if (($row [4] < 8) || ($row [4] == 11))
      {
        if (file_exists("Article".$ind.".txt"))
        {
      	  echo "<p class='cent'>
      	  Редактировать текст статьи:<br/>
          <textarea name='fileText' cols='80' rows='30'>";
          include "Article".$ind.".txt";
        }
        else
      	  echo "<p class='cent'>
      	  Текст к статье пока не подключён либо уже стёрт. Введите новый текст:<br/>
          <textarea name='fileText' cols='80' rows='30'>";
        echo "</textarea></p><br/>";
      }
      if ($row [4] == 10)
      {
        echo "<p class='cent'>
          Здесь Вы можете удалить лишние слова (для добавления слов воспользуйтесь
          сервисом \"Добавить статью\"):<br/>
          <textarea name='fileText' cols='80' rows='30'>";
        onBD ($resultDict, "DICTIONARIS");            
        while ($rowDict = mysqli_fetch_array ($resultDict))
        {
          if (strstr ($row [1], $rowDict [3]))
          {
            onBD ($resultWord, "WORD");            
            while ($rowWord = mysqli_fetch_array($resultWord))
              if (($rowWord [2] == $rowDict [0]) && ($rowWord [3] == $row [5]))
                echo $rowWord [1]."
";                
          } 
        }
        echo "</textarea>
          </p><br/>";
      }
      echo "<p class='cent'><input type='submit' name='Edit' value='Редактировать'/></p>";
    }  
?>