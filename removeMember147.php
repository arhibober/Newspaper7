<meta name="robots" content="noindex"/>
<script type="text/javascript" src="ajax.js"></script>
<?php
  include "head.php";  
  include "functions147.php";
  onBD ($result, "MEMBER");
  while ($row = mysqli_fetch_array ($result))
    $i++;   
  if ($i > 0)
  {
    onBD ($result, "MEMBER");
    while ($row = mysqli_fetch_array ($result))
    {
      $temp = $row [0];
      break;
    }
  }
  else
    $temp = 1;
  if (!isset ($_GET ["members"]))
    $ind = $temp;
  else 
	$ind = $_GET ["members"];	
?>
<form method="post" name="form" action="<?php echo "remove_member_from_DB147.php"; ?>"
  onsubmit="return overify (this)">
  <p class='cent'>
  <?php 
    $i = 0;
    onBD ($result, "MEMBER");   
    while($row = mysqli_fetch_array($result))
      $i++;
    if ($i > 0)
    {
      echo "Выберите участника, данные о котором вы хотите удалить:<br/>
     <select name='members' size='1' id='ind' onchange='submitForm(\"removeMember147\")'>";
      onBD ($result, "MEMBER"); 
      while ($row = mysqli_fetch_array ($result))
      {
        echo "<option value='".$row [0]."'";
        if ($row [0] == $ind)
          echo " selected";
        echo ">".$row [1]." ".$row [2];
      }
      echo "</select><br/>
      <br/>
      <input type='submit' name='Remove' value='Удалить'>";
    }
    else
      echo "На данный момент ни один участник редколлегии газеты не зарегистрирован на сайте.";
?>
</p>
</form>
<?php
  echo "</body>
    </html>";    
?>
<script language="javascript">
  function overify (f)
  {
    if (confirm ("Вы действительно хотите удалить информацию об участнике " + f.members.options [f.members.selectedIndex].text + "?"))
      return true;
    else
      return false;
  }
</script>