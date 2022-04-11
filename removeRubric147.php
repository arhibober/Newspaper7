<meta name="robots" content="noindex"/>
<script type="text/javascript" src="ajax.js"></script>
<?php
  include "head.php";  
  include "functions147.php";
  onBD ($result, "RUBRIC");
  while ($row = mysqli_fetch_array ($result))
    $i++;   
  if ($i > 0)
  {
    onBD ($result, "RUBRIC");
    while ($row = mysqli_fetch_array ($result))
    {
      $temp = $row [0];
      break;
    }
  }
  else
    $temp = 1;
  if (!isset ($_GET ["connections"]))
    $ind = $temp;
  else 
	$ind = $_GET ["connections"];
?>
<form method="post" name="form" action="<?php echo "remove_rubric_from_DB147.php"; ?>" onsubmit="return overify (this)">
  <p class="cent">
  <?php 
    $i = 0;
    onBD ($result, "RUBRIC");   
    while ($row = mysqli_fetch_array ($result))
      $i++;
    if ($i > 0)
    {
      echo "Выберите рубрику, которую Вы хотите удалить:<br/>
        <select name='rubrics' size='1' id='ind' onchange='submitForm(\"removeRubric147\")'>";
      onBD ($result, "RUBRIC");    
      while($row = mysqli_fetch_array ($result))
      {
        echo "<option value='".$row [0]."'";
        if ($row [0] == $ind)
          echo " selected";
        echo "/>".$row [1];
      }
      echo "</select><br/><br/>
      <input type='submit' name='Remove' value='Удалить'/>";
    }
    else
      echo "Ни одной рубрики газеты на этом сайте пока не описано.";
  echo "</body>
    </html>";
  ?>
  </p>
</form>
<script language="javascript">
  function overify (f)
  {
    if (confirm ('Вы действительно хотите удалить информацию о рубрике "' + f.rubrics.options[f.rubrics.selectedIndex].text + '"?'))
      return true;
    else
      return false;
  }
</script>