<meta name="robots" content="noindex"/>
<script type="text/javascript" src="ajax.js"></script>
<?php
  include "head.php";
  include "functions147.php";
  onBD ($result, "NUMBER");
  while ($row = mysqli_fetch_array ($result))
    $i++;   
  if ($i > 0)
  {
    onBD ($result, "NUMBER");
    while ($row = mysqli_fetch_array ($result))
    {
      $temp = $row [0];
      break;
    }
  }
  else
    $temp = 1;
  if (!isset ($_GET ["numbers"]))
    $ind = $temp;
  else 
	$ind = $_GET ["numbers"];
?>
<form method="post" name="form" action="<?php echo "remove_number_from_DB147.php"; ?>" onsubmit="return overify (this)">
  <?php
    $i = 0;
    onBD ($result, "NUMBER");   
    while($row = mysqli_fetch_array ($result))
      $i++;
    if ($i > 0)
    {
      echo "<p class='cent'>
        Выберите номер газеты (сквозной), который Вы хотите удалить:<br/>
        <select name='numbers' SIZE='1' id='ind' onchange='submitForm(\"removeNumber147\")'>";
      onBD ($result, "NUMBER");
      while ($row = mysqli_fetch_array ($result))
      {
        echo "<option value='".$row [0]."'";
        if ($row [0] == $ind)
          echo " selected";
        echo "/>".$row [0];
      }
      echo "</select><br/>
      </p>
      <div id='dest'><p class='cent'><a href='number_info.php?id=".$ind."'>Просмотреть информацию о номере</a></p>
      </div>
      <br/>
      <p class='cent'><input type='submit' name='Delete' value='Удалить'></p>";
    }
    else
      echo "На данный момент газета на сайте отсутствует.";
?>
</form>
<?php
  echo "</body>
    </html>";    
?>
<script language="javascript">
  function overify (f)
  {
    if (confirm ("Вы действительно хотите удалить из базы данных сведения о " +
      f.numbers.options [f.numbers.selectedIndex].text + "-ом номере газеты?"))
   	  return true;
   	else
   	  return false;
  }
</script>