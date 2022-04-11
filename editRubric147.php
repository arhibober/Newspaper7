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
    while($row = mysqli_fetch_array ($result))
    {
      $temp = $row[0];
      break;
    }
  }
  else
    $temp = 1;
  if (!isset ($_GET ["rubrics"]))
    $ind = $temp;
  else 
	$ind = $_GET ["rubrics"];
?>
<form method="post" name="form" action="<?php echo ("edit_rubric_in_DB147.php"); ?>" onsubmit="return overify (this)"/>
  <?php 
    $i = 0;
    onBD ($result, "RUBRIC");   
    while ($row = mysqli_fetch_array ($result))
      $i++;
    if ($i > 0)
    {
      echo "<p class='cent'>
        Выберите рубрику, которую Вы хотите редактировать:<br/>
        <select name='rubrics' size='1' id='ind' onchange='submitForm(\"editRubric147\")'>";
      onBD ($result, "RUBRIC");   
      while ($row = mysqli_fetch_array ($result))
      {
        echo "<option value='".$row [0]."'";
        if ($row [0] == $ind)
          echo " selected";
        echo "/>".$row [1];
      }
      echo "</select>
      </p>
      <div id='dest'>";
      onBD ($result, "RUBRIC");   
      while ($row = mysqli_fetch_array ($result))
        if ($row [0] == $ind)
          echo "<p class='cent'>
            Название рубрики в единственном числе:<br/>
            <input type='text' name='Rubric_one' wrap='virtual' value='".$row[1]."'><br/>
            Название рубрики во множественном числе:<br/>
            <input type='text' name='Rubric_many' wrap='virtual' value='".$row[2]."'><br/>
            <input type='submit' name='Edit' value='Редактировать'>
            </p>
            </div>";          
   }
   else
     echo "<p class='cent'>Ни одной рубрики газеты на этом сайте пока не описано.</p>";
?>
</form>
<?php 
  echo "</body>
    </html>";
?>
<script language="javascript">
  function overify (f)
  {
    b = true;
    if (f.Rubric_one.value.length == 0)
    {
      alert("Вы удалили название рубрики в единственном числе вообще!");
      b = false;
    }
    if (f.Rubric_many.value.length == 0)
    {
      alert ("Вы удалили название рубрики во множественном числе вообще!");
      return false;
    }
    if (b)
      if (confirm('Сохранить данные о рубрике \"' + f.rubrics.options[f.rubrics.selectedIndex].text + '\"?'))
        return true;
      else
        return false;
  	return false;       
  }
</script>