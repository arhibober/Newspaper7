<meta name="robots" content="noindex"/>
<script type="text/javascript" src="ajax.js"></script>
<?php
  include "head.php";  
  include "functions147.php"; 
  onBD ($result, "WORD_TYPE");
  while ($row = mysqli_fetch_array ($result))
    $i++;   
  if ($i > 0)
  {
    onBD ($result, "WORD_TYPE");
    while ($row = mysqli_fetch_array ($result))
    {
      $temp = $row [0];
      break;
    }
  }
  else
    $temp = 1;
  if (!isset($_GET ["word_types"]))
    $ind = $temp;
  else 
	$ind = $_GET ["word_types"];	
?>
<form method="post" name="form" action="<?php echo "remove_word_type_from_DB147.php"; ?>" onsubmit="return overify (this)">
  <?php 
    $i = 0;
    onBD ($result, "WORD_TYPE");   
    while ($row = mysqli_fetch_array ($result))
      $i++;
    if ($i > 0)
    {
      echo "<p class='cent'>
        Выберите категорию слов в словарях, которую Вы хотите удалить:<br/>
        <select name='word_types' size='1'>";
      onBD ($result, "WORD_TYPE");
      while ($row = mysqli_fetch_array ($result))
      {
        echo "<option value='".$row [0]."'";
        if ($row [0] == $ind)
          echo " selected";
        echo "/>".$row [1];
      }
      echo "</select><br/></p>
      <p class='cent'><input type='submit' name='Remove' value='Удалить'></p>";
    }
    else
      echo "<p class='cent'>На данный момент слова в словарях ещё не разбиты на категории.</p>";
  echo "</body>
    </html>";    
?>
</form>
<script language="javascript">
  function overify (f)
  {
    if (confirm ('Вы действительно хотите удалить категорию \"' + f.word_types.options[f.word_types.selectedIndex].text + '\"?'))
      return true;
    else
      return false;
  }
</script>