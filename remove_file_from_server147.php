<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  $dirct = "../Newspaper6";
  $hdl = opendir ($dirct);
  $j = 0;  
  while ($file = readdir ($hdl))
  {
    $j++;
    if ($j == $_POST ["files"])
    {
      unlink ($file);
      echo "<p class = 'cent'>Файл успешно удалён.</p>";
    }
  }
  echo "</body>
    </html>";
?>