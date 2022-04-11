<?php
  $page = 2;
  include "head.php"; 
  include "functions147.php";
  onBD ($result, "NUMBER");
  echo "<div class = 'cent'>";
  while ($row = mysqli_fetch_array ($result))  
    echo "<a href = 'number_info.php?id=".$row [0]."'>Номер ".$row [0]."</a><br/>";
  echo "<a href = 'pizza.php'>Спец-приложение 'PIZZA'</a></div>
         </td>
</tr>
      <tr>
<td colspan='6' style='text-align: center;'>";
?>
<div style="margin: 0 auto;">
<!--LiveInternet counter--><script type="text/javascript"><!--
  document.write ("<a href='http://www.liveinternet.ru/stat/localhost/Newspaper6/' " + "target=_blank><img src='//counter.yadro.ru/hit?t52.6;r" + escape (document.referrer) + ((typeof (screen) == "undefined") ? "" : ";s" + screen.width + "*" + screen.height + "*" + (screen.colorDepth ? screen.colorDepth:screen.pixelDepth)) + ";u" + escape (document.URL) + ";" + Math.random () + "' alt='' title='LiveInternet: показано число просмотров и" + " посетителей за 24 часа' " + "border='0' width='88' height='31'><\/a>");
//--></script><!--/LiveInternet-->
</div>
          </td>
        </tr>
      </table>
    </body>
  </html>