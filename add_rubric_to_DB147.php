<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  include "functions147.php";
  $i = 0;
  onBD ($result, "RUBRIC");
   while ($row = mysqli_fetch_array($result))
    if ($row [0] > $i)
      $i = $row [0];
  toBD ($result, $i + 1, $_POST ["Rubric_one"], $_POST ["Rubric_many"]);
  echo "</body>
    </html>";
  function toBD (&$result, $id, $name, $name_many)
  {
    connect_to_DB ($conn);
    $database = "Newspaper6";
    mysqli_select_db ($conn, $database); // выбираем базу данных
    $result = mysqli_query ($conn, "INSERT INTO RUBRIC VALUES('".$id."',
      '".$name."', '".$name_many."')");
    if (!$result)
    {
      echo " Can't insert into (RUBRIC) ";
      return;
    }
    echo "<p class='cent'>В газету введена новая рубрика.</p>";
  }
?>