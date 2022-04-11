<?php
  include "search.php";
  include "functions147.php";
  $Find_text1 = $_POST ["Find_text"];
  $Find_text1 = str_replace ("ё", "е", $Find_text1);
  $Find_text1 = str_replace ("Ё", "е", $Find_text1);
  echo "<div class='comic'>";
  if (strlen ($Find_text1) > 0)
  {
    $isFind=false;
    onBD ($result, "ARTICLE");
    onBD ($result1, "MEMBER");
    onBD ($result2, "RUBRIC");
    $k = 0;
    while ($row = mysqli_fetch_array($result))
    {
      $temp9 = str_replace ("ё", "е", $row [1]);
      $temp9 = str_replace ("Ё", "е", $temp9);
      if (strstr (mb_strtolower ($temp9), mb_strtolower ($Find_text1)) == true)
      {
  	    $temp = $isFind;
  	    $isFind = true;
  	    $k++; 
  	    if ($isFind != $temp)
  	      echo "<h4 class='cent'>Результаты поиска:</h4>
  	      <p class='cent'>
  	      <table  cellpadding='5' border='0' class='cent' width='100%'>
  	        <tr bgcolor='#804000'>
  	          <th width='10%'>
                <p class = 'yellow'>№ п/п</p>
  	          </th>
  	          <th width='30%'>
  	            <p class = 'yellow'>Ссылка на полный текст</p>
  	          </th>
  	          <th width='20%'>
  	            <p class = 'yellow'>Рубрика</p>
  	          </th>
  	          <th width='20%'>
                    <p class = 'yellow'>Номер газеты</p>
  	          </th>
  	          <th width='20%'>
  	            <p class = 'yellow'>Автор статьи</p>
  	          </th>
  	        </tr>";
        onBD ($result2, "RUBRIC");
  	    while ($row_rubric = mysqli_fetch_array ($result2))
  	  	  if ($row [4] == $row_rubric [0])
            $temp1 = $row_rubric [1];
  	    onBD ($result1, "MEMBER");
  	    while ($row_autor = mysqli_fetch_array ($result1))
  	  	  if ($row [2] == $row_autor [0])
  	  	  {
  	        $temp6 = $row_autor [1];
  	        $temp7 = $row_autor [2];
  	  	  }
  	    echo "<tr>
  	             <td>
  	               ".$k."
  	             </td>
  	             <td>
  	               <a href='article_text.php?id=".$row [0]."'>".$row [1]."</a>
  	             </td>
  	             <td>
  	               ".$temp1."
  	             </td>
  	             <td>
  	               ".$row [5]."
  	             </td>
  	             <td>
  	               ".$temp6." ".$temp7."
  	             </td>
  	           </tr>";  	
      }  
    }
    onBD ($result, "ARTICLE");
    while ($row = mysqli_fetch_array($result))
      if (file_exists("Article".$row [0].".txt") == true && filesize("Article".$row [0].".txt") > 0)
      { 
  	    $file = fopen ("Article".$row [0].".txt", "r");
        $text = fread ($file, filesize("Article".$row [0].".txt"));
        $text = str_replace ("ё", "е", $text);
        $text = str_replace ("Ё", "е", $text);
        if (strstr (strip_tags (mb_strtolower ($text)), mb_strtolower ($Find_text1)) == true)
        {
  	      $temp = $isFind;
  	      $isFind = true; 
  	      $k++;
  	      if ($isFind != $temp)
  	        echo "<h4 class='cent'>Результаты поиска:</h4>
  	      <p class='cent'>
  	      
  	      <table  cellpadding='5' border='0' class='cent' width='100%'>
  	        <tr bgcolor='#804000'>
  	          <th width='10%'>
                    <p class = 'yellow'>№ п/п</p>
  	          </th>
  	          <th width='30%'>
  	            <p class = 'yellow'>Ссылка на полный текст</p>
  	          </th>
  	          <th width='20%'>
  	            <p class = 'yellow'>Рубрика</p>
  	          </th>
  	          <th width='20%'>
                    <p class = 'yellow'>Номер газеты</p>
  	          </th>
  	          <th width='20%'>
  	            <p class = 'yellow'>Автор статьи</p>
  	          </th>
  	        </tr>";
  	      onBD ($result2, "RUBRIC");
  	      while ($row_rubric = mysqli_fetch_array($result2))
  	      {
  	  	    if ($row_rubric [0] == $row [4])
  	          $temp5 = $row_rubric [1];
  	      }
  	      onBD ($result1, "MEMBER");
  	      while ($row_autor = mysqli_fetch_array($result1))
  	      {
  	  	    if ($row [2] == $row_autor [0])
  	  	    {
  	          $temp6 = $row_autor [1];
  	          $temp7 = $row_autor [2];
  	  	    }
  	      }
  	      echo "<tr>
  	             <td>
  	               ".$k."
  	             <td>
  	               <a href='article_text.php?id=".$row [0]."'>".$row [1]."</a>
  	             </td>
  	             <td>
  	               ".$temp5."
  	             </td>
  	             <td>
  	               ".$row [5]."
  	             </td>
  	             <td>
  	               ".$temp6." ".$temp7."
  	             </td>
  	           </tr>";	
        }
    }
    onBD ($result, "WORD");
    $i = 0;
    while ($row = mysqli_fetch_array ($result))
    {
  	  $i++;
      $temp9 = str_replace ("ё", "е", $row [1]);
      $temp9 = str_replace ("Ё", "е", $temp9);
      if (strstr(mb_strtolower ($row [1]), mb_strtolower ($Find_text1)) == true)
      {
      	onBD ($resultDict, "DICTIONARIS");      	
        while ($rowDict = mysqli_fetch_array ($resultDict))
          if ($row [2] == $rowDict [0])
            $temp1 = substr ($rowDict [1], 0, strlen ($rowDict [1]) - 1); 
      	onBD ($resultArt, "ARTICLE");      	
        while ($rowArt = mysqli_fetch_array ($resultArt))
        {
          if (($rowArt [4] == 10) && strstr ($rowArt [1], $temp1) && ($rowArt [5] == $row [3]))
          {
            $temp2 = $rowArt [0];
            $temp3 = $rowArt [1];
          }
        }
  	    $temp = $isFind;
  	    $isFind = true;
  	    $k++;
  	    if ($isFind != $temp)
  	      echo "<h4 class='cent'>Результаты поиска:</h4>
  	      <p class='cent'>
  	      
  	      <table  cellpadding='5' border='0' class='cent' width='100%'>
  	        <tr bgcolor='#804000'>
  	          <th width='10%'>
                    <p class = 'yellow'>№ п/п</p>
  	          </th>
  	          <th width='30%'>
  	            <p class = 'yellow'>Ссылка на полный текст</p>
  	          </th>
  	          <th width='20%'>
  	            <p class = 'yellow'>Рубрика</p>
  	          </th>
  	          <th width='20%'>
                    <p class = 'yellow'>Номер газеты</p>
  	          </th>
  	          <th width='20%'>
  	            <p class = 'yellow'>Автор статьи</p>
  	          </th>
  	        </tr>";
  	    echo "<tr>
  	             <td>
  	               ".$k."
  	             </td>
  	             <td>
  	               <a href='article_text.php?id=".$temp2."'>".$temp3."</a>
  	             </td>
  	             <td>
  	               Словарь
  	             </td>
  	             <td>
  	               ".$row [3]."
  	             </td>
  	             <td>
  	               Алексей Иванов
  	             </td>
  	           </tr>";  	
      }  
    }
    if ($isFind == false)
      echo "<p class='cent'>Поиск не дал результатов.</p>";
    else
      echo "</table>";  }
  else
    echo "<p class='cent'>В верхнем окне можно ввести запрос для поиска по сайту.</p>";
?>
  </td>
</tr>
      <tr>
<td colspan='6' style='text-align: center;'>
<div style="margin: 0 auto;">
<!--LiveInternet counter--><script type="text/javascript"><!--
  document.write ("<a href='http://www.liveinternet.ru/stat/localhost/Newspaper6/' " + "target=_blank><img src='//counter.yadro.ru/hit?t52.6;r" + escape (document.referrer) + ((typeof (screen) == "undefined")?"" : ";s" + screen.width + "*" + screen.height + "*" + (screen.colorDepth ? screen.colorDepth:screen.pixelDepth)) + ";u" + escape (document.URL) + ";" + Math.random () + "' alt='' title='LiveInternet: показано число просмотров и" + " посетителей за 24 часа' " + "border='0' width='88' height='31'><\/a>");
//--></script><!--/LiveInternet-->
</div>
          </td>
        </tr>
      </table>
    </body>
  </html>