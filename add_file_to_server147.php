<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  if ($_FILES ["myfile"]["size"] > 1024*3*1024)
  {
    echo ("<p class='cent'>Размер файла превышает три мегабайта</p>");
    exit;
  }
  if (file_exists ($_FILES["myfile"]["name"]))  
  {
    echo ("<p class='cent'>Файл с таким названием уже существует в данном каталоге!</p>");
    exit;
  }
  // Проверяем загружен ли файл
  if (is_uploaded_file ($_FILES["myfile"]["tmp_name"]))
  {
    // Если файл загружен успешно, перемещаем его
    // из временной директории в конечную
    move_uploaded_file ($_FILES["myfile"]["tmp_name"],
      "/home/localhost/www/Newspaper/".$_FILES["myfile"]["name"]);
    echo "<p class='cent'>Файл успешно загружен.</p>"; 	
  }
  else
    echo "<p class='cent'>Ошибка загрузки файла.</p>";
  echo "</body>
    </html>";
?>
