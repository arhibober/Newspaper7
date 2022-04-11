<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  include "functions147.php";
  onBD ($result, "PHOTO");
  while ($row = mysqli_fetch_array ($result))
    if ($row [0] == $_POST ["photos"])
      if (file_exists ($row [2]))
      {
        unlink ($row [2]);
        echo "<p class = 'cent'>Иллюстрация успешно удалена.</p>";
      }
      else
        echo "<p class = 'cent'>Из базы данных сведения об иллюстрации удалены успешно, но сама иллюстрация на
          сервере найдена и не была.</p>";
  fromBD ($result, "PHOTO", $_POST ["photos"]);
  echo "</body>
    </html>";
?>