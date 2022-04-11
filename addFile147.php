<meta name="robots" content="noindex"/>
<?php
  include "head.php";
?>
<form enctype="multipart/form-data" action="add_file_to_server147.php" method="POST" onsubmit="return
  overify (this)">
  <p class='cent'>
    Выберите файл:<br/>
    <input name="myfile" type="file"/><br/>
    <br/>
    <input type="submit" value="Загрузить"/>
  </p>
</form>
<?php 
  echo "</body>
    </html>";
?>
<script language="javascript">
  function overify (f)
  {
    if (f.myfile.value.length == 0)
    {
      alert ("Вы не выбрали файл!");
      return false;
    }
    return true;
  }
</script>