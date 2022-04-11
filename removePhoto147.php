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
    while ($row = mysqli_fetch_array ($result))
    {
      $temp = $row [0];
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
<form method="post" name="form" action="<?php echo ("remove_photo_from_DB147.php"); ?>"
  onsubmit="return overify (this)">
  <?php 
    $i = 0;
    onBD ($result, "PHOTO");   
    while($row = mysqli_fetch_array ($result))
      $i++;
    if ($i > 0)
    {
      echo "<p class='cent'>
        Выберите название иллюстрации, которую Вы хотите удалить:<br/>
        <select name='photos' SIZE='1' id='ind' onchange='submitForm(\"removePhoto147\")'></p>";
      onBD ($result, "PHOTO");
      while($row = mysqli_fetch_array ($result))
      {
        echo "<option value='".$row [0]."'";
        if ($row [0] == $ind)
          echo " selected";
        echo "/>".$row [2];
      }
      echo "</select><br/>
      <div id='dest'>";
      onBD ($result, "PHOTO");
      while ($row = mysqli_fetch_array ($result))
        if ($row [0] == $ind)
          if (file_exists ($row [2]))
            echo "<p class='cent'><img src = '".$row [2]."' alt=''/></p><br/>";
          else
            echo "<p class='cent'>Ни один файл с иллюстрацией не соответствует этой записи из базы данных.
            Вероятно, необходимая Вам иллюстрация ещё не загружена.</p><br/>";
      echo "</div>
        <p class='cent'><input type='submit' name='Remove' value='Удалить'></p>";
    }
    else
      echo "<p class='cent'>На данный момент иллюстраций в газете нет.</p>";
  echo "</body>
    </html>";
?>
</form>
<script language="javascript">
  function overify (f)
  {
    if (confirm ('Вы действительно хотите удалить фотографию "' + f.photos.options[f.photos.selectedIndex].text + '"?'))
   	  return true;
   	else
   	  return false;
  }
</script>