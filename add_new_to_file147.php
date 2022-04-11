<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  $dirct = "news";
  $nom = "new";
  $new2 = strip_tags ($_POST["new_text"]);
  $new1 = "<br/>".date ("d/m/Y H:i", time ())."</p></td><td bgcolor='#ffffff'>\n".$new2."</td></tr></table>";
  $otznam = $nom.time ();
  $hdl = fopen ($dirct."/".$otznam, "w+");
  fwrite ($hdl, $new1);
  fclose ($hdl);
  echo "<p class='cent'>Новость успешно загружена.</p>";
  echo "</body>
    </html>";
?>