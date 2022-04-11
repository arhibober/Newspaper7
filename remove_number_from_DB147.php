<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  include "functions147.php";
  fromBD ($result, "NUMBER", $_POST ["numbers"]);
  echo "<p class = 'cent'>Информация о номере успешно удалена.</p>
  </body>
  </html>";
?>