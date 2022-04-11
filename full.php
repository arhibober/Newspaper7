<?php
  include "functions147.php";
  include "head.php";
  $isCorrect = false;
  if (sizeof ($_GET["id"]) > 0)    
    $isCorrect = true;
  if ($isCorrect)
  {
    echo "<h2 class = 'cent'>".$_GET["id"]." (полный текст)</h2>";
    $i = 0;
    onBD ($result, "ARTICLE");
    while ($row = mysqli_fetch_array($result))
      if (strstr($row[1], $_GET["id"]))
        $i++;
    if ($i > 0)
    {
      onBD ($result, "ARTICLE");
      while ($row = mysqli_fetch_array($result))
        if (strstr ($row[1], $_GET["id"]))
        {  
          $file = fopen ("Article".$row [0].".txt", "r");
          $text = "";      
          while (!feof ($file))
          {
      	    $k = 0;
            $temp = fgets ($file, 10000);
      	    while (substr ($temp, $k, 1) == " ")
      	      $k++;
      	    for ($j = 0; $j < $k; $j++)
      	      $text = $text."&nbsp";
            $text = $text.substr ($temp, $k, strlen($temp) - $k)."<br/>";
          }
          echo $text;
        }
    }
    else
      echo "Из данной статьи пока не было опубликовано ни одного отрывка.";
  }
  else
    echo "Кажется, произошла ошибка. Скорее всего, Вы попали сюда не с главной страницы.";
  echo "</td>
</tr>
      <tr>
<td colspan='6' style='text-align: center;'>";
?>
<div style="margin: 0 auto;">
<!--LiveInternet counter--><script type="text/javascript"><!--
  document.write ("<a href='http://www.liveinternet.ru/stat/localhost/Newspaper6/' " + "target=_blank><img src='//counter.yadro.ru/hit?t52.6;r" + escape (document.referrer) + ((typeof (screen) == "undefined") ? "" : ";s" + screen.width + "*" + screen.height + "*" + (screen.colorDepth ?screen.colorDepth:screen.pixelDepth)) + ";u" + escape (document.URL) + ";" + Math.random () + "' alt='' title='LiveInternet: показано число просмотров и" + " посетителей за 24 часа' " + "border='0' width='88' height='31'><\/a>");
//--></script><!--/LiveInternet-->
</div>
          </td>
        </tr>
      </table>
    </body>
  </html>