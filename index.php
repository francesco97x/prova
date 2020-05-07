<html>

<head>

  <link href="css/style.css" rel="stylesheet"  >

  <title>Home</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
         
      
      </div>
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
          <a href="#" class="list-group-item">Storico</a>
        </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="card mt-4">
           
          <div class="card-body">
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
          </div>
        </div>
       

      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer  id = "footer" class="py-5 bg-dark">
    <div class="container">
 
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
