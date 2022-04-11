<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  include "functions147.php";
  if (file_exists ("Article".$_POST ["articles"].".txt"))
    unlink ("Article".$_POST ["articles"].".txt");
  onBD ($result, "ARTICLE");
  while ($row = mysqli_fetch_array($result))
    if ($row [0] == $_POST ["articles"] && $row [4] == 10)
    {
      onBD ($result1, "DICTIONARIS");
      while ($row1 = mysqli_fetch_array ($result1))
        if (strstr ($row [1], $row1 [3]))
        {
          onBD ($result2, "WORD");
          while ($row2 = mysqli_fetch_array ($result2))
            if ($row2 [2] == $row1 [0] && $row2 [3] == $row [5])              
              fromBD ($result3, "WORD", $row2 [0]);
        }
    }
  fromBD ($result, "ARTICLE", $_POST["articles"]);
  echo "<p class = 'cent'>Статья успешно удалена.</p>
  </body>
  </html>";
?>