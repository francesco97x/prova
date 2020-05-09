<!doctype html>
<html lang="en">
 
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/style.css" rel="stylesheet"  >

  <title>Home</title>

  <!-- Bootstrap core CSS -->
 
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Custom styles for this template -->
  <link href="css/shop-item.css" rel="stylesheet">
 
 
</head>

<body>

<?php
$server="eu-cdbr-west-03.cleardb.net";
$userid ="b4ad1dccd80968";
$Password = "c1df15bb";
$myDB = "heroku_52adf9eb0ea4951";$con = mysqli_connect($server,$userid,$Password,$myDB);if (mysqli_connect_errno()) {
 
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 
?>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Generatore di codici </a>
     
    
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">
        <h1 class="my-4"> </h1>
        <div class="list-group">
          <a href="index.php" class="list-group-item active">Genera codice</a>
          <a href="verifica.php" class="list-group-item">Verifica codice</a>
          <a href="storico.php" class="list-group-item">Storico</a>
        </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="card mt-4">
           
          <div class="card-body">
		  <a href="inserimento_manuale.php"  id ="inserisci"  >Inserisci manualmente</a>
            <?php
 
echo '<div class = "mainform">
 
  <div class="form-group">
  <form method="POST" action="">
    <label for="exampleFormControlSelect1">ID oggetto:</label>
    <select name = "select3"  class="form-control" id="exampleFormControlSelect1" >
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

    <label for="data">Data:</label>
 <div class="form-group">
    <input name = "date"  class="form-control" id="data" placeholder="GG/MM/AAAA">
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
$test_arr  = explode('/', $dateCode);
 if (count($test_arr) == 3) {
    if (checkdate($test_arr[1], $test_arr[0], $test_arr[2])) {
        
     


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
			 mysqli_query($con,"INSERT INTO generated_code (id_object, id_color, id_date, id_edition, id_generated) VALUES ('$IDcode', '$colorCode', STR_TO_DATE('$dateCode','%d/%m/%Y') , '$editionCcode', '$codice')");
			 break; 
			 
	    } 
	 
	}
 
	}
	else {
		echo '<script language="javascript">';
		echo 'alert("inserire una data valida nel formato GG/MM/AAAA")';
		echo '</script>';
	}
}
 else {
		echo '<script language="javascript">';
		echo 'alert("inserire una data valida nel formato GG/MM/AAAA")';
		echo '</script>';
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
          </div>
        </div>
       

      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
   
 
 

  <!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>

</html>
