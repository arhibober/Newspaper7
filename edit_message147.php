<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  $dirct = "gb";
  $nom = "connection";
  $otziv3 = strip_tags ($_POST ["message_text"]);
  $number = $_POST ["messages"];
  $dirct_open = opendir ($dirct);
  $j = 0;
  while ($file = readdir ($dirct_open)) 
    if (strstr ($file, $nom) == true)
    {
      $j++;
      if ($number == $j)
      {
        $time1 = substr ($file, 10, strlen($file) - 10);
        $text = file_get_contents ($dirct."/".$file);
        $i = 81;
        while (substr ($text, $i, 1) != "<")
          $i++;
        $otziv3 = substr ($otziv3, 0, 4500);
        $otziv1 = "&nbsp;&nbsp;".date ("d/m/Y H:i", $time1).
        "</td><td bgcolor='#ffffff' width='700' rowspan='2'>\n".$otziv3.substr ($text, $i, strlen($text) - $i);
        $hdl = fopen ($dirct."/".$file, "w+");
        fwrite ($hdl, $otziv1);
        fclose ($hdl);
        echo "<p class='cent'>Сообщение отредактировано успешно.</p>";
      }
    }
    echo "</body>
      </html>";
?>