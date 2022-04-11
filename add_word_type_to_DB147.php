<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  include "functions147.php";
  $i = 0;
  onBD ($result, "WORD_TYPE");
  while ($row = mysqli_fetch_array ($result))
    if ($row [0] > $i)
      $i = $row [0];
  	toBD ($result, $i + 1, $_POST ["word_type"], $_POST ["dictionaris"]);
  echo "</body>
    </html>";
  function toBD (&$result, $number, $type, $dict)
  {
    connect_to_DB ($conn);
    $database = "Newspaper6";
    mysqli_select_db ($conn, $database); // выбираем базу данных
    $result = mysqli_query ($conn, "INSERT INTO WORD_TYPE VALUES('".$number."', '".$type."', '".$dict."')");
    if (!$result)
    {
       echo " Can't insert into EPOPEES)";
       return;
    }
    echo "<p class='cent'>Категория успешно добавлена.</p>";
  }
?>