<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  include "functions147.php";
  onBD ($result, "NUMBER");
  while ($row = mysqli_fetch_array($result))  
    if ($row [0] == $_POST ["numbers"])
      if ($row [2] == $_POST ["year_drawing"])
        $year = $row [1];
      else
        $year = "n";
  if ($year == "n")
  {
    $year = 1;
    onBD ($result1, "NUMBER");
    while($row = mysqli_fetch_array ($result1))
      if ($row [2] == $_POST ["year_drawing"])
        $year++;
  }
  fromBD ($result, "NUMBER", $_POST ["numbers"]);
  toBD ($result, $_POST ["numbers"], $year, $_POST["year_drawing"], $_POST["lyrics"], $_POST["monthes"]);
  echo "</body>
    </html>";
  function toBD (&$result, $id, $number, $year, $lyric, $month)
  {
    connect_to_DB ($conn);
    $database = "Newspaper6";
    mysqli_select_db ($conn, $database); // выбираем базу данных
    $result = mysqli_query ("INSERT INTO NUMBER VALUES('".$id."',
      '".$number."', '".$year."', 'NULL', '".$lyric."', '".$month."')", $conn);
    if (!$result)
    {
      echo " Can't insert into (NUMBER) ";
      return;
    }
    echo "<p class='cent'>Информация о номере газеты отредактрирована успешно.</p>";
  }
?>