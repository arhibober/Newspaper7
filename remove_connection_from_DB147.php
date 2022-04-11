<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  include "functions147.php";
  fromBD ($result, "CONNECTION", $_POST ["connection"]);
  echo "<p class = 'cent'>Информация о связи участника с номером удалена.</p>
  </body>
  </html>";
?>