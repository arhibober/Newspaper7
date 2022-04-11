<meta name="robots" content="noindex"/>
<script type="text/javascript" src="ajax.js"></script>
<?php
  $page = 0;
  include "head.php";
  include "functions147.php";
  onBD ($result, "ARTICLE");
  $i = 0;
  while($row = mysqli_fetch_array ($result))
    $i++;
  if ($i > 0)
  {
    onBD ($result, "ARTICLE");
    while ($row = mysqli_fetch_array ($result))
    {
      $temp = $row [0]; 
      break;
    }
  }
  else
    $temp = 1;
  if (!isset ($_GET ["articles"]))
    $ind = $temp;
  else
	$ind = $_GET ["articles"];
?>
<form method="post" name="form" action="<?php echo ("edit_article_in_DB147.php"); ?>"
  onsubmit="return overify(this)">
<p class="cent">
  <?php
    $i = 0;
    onBD ($result, "ARTICLE");
    while ($row = mysqli_fetch_array($result))
      $i++;
    if ($i > 0)
    {
      echo "Выберите статью, которую Вы хотите редактировать:<br/>
        <select name='articles' size='1' id='ind' onchange='submitForm (\"editArticle147\")'>";
      onBD ($result, "ARTICLE");
      while($row = mysqli_fetch_array ($result))
      {
      	echo "<option value='".$row [0]."'";
        if ($row [0] == $ind)
          echo " selected";
        echo "/>".$row [1];
      }
      echo "</select></p>
        <div id = 'dest'>";
      onBD ($result, "ARTICLE");
      while ($row = mysqli_fetch_array ($result))
        if ($row [0] == $ind)
        {
          echo "<p class='cent'>
            Изменить название статьи:<br/>
            <input type='text' name='Name_article' wrap='virtual' value='".$row[1]."'><br/>
            Изменить номер газеты, в котором будет содержаться статья:<br/>
            <select name='numbers' size='1'>";
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
          <select name='rubrics' size='1'>";
          onBD ($resultRubric, "RUBRIC");
          while($rowRubric = mysqli_fetch_array ($resultRubric))
          {
          	echo "<option value='".$rowRubric [0]."'";
            if ($rowRubric [0] == $row [4])
              echo " selected";
            echo "/>".$rowRubric [1];
          }
          echo "</select><br/>
          Изменить автора статьи:<br/>
          <select name='autors' size='1'>";
          onBD ($resultAutor, "MEMBER");
          while ($rowAutor = mysqli_fetch_array ($resultAutor))
          {
            echo "<option value='".$rowAutor [0]."'";
            if ($rowAutor [0] == $row [2])
              echo " selected";
            echo "/>".$rowAutor [1]." ".$rowAutor [2];
          }
          echo "</select></p>";
          if ($row [4] < 8 || $row [4] == 11)
          {
            if (file_exists("Article".$row [0].".txt"))
            {
          	  echo "<p class='cent'>
          	    Редактировать текст статьи:<br/>
                <textarea name='fileText' cols='80' rows='30'>";
              include "Article".$row [0].".txt";
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
            while($rowDict = mysqli_fetch_array ($resultDict))
            {
              if (strstr ($row [1], $rowDict [3]))
              {
                onBD ($resultWord, "WORD");            
                while ($rowWord = mysqli_fetch_array ($resultWord))
                  if (($rowWord [2] == $rowDict [0]) && ($rowWord [3] == $row [5]))
                    echo $rowWord [1]."
";
              } 
            }
            echo "</textarea></p><br/>";
          }
          echo "<p class='cent'><input type='submit' name='Edit' value='Редактировать'/></p>";
        }
        echo "</div>";
    }
    else
      echo "<p class='cent'>На данный момент статей в газете нет.</p>";
  ?>
</form>
<script language="javascript">
  function overify (f)
  {
    b = true;
    if (f.Name_article.value.length == 0)
    {
      alert ("Вы стёрли старое название статьи вообще!");
      b = false;
    }
    if (f.rubrics.selectedIndex < 7 || f.rubrics.selectedIndex == 9 || f.rubrics.selectedIndex == 10)
    {
      if (f.fileText.value.length == 0)
      {
        alert ("Текст статьи отсутствует вообще - наверняка вы стёрли старый либо его и не было. Срочно введите текст!");
        b = false;
      }
    }
    if (b)
      if (confirm ('Сохранить данные о статье \"' + f.articles.options[f.articles.selectedIndex].text + '\"?'))
   	    return true;
   	  else
   	    return false;
	return b;
  }
</script>