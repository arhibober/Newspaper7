<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  include "functions147.php";
  fromBD ($result, "RUBRIC", $_POST ["rubrics"]);
  toBD ($result, $_POST ["rubrics"], $_POST ["Rubric_one"], $_POST ["Rubric_many"]);
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
    echo "<p class='cent'>Данные о рубрике отредактированы.</p>";
  }
?>