<?php
  include "functions147.php";
  $page = 0;
  include "head.php";
  $isCorrect = false;
  if (sizeof ($_GET["id"]) > 0)    
    $isCorrect = true;
  if ($isCorrect)
  {
    onBD ($resultDict, "DICTIONARIS");
    while ($rowDict = mysqli_fetch_array ($resultDict))
      if ($_GET ["id"] == $rowDict [1])
      {
        $temp = $rowDict [0];
        $temp2 = $rowDict [2];
      }
    echo "<h2 class='cent'>".$_GET ["id"]." (сортировка всех слов по алфавиту)</h2>";
    onBD ($resultWord, "WORD");
    while($rowWord = mysqli_fetch_array ($resultWord))
   	  if ($rowWord [2] == $temp)
        $a [] = $rowWord [1];
    if (sizeof ($a) > 0)
    {
      sort ($a);
      for ($i = 0; $i < sizeof ($a); $i++)
        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$a [$i]."<br/>";
    }
    else
      echo "В данный словарь пока не было загружено ни одного слова.";
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
  document.write ("<a href='http://www.liveinternet.ru/stat/localhost/Newspaper6/' " + "target=_blank><img src='//counter.yadro.ru/hit?t52.6;r" + escape (document.referrer) + ((typeof (screen) == "undefined") ? "" : ";s" + screen.width + "*" + screen.height + "*" + (screen.colorDepth ? screen.colorDepth:screen.pixelDepth)) + ";u" + escape (document.URL) + ";" + Math.random () + "' alt='' title='LiveInternet: показано число просмотров и" + " посетителей за 24 часа' " + "border='0' width='88' height='31'><\/a>");
//--></script><!--/LiveInternet-->
</div>
          </td>
        </tr>
      </table>
    </body>
  </html>