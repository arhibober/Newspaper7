<meta name="robots" content="noindex"/>
<script type="text/javascript" src="ajax.js"></script>
<?php
  include "head.php";
?>
<form method="post" name="form" action="<?php echo "add_epopee_to_DB147.php"; ?>" enctype="multipart/form-data" onsubmit="return overify (this)">
  <p class="cent">
    Название статьи:<br/>
    <input type="text" name="Name_epopee"><br/>
    <input type="submit" name="Add" value="Добавить">
  </p>
</form>
<?php
  echo "</body>
    </html>";?>
<script language="javascript">
  function overify (f)
  {
    if (f.Name_epopee.value.length == 0)
    {
      alert ("Вы не ввели название статьи!");
      return false;
    }
    return true;
  }
</script>