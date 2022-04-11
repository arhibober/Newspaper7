<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  include "functions147.php";
  fromBD ($result, "EPOPEES", $_POST ["epopees"]);
  echo "<p class = 'cent'>Статья успешно удалена.</p>
  </body>
  </html>";
?>