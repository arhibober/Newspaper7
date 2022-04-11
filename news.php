<?php
  $page = 6;
  include "head.php";      
  echo "<p class='cent'>Здесь отображаются все новости, касающиеся выпуска новых номеров
   газеты, а также дизайна сайта.</p>";
  $nom = "new";
  $dirct = "news"; 
  $hdl = opendir ($dirct);
  echo "<br/>"; 
  while ($file = readdir ($hdl)) 
    if (strstr ($file, $nom) == true)
      $a [] = $file;
  $l = sizeof ($a);
  if ($l == 0)
    echo "<p class='cent'>На данный момент не было зарегистрировано ни одной новости.</p>" ;
  else
  { 
  	echo "<h4 class='cent'>Последние новости:</h4>";
  	echo ("<table border='0'>");
    rsort($a); 
    foreach ($a as $k)
    {
      echo "<table width='100%' cellpadding='5' border = '0'><tr><td width='20%' bgcolor='#804000'>
      <p class = 'yellow'>№".$l;
      $file = fopen ("$dirct/$k", "r");
      echo fgets ($file, 10000);
      while (!feof ($file))
      {
      	$i=0;
        $temp = fgets ($file, 10000);
      	while (substr ($temp, $i, 1) == " ")
      	  $i++;
      	for ($j = 0; $j < $i; $j++)
      	  echo "&nbsp";
        echo substr ($temp, $i, strlen ($temp) - $i);
      	$b=true;
      	echo "<br/>";
      }
      fclose ($file);
      $l--;     
    }
  }
       echo "</td>
</tr>
      <tr>
<td colspan='6' style='text-align: center;'>";
?>
<div style="margin: 0 auto;">
<!--LiveInternet counter--><script type="text/javascript"><!--
  document.write ("<a href='http://www.liveinternet.ru/stat/localhost/Newspaper6/' " + "target=_blank><img src='//counter.yadro.ru/hit?t52.6;r" + escape (document.referrer) + ((typeof (screen) == "undefined") ? "" : ";s" + screen.width + "*" + screen.height + "*" + (screen.colorDepth ? screen.colorDepth : screen.pixelDepth)) + ";u" + escape (document.URL) + ";"+Math.random () + "' alt='' title='LiveInternet: показано число просмотров и" + " посетителей за 24 часа' " + "border='0' width='88' height='31'><\/a>");
//--></script><!--/LiveInternet-->
</div>
          </td>
        </tr>
      </table>
    </body>
  </html>