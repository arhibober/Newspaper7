<meta name="robots" content="noindex"/>
<script type="text/javascript" src="ajax.js"></script>
<?php
  include "head.php";
  include "functions147.php";
  onBD ($result, "PHOTO");
  while ($row = mysqli_fetch_array ($result))
    $i++;   
  if ($i > 0)
  {
    onBD ($result, "PHOTO");
    while ($row = mysqli_fetch_array($result))
    {
      $temp = $row[0];
      break;
    }
  }
  else
    $temp = 1;
  if (!isset ($_GET ["photos"]))
    $ind = $temp;
  else
	$ind = $_GET ["photos"];
?>
<form method="post" name="form" action="<?php echo ("edit_photo_in_DB147.php"); ?>" onsubmit="return overify (this)">
  <?php
    $i = 0;
    onBD ($result, "PHOTO");
    while ($row = mysqli_fetch_array ($result))
      $i++;
    if ($i > 0)
    {
      echo "<p class='cent'>
        Выберите иллюстрацию, информацию о которой Вы хотите редактировать:<br/>
        <select name='photos' size='1' id='ind' onchange='submitForm(\"editPhoto147\")'>";
      onBD ($result, "PHOTO");
      while ($row = mysqli_fetch_array ($result))
      {
        echo "<option value='".$row [0]."'";
        if ($row [0] == $ind)
          echo " selected";
        echo "/>".$row [2];
      }
      echo "</select>
      </p>
      <div id='dest'>";
      onBD ($result, "PHOTO");
      while($row = mysqli_fetch_array ($result))
        if ($row [0] == $ind)
        {
          if (file_exists ($row [2]))
            echo "<p class='cent'>
              <img src = '".$row [2]."' alt=''/><br/>";
          else
            echo "<p class='cent'>
              Ни один файл с иллюстрацией не соответствует этой записи из базы данных.
              Вероятно, необходимая Вам иллюстрация ещё не загружена.<br/>";
          echo "Изменить название иллюстрации:<br/>
            <input type='text' name='Name_photo' wrap='virtual' value='".$row[2]."'/><br/>
            Изменить статью, к которой будет прилагаться иллюстрация:<br/>
            <select name='articles' size='1'>";
          onBD ($resultArticle, "ARTICLE");
          while($rowArticle = mysqli_fetch_array ($resultArticle))
          {
            echo "<option value='".$rowArticle [0]."'";
            if ($rowArticle [0] == $row [3])
              echo " selected";
            echo "/>".$rowArticle [1];
          }
          echo "</select><br/>
          <input type='submit' name='Edit' value='Редактировать'/>";
        }
      echo "</p>
      </div>";
    }
    else
      echo "<p class='cent'>На данный момент иллюстраций в газете нет.</p>";
  ?>
</form>
<?php
  echo "</body>
    </html>";
?>
<script language="javascript">
  function overify (f)
  {
    if (f.Name_photo.value.length == 0)
    {
      alert ("Вы удалили имя файла вообще!");
      return false;
    }
    if ((!f.Name_photo.value.match (/\.jpg$/)) && (!f.Name_photo.value.match(/\.gif$/)) &&
      (!f.Name_photo.value.match(/\.png$/)))
    {
      alert ("Вы можете поменять иллюстрацию только на другую иллюстрацию с расширением jpg, gif и png!");
      return false;
    }
    if (confirm ('Сохранить данные об иллюстрации к газете под названием \"' + f.photos.options [f.photos.selectedIndex].text + '\"?'))
      return true;
    else
      return false;
  }
</script>