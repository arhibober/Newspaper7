<?php
  echo "<!DOCTYPE>
  <html>
    <head>
      <meta http-equiv='Content-Type'
	  content='text/html' charset='utf-8'>	
	  <link rel='stylesheet' TYPE='text/css' HREF='style.css'>    
      <title>Газета \"Дрова\"</title>
      <meta name='keywords' content='Дрова газета архибобёр мехмат Каразина студенческое общество архибобров официальный сайт Алексей Иванов Андрей Иванов Илья Кости-Кассанелли Покотиловка желтопузики бестолковый словарь палиндромы'/>
      <meta name='yandex-verification' content='6b7f706aa68e2ed8' />
    </head>
    <body bgcolor='#ffbb00'>
    <div class='comic'>
      <table width='100%' border='0'>
      <tr>
      <td>     
      <table width='100%' border='0'>
        <tr>
          <td bgcolor='#ffffff' colspan='6'>
            <img src='Drova2.gif' alt=''/>
          </td>
        </tr>
      </table>
      <img src='bg.png' alt=''/>
    </td>
  </tr>
  <tr>
    <td>
      <table width='100%' class='cent' border='0'>
        <tr bgcolor='#804000'>";
          echo "<td valign='middle' width='17%' height='30%'";
          if ($page == 1)
            echo " bgcolor='#ffbb00'";
          echo "><h4>";
          if ($page != 1)
            echo "<a href= 'index.php'>
              <p class='yellow'>";
          echo "Главная";        
          if ($page != 1)
            echo "</p></a>";
          echo"</h4></td>
            <td valign='middle' width = '17%'";
          if ($page == 2)
            echo " bgcolor='#ffbb00'";
          echo "><h4>";
          if ($page != 2)
            echo "<a href='numbers.php'>
              <p class='yellow'>";
          echo "Номера газеты";        
          if ($page != 2)
            echo "</p></a>";
          echo"</h4></td>
            <td valign='middle' width = '17%'";
          if ($page == 3)
            echo " bgcolor='#ffbb00'";
          echo "><h4>";
          if ($page != 3)
            echo "<a href = 'articles.php'>
              <p class='yellow'>";
          echo "Список статей";        
          if ($page != 3)
            echo "</p></a>";
          echo"</h4></td>
            <td valign='middle' width = '16%'";
          if ($page == 4)
            echo " bgcolor='#ffbb00'";
          echo "><h4>";
          if ($page != 4)
            echo "<a href='search.php'>
              <p class='yellow'>";
          echo "Поиск";        
          if ($page != 4)
            echo "</p></a>";
          echo"</h4></td>
            <td valign='middle' width = '17%'";
          if ($page == 5)
            echo " bgcolor='#ffbb00'";
          echo "><h4>";
          if ($page != 5)
            echo "<a href='connection.php'>
              <p class='yellow'>";
          echo "Обратная связь";        
          if ($page != 5)
            echo "</p></a>";
          echo"</h4></td>
            <td valign='middle' width = '16%'";
          if ($page == 6)
            echo " bgcolor='#ffbb00'";
          echo "><h4>";
          if ($page != 6)
            echo "<a href='news.php'>
              <p class='yellow'>";
          echo "Новости сайта";        
          if ($page != 6)
            echo "</p></a>";
          echo "</h4></td>
        </tr>
      </table>
    </td>
  </tr>
<tr>
<td>";
?> 