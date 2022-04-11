<meta name="robots" content="noindex"/>
<script type="text/javascript" src="ajax.js"></script>
<?php
  include "head.php";
  include "functions147.php";
  if (!isset ($_GET ["news"]))
    $ind = 1;
  else
	$ind = $_GET ["news"];
?>
<form method="post" name="form" action="<?php echo ("edit_new_in_file147.php"); ?>" onsubmit="return overify (this)">
  <?php
    $nom = "new";
    $dirct = "news";
    $hdl = opendir ($dirct);
    $i = 0;
    while ($file = readdir ($hdl))
      if (strstr ($file, $nom) == true)
        $i++;
    if ($i > 0)
    {
      echo "<p class='cent'>
        Выберите индекс новости, которую Вы хотите корректировать:<br/>
        <select name='news' size='1' id='ind' onchange='submitForm(\"editNew147\")'>";
      $hdl = opendir ($dirct);
      $j = 0;
      while ($file = readdir ($hdl))
        if (strstr ($file, $nom) == true)
        {
      	  $j++;
          echo "<option value='".$j."'/>".$j;
      	}
      echo "</select>
        </p>
        <div id='dest'>";
      $hdl = opendir ($dirct);
      $k = 0;
      while ($file = readdir ($hdl))
        if (strstr ($file, $nom)==True)
      	{
      	  $text = file_get_contents ($dirct."/".$file);
      	  $k++;
          if ($k == $ind)
          {
            echo "<p class='cent'>
              Исправьте ошибку в тексте новости:<br/> 
              <textarea name='new_text' cols='60' rows='10' wrap='virtual'>";
          	$new_text = file_get_contents ($dirct."/".$file);
          	$j = strlen ($new_text) - 19;
          	while (substr ($new_text, $j, 1) != ">")
          	  $j--;
          	echo substr( $new_text, $j + 1, strlen ($new_text) - 19 - $j);
          	echo "</textarea><br/>
          	<br/>
            <input name= 'submit' type='submit' value='Редактировать'/>
            </p>";        	 
          }
      	}
      echo "</div>";
    }
    else
      echo "<p class='cent'>На данный момент новостей нет.</p>"
  ?>
</form>
<?php 
  echo "</body>
    </html>";
?>

<script language="javascript">
  function overify (f)
  {
    if (f.new_text.value.length == 0)
    {
      alert ("Вы удалили текст новости вообще!");
      return false;
    }
   	return true;
  }
</script>