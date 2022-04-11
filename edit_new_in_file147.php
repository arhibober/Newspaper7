<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  $dirct = "news";
  $nom = "new";
  $new2 = strip_tags ($_POST["new_text"]);
  $dirct_open = opendir ($dirct);
  $j = 0;
  $number = $_POST ["news"];
  while ($file = readdir ($dirct_open)) 
    if (strstr ($file, $nom) == true)
    {
      $j++;
      if ($number == $j)
      {
        $time1 = substr ($file, 3, strlen($file) - 3);
        $new3 = substr ($new1, 0, 9000);
        $new1 = "<br/>".date ("d/m/Y H:i", $time1)."</p></td><td bgcolor='#ffffff'>\n".$new2.
          "</td></tr></table></p>";
        $hdl = fopen ($dirct."/".$file, "w+");
        fwrite ($hdl, $new1);
        fclose ($hdl);
        echo "<p class='cent'>Ошибка в новости исправлена.</p>";
      }
    }
  echo "</body>
    </html>";
?>