<meta name="robots" content="noindex"/>
<script type="text/javascript" src="ajax.js"></script>
<?php
  include "head.php";  
  include "functions147.php";
  onBD ($result, "DICTIONARIS");
  while($row = mysqli_fetch_array ($result))
    $i++;   
  if ($i > 0)
  {
    onBD ($result, "DICTIONARIS");
    while ($row = mysqli_fetch_array ($result))
    {
      $temp = $row [1];
      break;
    }
  }
  else
    $temp = 1;
  if (!isset ($_GET ["dictionaris"]))
    $ind = $temp;
  else
	$ind = $_GET ["dictionaris"];
?>
<form method="post" name="form" action="<?php echo ("remove_dictionary_from_DB147.php"); ?>" 
  onsubmit="return overify (this)">
  <?php
    $i = 0;
    onBD ($result, "DICTIONARIS");   
    while ($row = mysqli_fetch_array ($result))
      $i++;
    if ($i > 0)
    {
      echo "<p class='cent'>
        Выберите словарь, который Вы хотите удалить:<br/>
        <select name='dictionaris' SIZE='1'>";
      onBD ($result, "DICTIONARIS");
      while ($row = mysqli_fetch_array ($result))
      {
        echo "<option value='".$row [0]."'";
        if ($row [0] == $ind)
          echo " selected";
        echo "/>".$row [1];
      }
      echo "</select><br/>
        </p>
        <p class='cent'><input type='submit' name='Remove' value='Удалить'></p>";
    }
    else
      echo "<p class='cent'>На данный момент словарей в газете нет.</p>";
?>
</form>
<?php
  echo "</body>
    </html>";    
?>
<script language="javascript">
  function overify (f)
  {
    if (confirm ("Вы действительно хотите удалить " + f.dictionaris.options[f.dictionaris.selectedIndex].text + "?"))
   	  return true;
   	else
   	  return false;
  }
</script>