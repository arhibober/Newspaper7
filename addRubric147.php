<meta name="robots" content="noindex"/>
<?php
  include "head.php";
?>
<form method="post" name="form" action="<?php echo ("add_rubric_to_DB147.php"); ?>" onSubmit="return overify (this)">
  <p class='cent'>
    Название рубрики в единственном числе:<br/>
    <input type="text" name="Rubric_one"/><br/>
    Название рубрики во множественном числе:<br/>
    <input type="text" name="Rubric_many"/><br/>
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
    if (f.Rubric_one.value.length == 0)
    {
      alert ("Вы не ввели название рубрики в единственном числе!");
      return false;
    }
    return true;       
  }
</script>