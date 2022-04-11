<?php
  $dirct = "gb";
  $nom = "connection";
  $otziv2 = strip_tags ($_POST ["otziv"]);
  $otziv4 = strip_tags ($_POST ["nickName"]);
  if (strlen ($otziv2) > 0)
  {
    $otziv4 = substr ($otziv4, 0, 4500);
    $otziv2 = substr ($otziv2, 0, 4500);
    $otziv1 = "&nbsp;&nbsp;".date ("d/m/Y H:i",time ())."</td><td bgcolor='#ffffff' width='80%' rowspan='2'>\n".
    $otziv2."</td></tr><tr><td width='20%' class='brown'>".$otziv4."</td></tr></table>";
    $otznam = $nom.time ();
    $hdl = fopen ($dirct."/".$otznam, "w+");
    fwrite ($hdl, $otziv1);
    fclose ($hdl);
  }
  include "connection.php";
?>