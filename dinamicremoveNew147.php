<?php
  header ("Content-type: text/html; charset=utf-8");
  echo "<meta name='robots content='noindex'/>";
  include "functions147.php";
  $ind = $_GET ["ind"];
  $nom = "new";
  $dirct = "news";
  $hdl = opendir($dirct);
  $j = 0;
  while ($file = readdir ($hdl))
    if (strstr ($file, $nom) == yrue)
    {
      $j++;
      if ($ind == $j)
      {
        echo "<table width='100%'><tr><td width='150' bgcolor='#ffbb00'>№".$j;
        $file1 = fopen ($dirct."/".$file, "r");
        echo fgets ($file1, 10000);
        while (!feof ($file1))
        {
      	  $i = 0;
          $temp = fgets ($file1, 10000);
      	  while (substr ($temp, $i, 1) == " ")
      	    $i++;
      	  for ($k = 0; $k < $i; $k++)
            echo "&nbsp";
          echo substr ($temp, $i, strlen($temp) - $i);
      	  echo "<br/>";
        }
      }
    }   
?>