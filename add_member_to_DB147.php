<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  include "functions147.php";
  $i = 0;
  onBD ($result, "MEMBER");
  while($row = mysqli_fetch_array($result))
    if ($row[0] > $i)
      $i = $row[0];
  toBD ($result, $i + 1, $_POST["Name_member"], $_POST["Sername_member"],
    $_POST["Status_member"]);
  echo "</body>
    </html>";    
  function toBD (&$result, $id, $name, $sername, $status)
  {
    connect_to_DB ($conn);
    $database = "Newspaper6";
    mysqli_select_db ($conn, $database); // выбираем базу данных
    $result = mysqli_query ($conn, "INSERT INTO MEMBER VALUES('".$id."',
      '".$name."', '".$sername."', '".$status."')");
    if (!$result)
    {
      echo " Can't insert into (MEMBER) ";
      return;
    }
    echo "<p class='cent'>Информация об участнике добавлена.</p>";
  }
?>