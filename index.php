<?php 
  $dirct = "foldcount";
  $cnt = "counter.php";
  session_save_path ("path_to_custom_directory");
  session_start ();
  define ("MAX_IDLE_TIME", 3);
  function getOnlineUsers ()
  {
    if ($directory_handle = opendir ("path_to_custom_directory"))
    {
      $count = 0;
      while (($file = readdir ($directory_handle)) != false)
        if ($file != "." && $file != "..")
          if (time () - filemtime ("path_to_custom_directory/".$file) < MAX_IDLE_TIME * 60)
            $count++;
      closedir ($directory_handle);
      return $count;
    }
    else
      return false;
  }
  $page = 1; 
  include "head.php";
  echo "<h2 class='browncent'>Добро пожаловать на официальный сайт
          газеты \"DROVA\"!</h2>
      <table width='100%'>
        <tr>
          <td width='8%' valign='top'>
          </td>
          <td width='42%' valign='top'>            
            <h3 class='cent'>Газета \"DROVA\" является главным проектом
              студенческого общества  архибобров ХНУ им. Каразина.</h3>
          <h3 class='browncent'>Теперь все номера уже в Интернете!!!</h3>
          <h3 class='cent'>С помощью этого сайта вы можете:</h3>
            <ul type='circle'>
              <li>Просмотреть архив статей и номеров газеты</li>
              <li>Скачать любой номер газеты в формате PDF</li>
              <li>Найти статью, содержащую необходимый фрагмент</li>
              <li>Оставлять отзывы и пожелания для редакции путём сервиса
              \"обратная связь\"</li>
            </ul>
            Число пользователей на сайте на данный момент - ".getOnlineUsers().
              "<br/>
          </td>
          <td width='42%' valign='top'>     
            <h3 class='browncent'>Новости: вышел новый номер!</h3>
            <p class='cent'>
              <img src='Number15.jpg' alt=''/><br/>
              <br/>
              <a href='Drova150.pdf'>Прямая сторона номера</a>&nbsp;
              <a href='Drova151.pdf'>Обратная сторона номера</a>&nbsp;
              <a href='number_info.php?id=15'>Просмотреть статьи</a><br/>
            </p>
          </td>
          <td width='8%' valign='top'>
          </td>
        </tr>
      <tr>
<td colspan='6' style='text-align: center;'>";
?>
<div style="margin: 0 auto;">
<!--LiveInternet counter--><script type="text/javascript"><!--
  document.write ("<a href='http://www.liveinternet.ru/stat/localhost/Newspaper6/' " + "target=_blank><img src='//counter.yadro.ru/hit?t52.6;r" + escape(document.referrer) + ((typeof (screen) == "undefined") ? "" : ";s" + screen.width + "*" + screen.height + "*" + (screen.colorDepth ?screen.colorDepth : screen.pixelDepth)) + ";u" + escape (document.URL) + ";" + Math.random () + "' alt='' title='LiveInternet: показано число просмотров и" + " посетителей за 24 часа' " + "border='0' width='88' height='31'><\/a>");
//--></script><!--/LiveInternet-->
</div>
          </td>
        </tr>
      </table>
    </body>
  </html>