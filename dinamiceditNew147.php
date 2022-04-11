<?php
  header ("Content-type: text/html; charset=utf-8");
  echo "<meta name='robots content='noindex'/>"; 
  include "functions147.php";
  $ind = $_GET ["ind"];
  $nom = "new";
  $dirct = "news"; 
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
          Исправьте ошибку в тексте новости:<br/> 
          <textarea name='new_text' cols='60' rows='10' wrap='virtual'/>";
        $new_text = file_get_contents ($dirct."/".$file);
        $j = strlen ($new_text) - 19;
        while (substr ($new_text, $j, 1) != ">")
          $j--;
        echo substr($new_text, $j + 1, strlen ($new_text) - 19 - $j);
        echo "</textarea>
          <br/>
          <br/>
          <input name= 'submit' type='submit' value='Редактировать'/>
        </p>";        	 
      }
    }
?>