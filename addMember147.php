<meta name="robots" content="noindex"/>
<?php
  include "head.php";
?>
<form method="post" name="form" action="<?php echo ("add_member_to_DB147.php"); ?>" onsubmit="return overify (this)">
  <p class="cent">
    Имя участника:<br/>
    <input type="text" name="Name_member"/><br/>
    Фамилия участника:<br/>
    <input type="text" name="Sername_member"/><br/>
    Должность участника:<br/>
    <input type="text" name="Status_member"/><br/>
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
    b = true;
    if (f.Name_member.value.length == 0)
    {
      alert ("Вы не ввели имя участника!");
      return false;
    }
    if (f.Sername_member.value.length == 0)
    {
      alert ("Вы не ввели фамилию участника!");
      return false;
    }
    if (f.Status_member.value.length == 0)
    {
      alert ("Вы не ввели должность участника!");
      return false;
    }
    return b; 
  }
</script>