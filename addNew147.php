<meta name="robots" content="noindex"/>
<?php
  include "head.php";
?>
<form method="post" name="form" action="<?php echo ("add_new_to_file147.php"); ?>" onsubmit="return overify (this)">
  <p class="cent">
    Текст новости:<br/>
    <textarea name="new_text" cols="60" rows="10"></textarea><br/>
    <br/> 
    <input name= "submit" type="submit" value="Добавить"/>
  </p>
</form>
<?php  
  echo "</body>
    </html>";
?>
<script language="javascript">
  function overify (f)
  {
    if (f.new_text.value.length == 0)
    {
      alert ("Введите текст новости!");
      return false;
    }
  }
</script>