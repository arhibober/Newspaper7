<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  include "functions147.php";
  if ($_POST ["rubrics"] < 8 || $_POST ["rubrics"] == 11)
  {
    $hdl = fopen("Article".$_POST ["articles"].".txt", "w+");
    fwrite ($hdl, $_POST["fileText"]);
    fclose ($hdl);
  }
  if ($_POST["rubrics"] == 10)
  {
    $hdl = fopen("Dict".$_POST ["articles"].".txt", "w+");
    fwrite ($hdl, $_POST["fileText"]);
    fclose ($hdl);
    onBD ($result, "ARTICLE");
    while ($row = mysqli_fetch_array($result))
      if ($row [0] == $_POST ["articles"])
      {
        onBD ($result1, "DICTIONARIS");
        while ($row1 = mysqli_fetch_array($result1))
          if (strstr($row [1], $row1 [3]) == true)
          {
            onBD ($result2, "WORD");
            while ($row2 = mysqli_fetch_array($result2))
              if ($row2 [2] == $row1 [0] && $row2 [3] == $_POST["numbers"])
              {
                $hdl = fopen("Dict".$_POST["articles"].".txt", "r");
                $l = 0;
                while (!feof($hdl))
                {
      	          $temp = fgets($hdl, 10000);
      	          $l++;
                }
                $hdl = fopen("Dict".$_POST["articles"].".txt", "r");
                $b = false;
                $m = 0;
                while (!feof($hdl))
                {
                  $m++;
      	          $temp = fgets($hdl, 10000);
      	          if ($m != $l)
      	            $temp = substr($temp, 0, strlen ($temp) - 2);
                  if (strcmp($temp, $row2 [1]) == 0)
                  {
                    $b = true;
                  }
                }
                if (!$b)
                  fromBD (&$result3, "WORD", $row2 [0]);
              }
          }
      }
  }
  onBD ($result, "ARTICLE");
  fromBD ($result, "ARTICLE", $_POST["articles"]);
  toBD ($result, $_POST["articles"], $_POST["Name_article"],
     $_POST["numbers"], $_POST["rubrics"], $_POST["autors"]);
  echo "</body>
    </html>";
  function toBD(&$result, $texta, $namea, $numbera, $rubrica,
    $autora)
  {
    connect_to_DB ($conn);
    $database = "Newspaper6";
    mysqli_select_db ($conn, $database); // выбираем базу данных
    $result = mysqli_query($conn, "INSERT INTO ARTICLE VALUES('".$texta."', '".$namea."', '".$autora."', 'NULL', '".$rubrica."', '".$numbera."')");
    if (!$result)
    {
      echo " Can't insert into (ARTICLE) ";
      return;	
    }
    echo "<p class='cent'>Статья отредактирована успешно.</p>";
  }
?>