<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  include "functions147.php";
  fromBD ($result, "MEMBER	", $_POST ["members"]);
  echo "<p class = 'cent'>Данные об участнике успешно удалены.</p>
  </body>
  </html>";  
?>