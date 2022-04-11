<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  include "functions147.php";
  $i = 0;
  onBD (&$result, "NUMBER");
  while ($row = mysqli_fetch_array ($result))
    if ($row [0] > $i)
      $i = $row [0];
  $j = 0;
  onBD ($result1, "NUMBER");
  while ($row = mysqli_fetch_array ($result1))
    if ($row [2] == $_POST["Year_drawing"])
      $j++;
  toBD (&result, $i + 1, $j + 1,
     $_POST ["Year_drawing"], "NULL", $_POST ["monthes"]);
  echo "</body>
    </html>";
  function toBD (&$result, $id, $number, $year, $lyric, $month)
  {
    connect_to_DB ($conn);
    $database = "Newspaper6";
    mysqli_select_db ($conn, $database); // выбираем базу данных
    $result = mysqli_query ($conn, "INSERT INTO NUMBER VALUES('".$id."',
      '".$number."', '".$year."', 'NULL', '".$lyric."', '".$month."')");
    if (!$result)
    {
      echo " Can't insert into (NUMBER) ";
      return;	
    }
    echo "<p class='cent'>Новый номер газеты успешно добавлен.</p>";
  }
?>