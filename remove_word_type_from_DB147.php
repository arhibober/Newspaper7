<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  include "functions147.php";
  fromBD ($result, "WORD_TYPE", $_POST ["word_types"]);
  echo "<p class='cent'>Категория успешно удалена.</p>
  </body>
  </html>";
?>