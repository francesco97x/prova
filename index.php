 <html>
 <head>
 <title>Generatore di codici</title>
 <link href="style.css" rel="stylesheet" type="text/css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 </head>
 <body>
 <h1>Code generator</h1>
 
<?php
$server="eu-cdbr-west-03.cleardb.net";
$userid ="b4ad1dccd80968";
$Password = "c1df15bb";
$myDB = "heroku_52adf9eb0ea4951";$con = mysqli_connect($server,$userid,$Password,$myDB);if (mysqli_connect_errno()) {
# code...
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
?>

<?php
 
echo '<div class = "mainform">
 
  <div class="form-group">
  <form method="POST" action="">
    <label for="exampleFormControlSelect1">Id oggetto:</label>
    <select name = "select3"  class="form-control" id="exampleFormControlSelect1"  style="width:230px;" >
	<option>ID oggetto </option>';
 
$sqli = "SELECT id_object FROM objects";
$result = mysqli_query($con, $sqli);
while ($row = mysqli_fetch_array($result)) {
echo '<option>'.$row['id_object'].'</option>';
}
 
echo ' </select>
 
  </div>
   ';
 
?>
 
<?php
 
echo '<div class="form-group">
 
   <label for="exampleFormControlSelect1">Colore:</label>
    <select name = "color" class="form-control" id="exampleFormControlSelect13">
      <option>Colore</option>';
 
$sqli = "SELECT name_color FROM colors";
$result = mysqli_query($con, $sqli);
while ($row = mysqli_fetch_array($result)) {
echo '<option>'.$row['name_color'].'</option>';
}
 
echo ' </select>
     
  </div>
   ';
 
?>

 <div class="form-group">
    <label for="data">Data</label>
    <input name = "date"  class="form-control" id="data" placeholder="GG-MM-AAAA">
  </div>
     
<?php
 
echo '<div class="form-group">
 
   <label for="exampleFormControlSelect1">Edizione:</label>
    <select name = "edition" class="form-control" id="exampleFormControlSelect12">
      <option>Edizione</option>';
 
$sqli = "SELECT edition FROM editions";
$result = mysqli_query($con, $sqli);
while ($row = mysqli_fetch_array($result)) {
echo '<option>'.$row['edition'].'</option>';
}
 
echo ' </select>
    
  </div>
   ';
 
?>	 

  <?php 
  $stampa = "  ";
if(isset($_POST["submit"]))
{
  
$IDcode=$_POST['select3'];
$colorCode=$_POST["color"];
$dateCode=$_POST["date"];
$editionCcode=$_POST["edition"];
$nomefile="file.txt";

	$apro=fopen($nomefile,"r");
	$leggo=fread($apro,filesize($nomefile));
	fclose($apro);
	$arrcodici= preg_split( '/[\s,]+/', $leggo); 
	 
	 foreach ($arrcodici as $codice)
	  {
		  
		 
       $sqli = "SELECT id_object FROM generated_code WHERE id_generated = '$codice' ";
	  $result = mysqli_query($con, $sqli);
	   	if (mysqli_num_rows($result) == 0) {
		  
		 $stampa = $codice;
			 mysqli_query($con,"INSERT INTO generated_code (id_object, id_color, id_date, id_edition, id_generated) VALUES ('$IDcode', '$colorCode', '$dateCode', '$editionCcode', '$codice')");
			 break;
	    } 
	 
	}
 
 
 

}
 
 ?>
  <?php

echo "<button id = 'firstbutton'  type='submit' name = 'submit' class='btn btn-primary'>Genera</button>
  </form> 
    <div class='form-group'>
    <label for='generatedcode'>Codice generato:</label>
    <input  class='form-control' id='generatedcode' value = '$stampa' />
  </div>
 </div> ";
 ?>
 
 <?php
 
 
 $id_color2 = " ";
  $id_object2 = " ";
  $id_date2 = " ";
  $id_edition2 = " ";
 if(isset($_POST["submit2"]))
{
	$code= $_POST["code_input"];
	$query = mysqli_query($con, "SELECT id_object, id_color, id_date, id_edition, id_generated FROM generated_code WHERE id_generated = '$code'  ");
	$result3 = mysqli_fetch_array($query);
	  $id_object2 = $result3['id_object'];
	  $id_color2 = $result3['id_color'];
	  $id_date2 = $result3['id_date'];
	  $id_edition2 =  $result3['id_edition'];
	}
 ?>
  
 <div  id = "verifydiv" class="form-group">
  <form method="POST" action="">
    <label for="data">Verifica codice:</label>
    <input name ="code_input"  class="form-control" id="color"  >
	 
	<button id = "secondbutton"  type="submit" name = "submit2" class="btn btn-primary">Verifica</button>
	</form>
	 <div id = "distance" class="form-group">
    <label for="ID_code2">ID oggetto</label>
	<?php
		echo " <input  class='form-control' id='ID_code2' type='text' value='$id_object2'   /> ";
     ?>
     
    
  </div>
  <div class="form-group">
  
    <label for="color2">Colore</label>
	<?php
		echo " <input  class='form-control' type='text' value='$id_color2' id = 'color2' /> ";
     ?>
  </div>
    
  <div class="form-group">
    <label for="data2">Data</label>
	<?php
     
	echo " <input class= 'form-control' id= 'date2'   type='text' value='$id_date2'   /> ";
	?>
  </div>
     
  <div class="form-group">
    <label for="edition2">Edizione</label>
	<?php
     
	echo " <input  class='form-control' id='edition2' type='text' value='$id_edition2'   /> ";
	?>
  </div>
  </div>
   
 <div style="clear:both;"></div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 </body>
 </html>
