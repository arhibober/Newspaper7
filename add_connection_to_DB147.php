<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  include "functions147.php";
  $i = 0;
  onBD ($result, "CONNECTION");
  while ($row = mysqli_fetch_array ($result))
    if ($row [0] > $i)
      $i = $row [0];
  toBD ($result, $i + 1, $_POST ["numbers"], $_POST ["members"]);  
  echo "</body>
    </html>";
  function toBD (&$result, $id, $number, $member)
  {
    connect_to_DB ($conn);
    $database = "Newspaper6";
    mysqli_select_db ($conn, $database); // выбираем базу данных
    $result = mysqli_query ($conn, "INSERT INTO CONNECTION VALUES ('".$id."',
      '".$number."', '".$member."')");
    if (!$result)
    {
      echo " Can't insert into (CONNECTION) ";
      return;
    }
    echo "<p class='cent'>Связь учтена в базе данных.</p>";
  }
?>