<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  $m1 = $_POST ["news"];
  $nom = "new";
  $dirct = "news";
  $hdl = opendir ($dirct);
  $j = 0;
  while ($file = readdir ($hdl)) 
    if (strstr ($file, $nom) == true)
   	{
      $j++;
      if ($m1 == $j)
        unlink ($dirct."/".$file);
   	}
  echo "<p class = 'cent'>Новость успешно удалена.</p>
  </body>
  </html>";
?>