<?php
  $page = 7;
  $isConcrcet = false; 
  include "head.php";
  include "functions147.php";
  onBD ($result, "ARTICLE");
  while($row = mysqli_fetch_array($result))
    if ($row [0] == $_GET["id"])
    {     
      $isConcrcet = true;	  
      echo "<h2 class = 'cent'>".$row [1]."</h2>";
      if (($row [4] != 7) && ($row[4] != 9))
      {
        onBD ($result_rub, "RUBRIC");
        while($rowRub = mysqli_fetch_array($result_rub))
          if ($rowRub [0] == $row [4])
            echo "<p class = 'cent'>".$rowRub [1]."</p>";
      }
      echo "<p class = 'cent'>Автор: ";      
      onBD ($result_aut, "MEMBER");
      while ($rowAut = mysqli_fetch_array($result_aut))
        if ($rowAut [0] == $row [2])
          echo $rowAut [1]." ".$rowAut [2]."</p>";
      echo "<p class = 'cent'>Номер газеты: ".$row [5]."</p>
        <p class = 'cent'><a href = 'number_info.php?id=".$row [5]."'>Перейти к номеру</a></p><br/>";           
      onBD ($result_photo, "PHOTO");
      $b = false;
      while ($rowPhoto = mysqli_fetch_array($result_photo))
        if ($rowPhoto [3] == $row [0])
          if (file_exists ($rowPhoto [2]))
          {
            if (!$b)
              echo "<table align='center'>
                <tr>
                  <td>
                    <p>";
            $b = true;
            echo "<img src='".$rowPhoto [2]."' alt=''/>";
            if (($row [4] == 1) || ($row [4] == 6))
              echo "<br/>
              <br/>
              </p>";
            else
              echo "</td><td>
              </p>";
          }
          else
            echo "<p class='cent'>Здесь должна быть иллюстрация, но, кажется, произошла ошибка.</p>";
      if ($b)
      {
        echo "</p>
          </td>
          </tr>";
        if ((($row [4] != 1) && ($row [4] != 6)) || (file_exists ("Article".$_GET["id"].".txt") == false))
          echo "</table>";
      }
      if (($row [4] < 8) || ($row [4] == 11))
        if (file_exists("Article".$_GET ["id"].".txt") == true)
        {
          $file = fopen("Article".$_GET ["id"].".txt", "r");
          $text = "";
          while (!feof ($file))
          {
      	    $k = 0;
            $temp = fgets($file, 10000);
      	    while (substr ($temp, $k, 1) == " ")
      	      $k++;
      	    for ($j = 0; $j < $k; $j++)
      	      $text = $text."&nbsp";
            $text = $text.substr ($temp, $k, strlen ($temp) - $k)."<br/>";
          }
          if (($row [4] != 1) && ($row [4] != 6))
            echo $text;
          else
            if ($b)
              echo "<tr><td><p class='table'>".$text."</p></td></tr>
                </table>
                <br/>";
            else
              echo "<table width='100%'><tr><td width='40%'>&nbsp;</td><td>".$text."</td></tr></table><br/>";
        }
        else
          echo "<p class='cent'>Файл с текстом статьи пока не загружен.</p>";
      if ($row [4] == 10)
      {
      	onBD ($resultDict, "DICTIONARIS");
        while ($rowDict = mysqli_fetch_array ($resultDict))
          if (strstr($row [1], substr ($rowDict [1], 0, strlen($rowDict [1]) - 1)))
          {
            $temp = $rowDict [0];
            $temp1 = $rowDict [1];
            $temp2 = $rowDict [2];
          }
      	onBD ($resultWord, "WORD");
        while ($rowWord = mysqli_fetch_array($resultWord))
          if (($rowWord [2] == $temp) && ($rowWord [3] == $row [5]))
            $a [] = $rowWord [1];
        if (sizeof ($a) > 0)
        {
          sort ($a);
          for ($i = 0; $i < sizeof ($a); $i++)
            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$a [$i]."<br/>";
          echo "<p class='cent'><a href = 'dictionary_full.php?id=".$temp1."'>Полный текст словаря
            (сортировка по алфавиту)</a><br/>
            <a href = 'dictionary_full_type.php?id=".$temp1."'>Полный текст словаря (сортировка по
            категориям)</a><br/></p>";
        }
      }
      if ($row [4] == 3)
      {
      	$i = strlen ($row [1]);
      	while (substr($row [1], $i, 1) != "№")
      	  $i--;
        onBD ($result1, "ARTICLE");
        while ($row1 = mysqli_fetch_array($result1))
        {
          if (strstr ($row1 [1], substr ($row [1], 0, $i - 1)) && (substr ($row [1], $i + 1, strlen ($row [1]) - $i - 1) == substr ($row1 [1], $i + 1, strlen ($row1 [1]) - $i - 1) + 1))
            echo "<p class='cent'><a href = 'article_text.php?id=".$row1 [0]."'>Предыстория</a></p>";
        }
        onBD ($result1, "ARTICLE");
        while($row1 = mysqli_fetch_array ($result1))
          if (strstr ($row1 [1], substr ($row [1], 0, $i - 1)) && (substr ($row [1], $i + 1, strlen ($row [1]) - $i - 1) == substr ($row1 [1], $i + 1, strlen ($row1 [1]) - $i - 1) - 1))
            echo "<p class='cent'><a href = 'article_text.php?id=".$row1 [0]."'>Продолжение</a></p>";
        echo "<p class='cent'><a href = 'full.php?id=".substr ($row [1], 0, $i - 1)."'>Полный текст</a></p>";
      }
      if (strstr ($row [1], "Из истории Покотиловки"))
      {
        onBD ($result1, "ARTICLE");
        while($row1 = mysqli_fetch_array($result1))
          if (strstr ($row1 [1], "Из истории Покотиловки") && (substr ($row [1], 24, strlen ($row [1]) - 24) == substr ($row1 [1], 24, strlen ($row1 [1]) - 24) + 1))
            echo "<p class='cent'><a href = 'article_text.php?id=".$row1 [0]."'>Предыстория</a></p>";
      }
      if (strstr ($row [1], "Из истории Покотиловки"))
      {
        onBD ($result1, "ARTICLE");
        while ($row1 = mysqli_fetch_array($result1))
          if (strstr($row1 [1], "Из истории Покотиловки") && (substr ($row [1], 24, strlen ($row [1]) - 24) == substr ($row1 [1], 24, strlen ($row1 [1]) - 24) - 1))
            echo "<p class='cent'><a href = 'article_text.php?id=".$row1 [0]."'>Продолжение</a></p>";
      }
      if (strstr ($row [1], "Из истории Покотиловки"))
        echo "<p class='cent'><a href = 'HistoryP.php'>Полный текст</a></p>";
      if (strstr ($row [1], "Из истории Андреевки"))
      {        
        onBD ($result1, "ARTICLE");
        while ($row1 = mysqli_fetch_array($result1))
        {
          if (strstr ($row1 [1], "Из истории Андреевки") && (substr ($row [1], 22, strlen($row [1]) - 22) == substr ($row1 [1], 22, strlen ($row1 [1]) - 22) + 1))
            echo "<p class='cent'><a href = 'article_text.php?id=".$row1 [0]."'>Предыстория</a></p>";
        }
      }
      if (strstr ($row [1], "Из истории Андреевки"))
      {
        onBD ($result1, "ARTICLE");
        while ($row1 = mysqli_fetch_array ($result1))
          if (strstr ($row1 [1], "Из истории Андреевки") && (substr ($row [1], 22, strlen ($row [1]) - 22) == substr ($row1 [1], 22, strlen ($row1 [1]) - 22) - 1))
            echo "<p class='cent'><a href = 'article_text.php?id=".$row1 [0]."'>Продолжение</a></p>";
      }
      if (strstr ($row [1], "Из истории Андреевки"))
        echo "<p class='cent'><a href = 'HistoryA.php'>Полный текст</a></p>";
    if (strstr ($row [1], "Кроссворд") && !strstr ($row [1], "Ответ"))
      {
      	$b = false;
        onBD ($result1, "ARTICLE");
        while ($row1 = mysqli_fetch_array($result1))
          if (strstr ($row1 [1], "Ответ на кроссворд") && (strcmp (substr ($row [1], 11, strlen ($row [1]) - 11),
          substr($row1 [1], 20, strlen ($row1 [1]) - 20)) == 0))
          {
            echo "<p class='cent'><a href = 'article_text.php?id=".$row1 [0]."'>Посмотреть ответ</a></p>";
            $b = true;
          }
        if (!$b)
          echo "<p class='cent'>Ответ на кроссворд пока не загружен.</p>";
      }
    if (strstr ($row [1], "Ответ на кроссворд"))
      {
      	$b = false;
        onBD ($result1, "ARTICLE");
        while ($row1 = mysqli_fetch_array($result1))
          if (strstr ($row1 [1], "Кроссворд") && !strstr ($row1 [1], "Ответ") &&
            (strcmp (substr ($row [1], 20, strlen ($row [1]) - 20),
          substr ($row1 [1], 11, strlen ($row1 [1]) - 11)) == 0))
          {
            echo "<p class='cent'><a href = 'article_text.php?id=".$row1 [0]."'>Посмотреть условие</a></p>";
            $b = true;
          }
        if (!$b)
          echo "<p class='cent'>Условие кроссворда пока не загружено.</p>";
      }
      if (strstr ($row [1], "Дроволомка"))
      {
      	$b = false;
        onBD ($result1, "ARTICLE");
        while ($row1 = mysqli_fetch_array ($result1))
          if (strstr ($row1 [1], "Ответ на дроволомку") && (strcmp (substr ($row [1], 12, strlen($row [1]) - 12), substr($row1 [1], 21, strlen ($row1 [1]) - 21)) == 0))
          {
            echo "<p class='cent'><a href = 'article_text.php?id=".$row1 [0]."'>Посмотреть ответ</a></p>";
            $b = true;
          }
        if (!$b)
          echo "<p class='cent'>Ответ на дроволомку пока не загружен.</p>";
      }
    if (strstr ($row [1], "Ответ на дроволомку"))
      {
      	$b = false;
        onBD ($result1, "ARTICLE");
        while ($row1 = mysqli_fetch_array ($result1))
          if (strstr ($row1 [1], "Дроволомка") && (strcmp (substr ($row [1], 21, strlen ($row [1]) - 21),
          substr ($row1 [1], 12, strlen ($row1 [1]) - 12)) == 0))
          {
            echo "<p class='cent'><a href = 'article_text.php?id=".$row1 [0]."'>Посмотреть условие</a></p>";
            $b = true;
          }
        if (!$b)
          echo "<p class='cent'>Условие дроволомки пока не загружено.</p>";
      }
    }
    if (!$isConcrcet)
      echo "Эта страница предусмотрена для отображения текста различных отдельных статей. В данном случае индекс
        текста не задан, и Вы наверняка попали сюда вообще не с главной страницы.";
        echo "</td>
       </tr>
      <tr>
<td colspan='6' style='text-align: center;'>";
?>
<div style="margin: 0 auto;">
<!--LiveInternet counter--><script type="text/javascript"><!--
  document.write ("<a href='http://www.liveinternet.ru/stat/localhost/Newspaper6/' " + "target=_blank><img src='//counter.yadro.ru/hit?t52.6;r" + escape (document.referrer) + ((typeof (screen)=="undefined") ? "" : ";s" + screen.width + "*" + screen.height + "*" + (screen.colorDepth ? screen.colorDepth :screen.pixelDepth))+";u"+escape (document.URL) + ";" + Math.random () + "' alt='' title='LiveInternet: показано число просмотров и" + " посетителей за 24 часа' " + "border='0' width='88' height='31'><\/a>");
//--></script><!--/LiveInternet-->
</div>
          </td>
        </tr>
      </table>
    </body>
  </html>