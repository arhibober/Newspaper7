<meta name="robots" content="noindex"/>
<script type="text/javascript" src="ajax.js"></script>
<?php
  include "head.php";  
  include "functions147.php"; 
  onBD ($result, "EPOPEES");
  while ($row = mysqli_fetch_array($result))
    $i++;   
  if ($i > 0)
  {
    onBD ($result, "EPOPEES");
    while ($row = mysqli_fetch_array($result))
    {
      $temp = $row[0];
      break;
    }
  }
  else
    $temp = 1;
  if (!isset ($_GET ["epopees"]))
    $ind = $temp;
  else 
	$ind = $_GET ["epopees"];	
?>
<form method="post" name="form" action="<?php echo ("remove_epopees_from_DB147.php"); ?>" onsubmit="return overify (this)">
  <?php 
    $i = 0;
    onBD ($result, "EPOPEES");   
    while ($row = mysqli_fetch_array ($result))
      $i++;
    if ($i > 0)
    {
      echo "<p class='cent'>
        Выберите название статьи, которую Вы хотите удалить:<br/>
        <select name='epopees' SIZE='1'>";
      onBD ($result, "EPOPEES");
      while ($row = mysqli_fetch_array ($result))
      {
        echo "<option value='".$row [0]."'";
        if ($row [0] == $ind)
          echo " selected";
        echo ">".$row [1];
      }
      echo "</select><br/></p>
      <p class='cent'><input type='submit' name='Remove' value='Удалить'></p>";
    }
    else
      echo "<p class='cent'>На данный момент статей, публиковавшихся в нескольких номерах, в газете нет.</p>";
  echo "</body>
    </html>";?>
</form>
<?php
  echo "</body>
    </html>";    
?>
<script language="javascript">
  function overify (f)
  {
    if (confirm ('Вы действительно хотите удалить статью \"' + f.epopees.options[f.epopees.selectedIndex].text + '\"?'))
      return true;
    else
      return false;
  }
</script>