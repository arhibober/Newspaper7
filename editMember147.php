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
<form method="post" name="form" action="<?php echo ("edit_member_in_DB147.php"); ?>"
  onsubmit="return overify(this)">
<p class="cent">
  <?php 
    $i = 0;
    onBD ($result, "MEMBER");   
    while ($row = mysqli_fetch_array ($result))
      $i++;
    if ($i > 0)
    {
      echo "Выберите участника, данные о котором Вы хотите изменить:<br/>
        <select name='members' size='1' id='ind' onchange='submitForm(\"editMember147\")'>";      
      onBD ($result, "MEMBER");
      while ($row = mysqli_fetch_array ($result))
      {
        echo "<option value='".$row [0]."'";
        if ($row [0] == $ind)
          echo " selected";
        echo "/>".$row [1]." ".$row [2];
      }
      echo "</select>
      <div id='dest'>";
      onBD ($result, "MEMBER");   
      while ($row = mysqli_fetch_array ($result))
        if ($row [0] == $ind)
           echo "<p class='cent'>
             Имя участника:<br/>
             <input type='text' name='Name_member' wrap='virtual' value='".$row [1]."'/><br/>
             Фамилия участника:<br/>
             <input type='text' name='Sername_member' wrap='virtual' value='".$row [2]."'/><br/>
             Должность участника:<br/>
             <input type='text' name='Status_member' wrap='virtual' value='".$row [3]."'/><br/><br/>
             <input type='submit' name='Edit' value='Редактировать'/>
             </p>
             </div>";
    }
    else
      echo "<p class='cent'>На данный момент никто из редколлегии газеты на сайте не зарегистрирован.</p>";  
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
    b = true;
    if (f.Name_member.value.length == 0)
    {
      alert ("Вы удалили имя участника вообще!");
      b = false;
    }
    if (f.Sername_member.value.length == 0)
    {
      alert ("Вы удалили фамилию участника вообще!");
      b = false;
    }
    if (f.Status_member.value.length == 0)
    {
      alert ("Вы удалили должность участника вообще!");
      b = false;
    }
    if (b)  
      if (confirm ('Сохранить данные об участнике \"' + f.members.options[f.members.selectedIndex].text + '\"?'))
        return true;
      else
        return false;
	return false;
  }
</script>