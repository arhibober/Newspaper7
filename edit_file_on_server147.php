<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  $dirct = "../Newspaper6";
  $hdl = opendir ($dirct); 
  $i = 0;
  while ($file = readdir ($hdl))
  {
    $i++;
    if ($i == $_POST ["files"])
    {
      $hdl1 = fopen ($file, "w+");      
      fwrite ($hdl1, $_POST ["file_text"]);
      fclose ($hdl1);
      echo "<p class='cent'>Ошибка в тексте исправлена успешно.</p>";
    }
  }
  echo "</body>
    </html>";
?>