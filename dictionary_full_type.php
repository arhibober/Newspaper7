<?php
  include "functions147.php";
  include "head.php";
  $isCorrect = false;
  if (sizeof ($_GET["id"]) > 0)    
    $isCorrect = true;
  if ($isCorrect)
  {
    echo "<h2 class='cent'>".$_GET["id"]." (сортировка всех слов по категори€м)</h2>";   
    $i = 0; 
    onBD ($resultDict, "DICTIONARIS");
    while ($rowDict = mysqli_fetch_array($resultDict))
      if ($_GET["id"] == $rowDict [1])
        $temp = $rowDict [0];   
    onBD ($resultType, "WORD_TYPE");
    while ($rowType = mysqli_fetch_array($resultType))
      if ($rowType [2] == $temp)
        $i++; 
    if ($i > 0)
    {
      onBD ($resultType, "WORD_TYPE");
      while ($rowType = mysqli_fetch_array($resultType))
        if ($rowType [2] == $temp)
        {
          echo "<h4 class='cent'>".$rowType [1]."</h4>";
          $i = 0;
          $a [0] = "";
          onBD ($resultWord, "WORD");
          while ($rowWord = mysqli_fetch_array($resultWord))
   	        if ($rowWord [2] == $temp && $rowWord [4] == $rowType [0])
   	        {
              $a[$i] = $rowWord [1];
              $i++;
   	        }
          if ($a [0] != "")
          {
            sort ($a);
            for ($i = 0; $i < sizeof ($a); $i++)
              if ($a [$i] != "")
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$a [$i]."<br/>";
          }
          else
            echo "  данной рубрике пока не было отнесено ни одно слово.";
          for ($i = 0; $i < sizeof($a); $i++)
            $a [$i] = "";
        }
    }
    else
      echo "—лова в данном словаре пока не разбиты на рубрики.";
  }
  else
    echo " ажетс€, произошла ошибка. —корее всего, ¬ы попали сюда не с главной страницы.";
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