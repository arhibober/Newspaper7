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
<form enctype="multipart/form-data" action="remove_file_from_server147.php" method="post" onsubmit="return
  overify(this)">
<?php
  $dirct = "../localhost/Newspaper6";
  $hdl = opendir($dirct); 
  $i = 0;
  while ($file = readdir ($hdl))
    $i++;
  if ($i > 0)
  { 
  	echo "<p class='cent'>
  	  Выберите файл, который Вы хотите удалить:<br/>
      <select name='files' size='1' id='ind' onchange='submitForm (\"removeFile147\")'>";
    $hdl = opendir($dirct);
    $j=0;
    while ($file = readdir($hdl))
    {
      $j++;
      echo "<option value='".$j."'>".$file;
    }
    echo "</select>
    </p>
    <div id='dest'>";
    $hdl = opendir ($dirct);
    $j = 0;
    while ($file = readdir ($hdl))
    {
      $j++;
      if ($j == $ind)
        echo "<p class='cent'><a href='".$file."'>Ссылка на файл</a></p>";
    }
    echo "</div>";
  }
  else
    echo "<p class='cent'>На данный момент файлов в каталоге нет.</p>";
  echo "</body>
    </html>";
?>
<p class = "cent"><input type="submit" value="Удалить"></p>
</form>
<?php
  echo "</body>
    </html>";    
?>
<script language="javascript">
  function overify (f)
  {
    if (confirm ('Вы действительно хотите удалить файл \"' + f.files.options[f.files.selectedIndex].text + '\"?'))
      return true;
    else
      return false;
  }
</script>