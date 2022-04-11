<?php
  $i = 0;
  $page = 7;
  include "head.php";
  include "functions147.php";
  onBD ($result, "NUMBER");
  $isConcret = false;
  while($row = mysqli_fetch_array ($result))
    if ($row [0] == $_GET ["id"])
    {
      $isConcret = true;
      echo "<h2 class='cent'>Номер ".$_GET["id"]."</h2>";
      echo "<p class='cent'>
        Номер ".$row [1]." за ".$row [2]." год<br/>
        <br/>";
      if (file_exists ("Article".$row [4].".txt") == true)
      {
        $file = fopen ("Article".$row [4].".txt", "r");
        $text = "";      
        while (!feof ($file))
        {
      	  $k = 0;
          $temp = fgets ($file, 10000);
      	  while (substr ($temp, $k, 1) == " ")
      	    $k++;
      	  for ($j = 0; $j < $k; $j++)
      	    $text = $text."&nbsp";
          $text = $text.substr ($temp, $k, strlen ($temp) - $k)."<br/>";
        }
        if (file_exists ("Main".$_GET ["id"].".jpg") == true)
          echo "<table align='center'>
              <tr><td><img src='Main".$_GET ["id"].".jpg' alt=''/></td></tr>
              <tr>
                <td>
                  <br/>
                  <p align='justify'><i>".$text."</i></p>
                </td>
              </tr>
            </table>";
        else
          echo "
            <table class='cent'><tr><td width ='40%'>&nbsp;</td><td><i class='table'>".$text.
              "</i></td></tr></table><br/>
            <p class='cent'>Главная фотография номера пока не загружена.</p>";
      }
      else
      { 
        echo "<p class='cent'>Файл со вступительным стихом пока не загружен либо не подключён.</p>";
        if (file_exists ("Main".$_GET ["id"].".jpg") == true)
          echo "<p class='cent'><img src = 'Main".$_GET ["id"].".jpg' alt=''/></p>";
        else
          echo "<p class='cent'>Главная фотография номера пока не загружена.</p>";
      }
      $isArticlesExist = false;
      onBD ($resultArt, "ARTICLE");
      while($rowArt = mysqli_fetch_array ($resultArt))
        if ($rowArt [5] == $row [0])
          $isArticleExist = true;
      if ($isArticleExist == true)
      {
        echo "<h4 class='cent'>Статьи номера:</h4>";
        onBD ($resultArt, "ARTICLE");
        while ($rowArt = mysqli_fetch_array($resultArt))
          if (($rowArt [5] == $row [0]) && ($rowArt [0] != $row[4]))
            echo "<p class='cent'><a href='article_text.php?id=".$rowArt[0]."'>".$rowArt [1]."</a></p>";
      }
      else
        echo "<p class='cent'>Ни одна статья не подключена к данному номеру.</p>";
      echo "<br/>
        <p class='smallcent'>Главный редактор Алексей Иванов";
      onBD ($resultConn, "CONNECTION");
      $i = 0;
      while($rowConn = mysqli_fetch_array($resultConn))
        if ($row [0] == $rowConn [1])
          $i++;
      if ($i > 1)
      {
        echo "<br/>Журналисты: ";
        $isFirst = true;
        onBD ($resultConn, "CONNECTION");      
        while ($rowConn = mysqli_fetch_array ($resultConn))
          if ($row [0] == $rowConn [1])
          {    
            onBD ($resultMember, "MEMBER");      
            while($rowMember = mysqli_fetch_array ($resultMember))
              if ($rowConn [2] == $rowMember [0])
              {
                if (!$isFirst)
                  echo ", ";
                echo $rowMember [1]." ".$rowMember [2];
                $isFirst=false;
              }
          }
      }
      echo "<br/>Издано в ";
      if ($row [5] == 1)
        echo "январе";
      if ($row [5] == 2)
        echo "феврале";
      if ($row [5] == 3)
        echo "марте";
      if ($row [5] == 4)
        echo "апреле";
      if ($row [5] == 5)
        echo "мае";
      if ($row [5] == 6)
        echo "июне";
      if ($row [5] == 7)
        echo "июле";
      if ($row [5] == 8)
        echo "августе";
      if ($row [5] == 9)
        echo "сентябре";
      if ($row [5] == 10)
        echo "октябре";
      if ($row [5] == 11)
        echo "ноябре";
      if ($row [5] == 12)
        echo "декабре";
      $strangt = "Drova".$_GET ["id"]."0.htm";
      $back_again = "Drova".$_GET ["id"]."1.htm";
      echo " ".$row [2]." года в посёлке Покотиловка</p>";
      if (file_exists("Drova".$_GET ["id"]."0.pdf") == true)
        echo "<p class='cent'><a href = 'Drova".$_GET ["id"]."0.pdf' target='_blank'>Скачать прямую сторону версии
          номера для печати</a></p>";
      else
        echo "<p class='cent'>Прямая сторона версии номера для печати пока не загружена.</p>";
      if (file_exists("Drova".$_GET ["id"]."1.pdf") == true)
        echo "<p class='cent'><a href = 'Drova".$_GET["id"]."1.pdf' target='_blank'>Скачать обратную сторону
          версии номера для печати</a></p>";
      else
        echo "<p class = 'cent'>Обратная сторона версии номера для печати пока не загружена.</p>";
      onBD ($result1, "NUMBER");
      $b = false;
      while ($row1 = mysqli_fetch_array ($result1))
        if ($row1 [0] == $row [0] - 1)
        {
          $b = true;
          echo "<p class='cent'><a href='number_info.php?id=".$row1 [0]."'>Предыдущий номер</a></p>";
        }
      onBD ($result1, "NUMBER");
      $b = false;
      while ($row1 = mysqli_fetch_array ($result1))
        if ($row1 [0] == $row [0] + 1)
        {
          $b = true;
          echo "<p class='cent'><a href='number_info.php?id=".$row1 [0]."'>Следующий номер</a></p>";
        }
    }
  if (!$isConcret)
    echo "Это страница предоставлена для аннотации различных конкретных номеров газеты, но ни один из них задан не
      был. Очевидно, Вы попали на эту страницу не с главной страницы сайта.<br/>";
  echo "</td>
</tr>
      <tr>
<td colspan='6' style='text-align: center;'>";
?>
<div style="margin: 0 auto;">
<!--LiveInternet counter--><script type="text/javascript"><!--
  document.write ("<a href='http://www.liveinternet.ru/stat/localhost/Newspaper6/' " + "target=_blank><img src='//counter.yadro.ru/hit?t52.6;r" + escape (document.referrer) + ((typeof (screen) == "undefined") ? "" : ";s" + screen.width + "*"+screen.height + "*" + (screen.colorDepth ? screen.colorDepth:screen.pixelDepth)) + ";u" + escape (document.URL) + ";" + Math.random () + "' alt='' title='LiveInternet: показано число просмотров и" + " посетителей за 24 часа' " + "border='0' width='88' height='31'><\/a>");
//--></script><!--/LiveInternet-->
</div>
          </td>
        </tr>
      </table>
    </body>
  </html>