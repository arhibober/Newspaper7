<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  include "functions147.php";
  fromBD ($result, "RUBRIC", $_POST ["rubrics"]);
  echo "<p class = 'cent'>Рубрика успешно удалена.</p>
  </body>
  </html>";
?>