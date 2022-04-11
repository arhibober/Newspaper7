<?php
  header ("Content-type: text/html; charset=utf-8");
  echo "<meta name='robots content='noindex'/>";
  include "functions147.php";
  $ind = $_GET ["ind"];
  if ((($ind < 7) && ($ind != 3)) || ($ind == 8))
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
      <select name='word_types' SIZE='1'>";
    onBD ($result, "WORD_TYPE");
    while ($row = mysqli_fetch_array ($result))
      echo "<option value='".$row [0]."'/>".$row [1];
    echo "</select></p>";
  }
  if ($ind == 3)
  {
    echo "<p class='cent'>
      Выберите рассказ, фрагмент из которого Вы хотите опубликовать:<br/>
      <select name='epopees' SIZE='1'>";
    onBD ($result, "EPOPEES");
    while ($row = mysqli_fetch_array($result))
      echo "<option value='".$row [0]."'/>".$row [1];
    echo "</select><br/>";
  }
  echo "<p class='cent'>
    Выберите номер газеты, в котором будет содержаться статья:<br/>
    <select name='numbers' SIZE='1'>";
  onBD ($result, "NUMBER");
  while($row = mysqli_fetch_array ($result))
    echo "<option value='".$row [0]."'/>".$row [0];
  echo "</select>
    </p>";
?>
<p class="cent">Выберите автора статьи:<br/>
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
      $i++;
    if (file_exists ("Article".($i + 1).".txt") == false)
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
  if (($ind < 7) || ($ind == 10) || ($ind == 11))
    echo "<p class='cent'>
      Здесь Вы можете прикрепить иллюстрации к статье (допускаются расширения иллюстраций gif, jpg и png)<br/>
      <input name='myfile' type='file'/>
      </p>";
  else
    echo "<p class='cent'>
      Прикрепите иллюстрацию к статье (допускаются расширения
      иллюстраций gif, jpg и png)<br/>
      <input name='myfile' type='file'/>
      </p>"; 
?>