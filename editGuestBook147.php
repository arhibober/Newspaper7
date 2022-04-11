<meta name="robots" content="noindex"/>
<script type="text/javascript" src="ajax.js"></script>
<?php
  include "head.php";
  include "functions147.php";
  if (!isset ($_GET ["messages"]))
    $ind = 1;
  else
	$ind = $_GET ["messages"];
?>
<form method="post" name="form" action="<?php echo ("edit_message147.php"); ?>" onsubmit="return overify(this)">
  <?php
    $nom = "connection";
    $dirct = "gb";
    $hdl = opendir ($dirct);
    $i = 0;
    while ($file = readdir ($hdl))
      if (strstr ($file, $nom) == true)
        $i++;
    if ($i > 0)
    {
      echo "<p class='cent'>
        Выберите индекс сообщения, которую Вы хотите корректировать:<br/>
        <select name='messages' size='1' id='ind' onchange='submitForm (\"editGuestBook147\")'>";
      $hdl = opendir ($dirct);
      $j = 0;
      while ($file = readdir ($hdl))
        if (strstr ($file, $nom) == true)
        {
          $j++;
          echo "<option value='".$j."'/>".$j;
      	}
      echo "</select></p>
        <div id='dest'>";
      $hdl = opendir ($dirct);
      $k = 0;
      while ($file = readdir ($hdl))
        if (strstr ($file, $nom) == true)
      	{
      	  $text = file_get_contents ($dirct."/".$file);
      	  $k++;
          if ($k == $ind)
          {
            echo "<p class='cent'>
              Исправьте ошибку в тексте сообщения:<br/> 
              <textarea name='message_text' cols='60' rows='10' wrap='virtual'>";
          	$message_text = file_get_contents ($dirct."/".$file);
          	$j = 81;
          	while (substr ($message_text, $j, 1) != "<")
          	  $j++;
          	echo substr ($message_text, 81, $j - 81);
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