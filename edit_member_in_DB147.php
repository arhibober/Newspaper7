<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  include "functions147.php";
  fromBD ($result, "MEMBER", $_POST ["members"]);
  toBD ($result, $_POST ["members"], $_POST ["Name_member"], $_POST ["Sername_member"], $_POST ["Status_member"]);
  echo "</body>
    </html>";
  function toBD (&$result, $id, $name, $sername, $status)
  {    
    connect_to_DB ($conn);
    $database = "Newspaper6";
    mysqli_select_db ($conn, $database); // выбираем базу данных
    $result = mysqli_query ($conn, "INSERT INTO MEMBER VALUES('".$id."', '".$name."', '".$sername."', '".$status."')");
    if (!$result)
    {
      echo " Can't insert into (MEMBER) ";
      return;
    }
    echo "<p class='cent'>Информация об участнике отредактирована.</p>";
  }
?>