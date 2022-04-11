<?php
  header ("Content-type: text/html; charset=utf-8");
  echo "<meta name='robots content='noindex'/>";
  $ind= $_GET ["ind"];
  $dirct = "../localhost/Newspaper6";
  $hdl = opendir ($dirct);
  $i = 0;
  while ($file = readdir ($hdl))
  {
    $i++;
    if ($i == $ind)
    {
      echo "<p class='cent'>
        Редактировать текст файла:<br/> 
        <textarea name='file_text' cols='60' rows='10' wrap='virtual'/>";
        include $file;
        echo "</textarea>
        <br/>
        <br/>
        <input name= 'submit' type='submit' value='Редактировать'/>
      </p>";        	 
    }
  } 
?>