<?php
  header ("Content-type: text/html; charset=utf-8");
  echo "<meta name='robots content='noindex'/>";
  include "functions147.php";
  $ind = $_GET ["ind"];
  $nom = "connection";
  $dirct = "gb"; 
  $hdl = opendir ($dirct);
  $k = 0;
  while ($file = readdir ($hdl))
    if (strstr ($file, $nom)==True)
    {
      $text=file_get_contents ($dirct."/".$file);
      $k++;
      if ($k == $ind)
      {
        echo "<p class='cent'>
          Исправьте ошибку в тексте сообщения:<br/> 
          <textarea name='message_text' cols='60' rows='10' wrap='virtual'/>";
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
?>