<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  include "functions147.php";
?>
<form method="post" name="form" action="<?php echo ("add_number_to_DB147.php"); ?>" onSubmit="return overify (this)">
  <p class='cent'>
    Выберите год выпуска газеты:<br/>
    <select name="Year_drawing">
    <?php
      for ($i = 2004; $i < date ("Y") + 2; $i++)
        echo "<option VALUE='".$i."'>".$i;    
    ?>
    </select><br/>
    Выберите месяц выпуска газеты:<br/>  
    <select name="monthes" size="1">
      <option value="1"/>Январь
      <option value="2"/>Февраль
      <option value="3"/>Март
      <option value="4"/>Апрель
      <option value="5"/>Май
      <option value="6"/>Июнь
      <option value="7"/>Июль
      <option value="8"/>Август
      <option value="9"/>Сентябрь
      <option value="10"/>Октябрь
      <option value="11"/>Ноябрь
      <option value="12"/>Декабрь
    </select><br/>
    <br/>
    <input type="submit" name="Добавить" value="Добавить"/>
  </p>
</form>
<?php 
  echo "</body>
    </html>";
?>