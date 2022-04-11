<meta name="robots" content="noindex"/>
<script type="text/javascript" src="ajax.js"></script>
<?php
  include "head.php";
  if (!isset ($_GET ["message"]))
    $ind = 1;
  else 
	$ind = $_GET ["message"];
?>
<form method="post" action="<?php echo ("Remove_Message147.php"); ?>" name="form" onsubmit="return overify(this)">
<?php
  $dirct = "gb"; 
  $nom = "connection";
  $hdl = opendir ($dirct); 
  $i = 0;
  while ($file = readdir ($hdl))
    if (strstr ($file, $nom) == true)
      $i++;
  if ($i > 0)
  {
  	echo "<p class='cent'>
  	  Выберите номер сообщения, которое вы хотите удалить<br/>
  	  <select name='message' SIZE='1' id='ind' onchange='submitForm(\"removeGuestBook147\")'>";
    $hdl=opendir ($dirct);
    $j = 0;
    while ($file = readdir ($hdl))          
      if (strstr ($file, $nom) == true)
      {
       	$j++;
        echo "<option value'".$j."'>".$j;
      }
    echo "</select><br/>
    </p>
    <div id='dest'>";
    $hdl = opendir ($dirct);
    $j = 0;
    while ($file = readdir ($hdl))
  	  if (strstr ($file, $nom) == true)
      {      	
        $j++;
        if ($ind == $j)
        {
          echo "<table border='0'><tr><td width='200' class='yellow'>№".$j;
      	  $file1 = fopen ($dirct."/".$file, "r");
          echo fgets ($file1, 10000);
          while (!feof ($file1))
          {
      	    $i = 0;
            $temp = fgets ($file1, 10000);
      	    while (substr ($temp, $i, 1) == " ")
      	      $i++;
      	    for ($k = 0; $k < $i; $k++)
              echo "&nbsp";
            echo substr ($temp, $i, strlen ($temp) - $i);
      	    echo "<br/>";
          }
        }
      }
    echo "</div>
    <br/>
    <p class='cent'><input type='submit' name='Remove' value='Удалить сообщение'></p>";
  }  
  else
    echo "<p class='cent'>На данный момент в гостевой книге нет ни одного сообщения</p>";
?>
</form>
<?php
  echo "</body>
    </html>";    
?>
<script language="javascript">
     function overify (f)
     {
       if (confirm ("Вы действительно хотите удалить сообщение №" + f.message.options[f.message.selectedIndex].text + "?"))
   	     return true;
   	   else
   	   	 return false;
     }
     </script>
