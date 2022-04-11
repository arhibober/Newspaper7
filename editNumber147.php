<script type="text/javascript" src="ajax.js"></script>
<meta name="robots" content="noindex"/>
<?php
  include "head.php";
  include "functions147.php";
  onBD ($result, "NUMBER");
  while ($row = mysqli_fetch_array($result))
    $i++;   
  if ($i > 0)
  {
    onBD ($result, "NUMBER");
    while ($row = mysqli_fetch_array($result))
    {
      $temp = $row [0];
      break;
    }
  }
  else
    $temp = 1;
  if (!isset ($_GET ["numbers"]))
    $ind = $temp;
  else
	$ind = $_GET ["numbers"];
?>
<form method="post" name="form" action="<?php echo ("edit_number_in_DB147.php"); ?>"
  onsubmit="return overify (this)">
  <?php
    $i = 0;
    onBD ($result, "NUMBER");   
    while ($row = mysqli_fetch_array ($result))
      $i++;
    if ($i > 0)
    {
      echo "<p class='cent'>
        Выберите номер газеты (сквозной), который Вы хотите редактировать:<br/>
        <select name='numbers' size='1' id='ind' onchange='submitForm(\"editNumber147\")'>";
      onBD ($result, "NUMBER");
      while ($row = mysqli_fetch_array ($result))
      {
        echo "<option value='".$row [0]."'";
        if ($row [0] == $ind)
          echo " selected";
        echo "/>".$row [0];
      }
      while ($row = mysqli_fetch_array ($result))
        echo "<option value='".$row [0]."'/>".$row [0];
      echo "</select>
      <div id='dest'>
      </p>";
      $monthes = array ("Январь", "Февраль", "Март", "Апрель", "Май", "Июнь",
        "Июль", "Август", "Сентябрь", "Октябрь", "Ноябрь", "Декабрь");
      onBD ($result, "NUMBER");
      while ($row = mysqli_fetch_array($result))
        if ($row[0] == $ind)
        {
          echo "<p class='cent'>
            Изменить год выпуска газеты:<br/>            
            <select name='year_drawing'>";
            for ($i = 2004; $i < date ("Y") + 2; $i++)
            {
              echo "<option value='".$i."'";
              if ($row [2] == $i)
                echo " selected";
              echo "/>".$i;
            }    
          echo "</select><br/>
            Изменить месяц выпуска газеты:<br/>
            <select name='monthes' size='1'>";
          for ($j = 0; $j < 12; $j++)
          {
            echo "<option value='".($j + 1)."'";
            if ($j == $row [5] - 1)
              echo " selected";
            echo "/>".$monthes [$j];
          }
          echo "</select><br/>
          Если хотите изменить или добавить вступительный стих, выберите название нового стиха
            из ранее вставленных в данный номер:<br/>        
          <select name='lyrics' size='1'>";
          onBD ($resultLyric, "ARTICLE");
          while ($rowLyric = mysqli_fetch_array($resultLyric))
          {
          	if ($rowLyric [4] == 1 && $rowLyric [5] == $row [0])
          	{
              echo "<option value='".$rowLyric [0]."'";
              if ($rowLyric [0] == $row [4])
                echo " selected";
              echo "/>".$rowLyric [1];
          	}
          }
          echo "</select><br/><br/>
          <input type='submit' name='Edit' value='Редактировать'>";
        }
        echo "</div>
        </p>";
    }
    else
      echo "<p class='cent'>На данный момент газета на сайте отсутствует.</p>";
  ?>
</form>
<?php 
  echo "</body>
    </html>";
?>
<script language="javascript">
     function overify (f)
     {
       if (confirm ("Сохранить данные о " + f.numbers.options [f.numbers.selectedIndex].text + "-ом номере газеты?"))
      	 return true;
       else
      	 return false;
     }
     </script>