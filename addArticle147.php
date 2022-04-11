<meta name="robots" content="noindex"/>
<script type="text/javascript" src="ajax.js"></script>
<?php
  $charset = "utf-8";
  $page = 0;
  include "head.php";
  include "functions147.php";
  $i = 0;
  onBD ($result, "RUBRIC");
  while ($row = mysqli_fetch_array ($result))
    $i++;   
  if ($i > 0)
  {
    onBD ($result, "RUBRIC");
    while ($row = mysqli_fetch_array ($result))
    {
      $temp = $row [1];
      break;
    }
  }
  else
    $temp = 1;
  if (!isset ($_GET["rubrics"]))
    $ind = $temp;
  else
	$ind = $_GET ["rubrics"];
?>
<form method="post" name="form" action="<?php echo ("add_article_to_DB147.php"); ?>"  enctype="multipart/form-data" onsubmit="return overify (this)">
  <p class = "cent"> Выберите рубрику:<br/>
  <?php
    echo "<select name='rubrics' size='1' id='ind' onchange='submitForm(\"addArticle147\")'>";
    onBD ($result, "RUBRIC");
    while ($row = mysqli_fetch_array ($result))
      echo "<option value='".$row [0]."'/>".$row [1];
    echo "</select></p>";
  ?>
  <br/>
  <div id="dest">
  <?php
    if (($ind < 7 && $ind != 3) || $ind == 8)
      echo "<p class='cent'>
        Название статьи:<br/>
        <input type='text' name='Name_article'/>
        </p>";
      if ($ind == 10)
      {
        echo "<p class='cent'>
          Выберите словарь, к которому Вы хотите подключить слова:<br/>
          <select name='dictionaris' size='1'>";
        onBD ($result, "DICTIONARIS");
        while ($row = mysqli_fetch_array ($result))
          echo "<option value='".$row [0]."'/>".$row [1];
        echo "</select><br/>";
        echo "Выберите категорию подключаемых слов:<br/>
          <select name='word_types' size='1'>";
        onBD ($result, "WORD_TYPE");
        while ($row = mysqli_fetch_array ($result))
          echo "<option value='".$row [0]."'/>".$row [1];
        echo "</select></p>";
      }
      if ($ind == 3)
      {
        echo "<p class='cent'>
          Выберите рассказ, фрагмент из которого Вы хотите опубликовать:<br/>
          <select name='epopees' size='1'>";
        onBD ($result, "EPOPEES");
        while ($row = mysqli_fetch_array ($result))
          echo "<option value='".$row [0]."'/>".$row [1];
        echo "</select><br/>";
      }
      echo "<p class='cent'>
        Выберите номер газеты, в котором будет содержаться статья:<br/>
        <select name='numbers' size='1'>";
      onBD ($result, "NUMBER");
      while($row = mysqli_fetch_array ($result))
        echo "<option value='".$row[0]."'/>".$row [0];
      echo "</select>
      </p>";
    ?>
    <p class="cent">
      Выберите автора статьи:<br/>
      <select name="autors" size="1">
      <?php
        onBD ($result, "MEMBER");
        while ($row = mysqli_fetch_array ($result))
          echo "<option value='".$row [0]."'/>".$row [1]." ".$row [2];
      ?>
      </select>
    </p>
    <?php
      if ($ind < 8 || $ind == 11)
      {
        $i = 0;
        onBD ($result, "ARTICLE");
        while($row = mysqli_fetch_array($result))
          if ($row [0] > $i)
            $i = $row [0];
        if (file_exists("Article".($i + 1).".txt") == false)
        {
          echo "<p class='cent'>
            Введите текст статьи (для форматирования текста, кроме красных строк и
            переводов на новую строку, используйте HTML-разметку):<br/>
            <textarea name='fileText' cols='80' rows='30'></textarea>
            </p>";
        }
        else
          echo "Текст статьи уже содержится на сервере. Редактировать его вы можете, занеся все атрибуты статьи в
            базу данных, а затем воспользовавшись сервисом администратора \"редактировать статью\".<br/>";
      }
      if ($ind == 10)
      {
        echo "<p class='cent'>
          Введите каждое слово данной категории словаря на отдельной строке:<br/>
          <textarea name='fileText' cols='80' rows='30'></textarea>
          </p>";
      }
      if ($ind < 7 || $ind == 10 || $ind == 11)
        echo "<p class='cent'>
          Здесь Вы можете прикрепить иллюстрации к статье (допускаются расширения
          иллюстраций gif, jpg, bmp, tif и png)<br/>
          <input name='myfile' type='file'/></p>";
      else
        echo "<p class='cent'>Прикрепите иллюстрацию к статье (допускаются расширения
          иллюстраций gif, jpg, bmp, tif и png)<br/>
        <input name='myfile' type='file'/></p>";
    ?>     
    </div>
    <br/>
    <div class="cent">
      <input type="submit" name="Add" value="Добавить"/>
    </div>
  </form>
<?php
  echo "</body>
    </html>"; 
?>
<script language="javascript">
  function overify (f)
  {
    b = true;
    if (f.rubrics.selectedIndex < 6 || f.rubrics.selectedIndex == 7)
    {
      if (f.Name_article.value.length == 0)
      {
        alert ("Вы не ввели название статьи!");
        b = false;
      }
    }
    if (f.rubrics.selectedIndex < 7 || f.rubrics.selectedIndex == 9 || f.rubrics.selectedIndex == 10)
    {
      if (f.fileText.value.length == 0)
      {
        alert ("Вы не ввели текст статьи!");
        b = false;
      }
    }
    if ((f.rubrics.selectedIndex > 5) && (f.rubrics.selectedIndex != 9) && (f.rubrics.selectedIndex != 10))
    {
      if (f.myfile.value.length == 0)
      {
        alert ("Прикрепите иллюстрацию!");
        b = false;
      }
      reg2=/.+\.jpg$/;
      reg3=/.+\.JPG$/;
      reg4=/.+\.gif$/;
      reg5=/.+\.GIF$/;
      reg6=/.+\.bmp$/;
      reg7=/.+\.BMP$/;
      reg8=/.+\.tif$/;
      reg9=/.+\.TIF$/;
      reg10=/.+\.png$/;
      reg11=/.+\.PNG$/;
      if ((f.myfile.value.length != 0) && (!(f.myfile.value.match (reg2))) && 
        (!(f.myfile.value.match (reg3))) && (!(f.myfile.value.match (reg4))) && 
        (!(f.myfile.value.match (reg5))) && (!(f.myfile.value.match (reg6))) && 
        (!(f.myfile.value.match (reg7))) && (!(f.myfile.value.match (reg8))) && 
        (!(f.myfile.value.match (reg9))) && (!(f.myfile.value.match (reg10))) && 
        (!(f.myfile.value.match (reg11))))
      {
        alert("Ошибка в расширении фотографии!"); 
        b = false;
      }
    }
    return b;
  }
</script>