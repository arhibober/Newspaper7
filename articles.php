<?php
  $page = 3;
  include "head.php";
  include "functions147.php"; 
  onBD ($result, "RUBRIC");   
  echo "<p class = 'cent'>Архив всех статей, опубликованных когда-либо в газете
    \"DROVA\".</p>";
  while ($row = mysqli_fetch_array ($result))
    if ($row [0] < 11)
    {
      echo "<h4 class='cent'>".$row [2]."</h4>
        <p class='cent'>";
      onBD ($resultNum, "NUMBER");
      while ($rowNum = mysqli_fetch_array ($resultNum))
      {
        onBD ($resultArt, "ARTICLE");
        while ($rowArt = mysqli_fetch_array ($resultArt))
          if ($rowArt [4] == $row [0] && $rowArt [5] == $rowNum [0])
            echo "<a href = 'article_text.php?id=".$rowArt [0]."'>".$rowArt [1]."</a>
              (номер ".$rowArt [5].")<br/>";
      }
    }
  echo "<br/>
    <h4 class='cent'>Полные тексты статей, опубликованных в номерах газеты по частям</h4>
    <p class='cent'>";
  onBD ($result, "DICTIONARIS");
  while ($row = mysqli_fetch_array ($result))
    echo "<a href = 'dictionary_full.php?id=".$row [1]."'>".$row [1]." (сортировка по алфавиту)</a><br/>
      <a href = 'dictionary_full_type.php?id=".$row [1]."'>".$row [1]." (сортировка по категориям)</a><br/>";
  onBD ($result, "EPOPEES");
  while ($row = mysqli_fetch_array ($result))
    echo "<a href = 'full.php?id=".$row [1]."'>".$row [1]."</a><br/>";
  echo "<a href = 'historyP.php'>История Покотиловки</a><br/>
    <a href = 'historyA.php'>История Андреевки</a></p>
    <h4 class='cent'>Другие статьи</h4>
    <p class='cent'><a href = 'Hour.php'>Ах, как прекрасен этот час! (из спец-приложения \"PIZZA\")</a><br/>
    <a href = 'cesar.php'>В некотором царстве... (из спец-приложения \"PIZZA\")</a><br/>
    <a href = 'radio.php'>Приёмник (из спец-приложения \"PIZZA\")</a><br/>
    <a href = 'Drovolomka_pizza.php'>Дроволомка (из спец-приложения \"PIZZA\")</a></p>
  </td>
</tr>
      <tr>
<td colspan='6' style='text-align: center;'>";
?>
<div style="margin: 0 auto;">
<!--LiveInternet counter--><script type="text/javascript"><!--
  document.write ("<a href='http://www.liveinternet.ru/stat/localhost/Newspaper6/' " + "target=_blank><img src='//counter.yadro.ru/hit?t52.6;r" + escape (document.referrer) + ((typeof (screen) == "undefined") ? "" : ";s" + screen.width + "*" + screen.height + "*" + (screen.colorDepth ? screen.colorDepth :screen.pixelDepth)) + ";u" + escape (document.URL) + ";" + Math.random () + "' alt='' title='LiveInternet: показано число просмотров и" + " посетителей за 24 часа' " + "border='0' width='88' height='31'><\/a>");
//--></script><!--/LiveInternet-->
</div>
          </td>
        </tr>
      </table>
    </body>
  </html>