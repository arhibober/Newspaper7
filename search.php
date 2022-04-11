<?php
  $page = 4;
  include "head.php";  
?>

<script language="javascript">
  function overify (f)
  {
	b = true;
    if (f.Find_text.value.length == 0)
    {
      alert ("Введите запрос!");
      b = false;
    }
    if (f.Find_text.value.indexOf(">") != -1)
    {
      alert ("Запрос содержит закрывающийся тег XML!");
      b = false;
    }
    if (f.Find_text.value.indexOf("<") != -1)
    {
      alert ("Запрос содержит открывающийся тег XML!");
      b = false;
    }
    if (f.Find_text.value.indexOf(".") != -1)
    {
      alert ("Запрос содержит точку!");
      b = false;
    }
    if (f.Find_text.value.indexOf("'") != -1)
    {
      alert ("Запрос содержит одинарные кавычки!");
      b = false;
    }
    if (f.Find_text.value.indexOf("\"") != -1)
    {
      alert ("Запрос содержит двойные кавычки!");
      b = false;
    }
    if (f.Find_text.value.indexOf("&") != -1)
    {
      alert ("Запрос содержит амперсант!");
      b = false;
    }
    return b;
  }
</script>
<p class="cent">Поиск по сайту:</p>
  <form method="post" name="form" action="<?php echo ("Find_text.php"); ?>" onSubmit="return overify(this)">
    <p class="cent">
      <input type="text" name="Find_text" size=40>
      <button type="submit" value="OK" style="background-color:white"><img src="lupa.gif" width="20" height="20"
        alt=""/>
      </button>
    </p>
  </form>
     <?php echo"</td>
</tr>
      <tr>
<td colspan='6' style='text-align: center;'>";
?>
<div style="margin: 0 auto;">
<!--LiveInternet counter--><script type="text/javascript"><!--
  document.write ("<a href='http://www.liveinternet.ru/stat/localhost/Newspaper6/' " + "target=_blank><img src='//counter.yadro.ru/hit?t52.6;r" + escape(document.referrer) + ((typeof (screen) =="undefined") ? "" : ";s"+screen.width + "*" + screen.height + "*" + (screen.colorDepth ?screen.colorDepth:screen.pixelDepth)) + ";u" + escape (document.URL) + ";" + Math.random () + "' alt='' title='LiveInternet: показано число просмотров и" + " посетителей за 24 часа' " + "border='0' width='88' height='31'><\/a>")
//--></script><!--/LiveInternet-->
</div>
          </td>
        </tr>
      </table>
    </body>
  </html>