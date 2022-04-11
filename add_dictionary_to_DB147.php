<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  include "functions147.php";
  $i = 0;
  onBD ($result, "DICTIONARIS");
  while($row = mysqli_fetch_array($result))
    if ($row [0] > $i)
      $i = $row [0];
  toBD ($result, $i + 1, $_POST ["Name_dictionary_one"],
    $_POST ["Name_dictionary_many"]);  	
  echo "</body>
    </html>";
  function toBD (&$result, $id, $name_one, $name_many)
  {
    connect_to_DB ($conn);
    $database = "Newspaper6";
    mysqli_select_db ($conn, $database); // выбираем базу данных
    $result = mysqli_query ($conn, "INSERT INTO DICTIONARIS VALUES('".$number."',
      '".$name_many."', 'NULL', '".$name_one."')");
    if (!$result)
    {
      echo " Can't insert into DICTIONARIS)";
      return;
    }
    echo "<p class='cent'>Словарь успешно загружен.</p>";
  }
?>