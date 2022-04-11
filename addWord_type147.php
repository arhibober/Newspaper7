<meta name="robots" content="noindex"/>
<script type="text/javascript" src="ajax.js"></script>
<?php
  include "head.php";
  include "functions147.php";
?>
<form method="post" name="form" action="<?php echo ("add_word_type_to_DB147.php"); ?>"
  enctype="multipart/form-data" onsubmit="return overify(this)">
  <p class="cent">
    Название категории:<br/>
    <input type="text" name="word_type"/><br/>
    Выберите словарь, к которому Вы хотите подключить категорию:<br/>
    <select name="dictionaris" SIZE="1">
    <?php 
      onBD ($result, "DICTIONARIS");
      while ($row = mysqli_fetch_array ($result))
        echo "<option value='".$row [0]."'/>".$row [1];
    ?>  
    </select>
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
    if (f.word_type.value.length == 0)
    {
      alert ("Вы не ввели название категории!");
      return false;
    }
    return true;
  }
</script>