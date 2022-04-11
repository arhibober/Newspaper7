<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  include "functions147.php";
  onBD ($result, "ARTICLE");
  while ($row = mysqli_fetch_array($result))
    if ($row [0] == $_POST["articles"])
      $nn = $row [5];
  fromBD ($result, "PHOTO", $_POST ["photos"]);  
  toBD ($result, $_POST ["photos"], $nn, $_POST ["Name_photo"], $_POST ["articles"]);
  echo "</body>
    </html>";
  function toBD (&$result, $id, $number, $file, $article)
  {    
    connect_to_DB ($conn);
    $database = "Newspaper6";
    mysqli_select_db ($conn, $database); // выбираем базу данных
    $result = mysqli_query ($conn, "INSERT INTO PHOTO VALUES('".$id."',
      '".$number."', '".$file."', '".$article."')");
    if (!$result)
    {
      echo "Can't insert into (PHOTO)";
      return;
    }
    echo "<p class='cent'>Информация об иллюстрации успешно отредактирована.</p>";
  }
?>