<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  include "functions147.php";
  fromBD ($result, "DICTIONARIS", $_POST ["dictionaris"]);
  echo "<p class = 'cent'>Словарь успешно удалён.</p>
  </body>
  </html>";
?>