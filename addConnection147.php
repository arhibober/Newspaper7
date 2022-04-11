<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  include "functions147.php";
?>
<form method="post" name="form" action="<?php echo ("add_connection_to_DB147.php"); ?>" onSubmit="return overify (this)">
  <p class="cent">
    Выберите сквозной номер газеты:<br/>
    <select name="numbers" size="1'">
    <?php      
      onBD ($result, "NUMBER");
      while($row = mysqli_fetch_array($result))
        echo "<option value='".$row [0]."'/>".$row [0];
    ?>
    </select><br/>
    Выберите члена редколлегии этого номера:<br/>        
    <select name="members" size="1">
    <?php      
      onBD ($result, "MEMBER");
      while ($row = mysqli_fetch_array ($result))
        echo "<option value='".$row [0]."'/>".$row [1]." ".$row [2];
    ?>
    </select>
    <br/>
    <br/>
    <input type="submit" name="Add" value="Назначить ответственным"/>
  </p>
</form>
<?php
  echo "</body>
    </html>";
?>