<?php
  $page = 5;  
  include "head.php";
  $nom = "connection";
  echo "<p class='cent'>На этой странице вы можете оставлять
    свои замечания по поводу газеты и сайта.</p>";
  $dirct = "gb";
  $hdl = opendir ($dirct);
  while ($file = readdir ($hdl)) 
    if (strstr ($file, $nom) == true)
      $a [] = $file; 
  $l = sizeof ($a);
  if ($l == 0)
    echo "<p class='cent'>Замечаний пока нет.</p>";
  else
  {
    rsort($a);
    foreach ($a as $k)
    {
      echo "<table cellpadding='5' border='0' width='100%'><tr><td width='20%' class='yellow'>№".$l;
      $file = fopen ($dirct."/".$k, "r");
      echo fgets ($file, 10000);
      while (!feof ($file))
      {
      	$i=0;
        $temp = fgets ($file, 10000);
      	if (substr ($temp, $i, 1) == " ")
      	  $i++;
      	for ($j = 0; $j < $i; $j++)
      	  echo "&nbsp";
        echo substr ($temp, $i, strlen ($temp) - $i);
        echo "<br/>";
      }
      fclose ($file);
      $l--;
    }
  }
?>

<script language="javascript">
  function overify (f)
  {
	if (f.nickName.value.length == 0)
	{
	  alert("Введите никнейм!");
	  return false;
	}
	if (f.otziv.value.length == 0)
	{
	  alert ("Введите текст сообщения!");
	  return false;
	}
    return true;
  }
</script>
<p class="cent">
  Добавьте своё замечание
</p>
<form method="post" action="<?php echo "otziv.php"; ?>" name="form" onsubmit="return overify(this)">
  <p class="cent">
    Ваш никнейм:<br/>
    <input type="text" name="nickName"/><br/>
    Текст сообщения:<br/>
    <textarea name="otziv" cols="60" rows="10"></textarea><br/>
    <br/> 
    <input name= "submit" type="submit" value="Добавить"/>
  </p>
</form>
<?php

  echo "</td>
</tr>
      <tr>
<td colspan='6' style='text-align: center;'>";
?>
<div style="margin: 0 auto;">
<!--LiveInternet counter--><script type="text/javascript"><!--
  document.write ("<a href='http://www.liveinternet.ru/stat/localhost/Newspaper6/' " + "target=_blank><img src='//counter.yadro.ru/hit?t52.6;r" + escape(document.referrer) + ((typeof(screen)=="undefined") ? "" : ";s"+screen.width + "*" + screen.height + "*" + (screen.colorDepth ? screen.colorDepth:screen.pixelDepth)) + ";u" + escape (document.URL) + ";" + Math.random () + "' alt='' title='LiveInternet: показано число просмотров и" + " посетителей за 24 часа' " + "border='0' width='88' height='31'><\/a>");
//--></script><!--/LiveInternet-->
</div>
          </td>
        </tr>
      </table>
    </body>
  </html>