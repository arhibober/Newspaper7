<meta name="robots" content="noindex"/>
<?php
  function onBD (&$result, $table_name)
  {
    connect_to_DB ($conn);
    $database = "Newspaper6";
    mysqli_select_db ($conn, $database); // выбираем базу данных
    $result = mysqli_query ($conn, "SELECT * FROM ".$table_name);
    if (!$result)
    {
      echo " Can't select from ($table_name) ";
      return;
    }
  }
  
  function fromBD (&$result, $table_name, $number)
  {
    connect_to_DB ($conn);
    $database = "Newspaper6";
    mysqli_select_db ($conn, $database); // выбираем базу данных
    $result = mysqli_query ($conn, "DELETE FROM ".$table_name." WHERE ID ='".$number."'");
    if (!$result)
    {
      echo " Can't delete from ($table_name) ";
      return;
    }
  }
  
  function connect_to_DB (&$conn)
  {
    $conn = mysqli_connect ("localhost:3306", "root", "", "test")
      or die ("Невозможно установить соединение: ". mysqli_error ());
    mysqli_query ($conn, 'SET NAMES "utf8" COLLATE "utf8_general_ci"');
    if (!mysqli_set_charset ($conn, "utf8"))
    {
      echo "Ошибка при загрузке набора символов utf8: ".mysqli_error ($link);
      exit ();
    }
  }
?>