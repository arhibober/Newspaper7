<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  include "functions147.php";  
?>
<form method="post" name="form" action="<?php echo ("add_photo_to_DB147.php"); ?>" onsubmit="return overify (this)">
  <p class="cent">Имя файла с иллюстрацией (допускаются форматы jpg, gif и png):<br/>
    <input type="text" name="Name_photo"/><br/>
    Выберите статью, к которой относится иллюстрация:<br/>
    <select name="articles" size="1">
    <?php
      onBD ($result, "ARTICLE");
      while ($row = mysqli_fetch_array ($result))
        echo "<option value='".$row [0]."'/>".$row [1];
    ?>
    </select><br/>
    <br/>
    <input type="submit" name="Add" value="Добавить"/>
  </p>
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
      alert ("Вы не ввели имя файла!");
      return false;
    }
    if (!f.Name_photo.value.match (/\.jpg$/) && !f.Name_photo.value.match (/\.gif$/) &&
      !f.Name_photo.value.match (/\.png$/) && !f.Name_photo.value.match (/\.JPG$/) &&
      !f.Name_photo.value.match (/\.GIF$/) && !f.Name_photo.value.match (/\.PNG$/))
    {
      alert ("В качестве иллюстраций принимаются файлы с расширением только jpg, gif и png!");
      return false;
    }
    return true;
  }
</script>