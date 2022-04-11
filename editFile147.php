<meta name="robots" content="noindex"/>
<script type="text/javascript" src="ajax.js"></script>
<?php
  include "head.php";
  include "functions147.php";
  if (!isset ($_GET ["files"]))
    $ind = 1;
  else 
	$ind = $_GET ["files"];
?>
<form method="post" name="form" action="<?php echo ("edit_file_on_server147.php"); ?>"
  onsubmit="return overify(this)">
  <?php
    $dirct = "../localhost/Newspaper6";
    $hdl = opendir ($dirct); 
    $i = 0;
    while ($file = readdir ($hdl))
      $i++;
    if ($i > 0)
    {
      echo "<p class='cent'>
        Выберите файл, который Вы хотите редактировать:<br/>
        <select name='files' size='1' id='ind' onchange='submitForm(\"editFile147\")'>";
      $hdl = opendir ($dirct); 
      $j = 0;
      while ($file = readdir ($hdl))
      {
        $j++;
        echo "<option value='".$j."'/>".$file;
      }
      echo "</select></p>
      <div id='dest'>";
      $hdl = opendir ($dirct);
      $i = 0; 
      while ($file = readdir ($hdl))
      {
        $i++;
        if ($i == $ind)
        {
          echo "<p class='cent'>Редактировать текст файла:<br/> 
          <textarea name='file_text' cols='60' rows='10' wrap='virtual'>";
          include $file;
          echo "</textarea><br/>
          <br/>
          <input name= 'submit' type='submit' value='Редактировать'/></p>";        	 
        }
      }
    }
    else
      echo "<p class='cent'>На данный момент файлов в каталоге нет.</p>";
  ?>
  </form>
<?php 
  echo "</body>
    </html>";
?>

<script language="javascript">
  function overify (f)
  {
    if (f.file_text.value.length == 0)
    {
      alert ("Вы удалили текст файла вообще!");
      return false;
    }
    if (confirm ('Сохранить данные о файле \"' + f.files.options[f.files.selectedIndex].text + '\"?'))
  	  return true;
  	else
  	  return false;
  }
</script>