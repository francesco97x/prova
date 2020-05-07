<html>

<head>

  <link href="css/style_verifica.css" rel="stylesheet"  >

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
     
    
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">
        <h1 class="my-4"> </h1>
        <div class="list-group">
          <a href="index.php" class="list-group-item">Genera codice</a>
          <a href="verifica.php" class="list-group-item active">Verifica codice</a>
          <a href="#" class="list-group-item">Storico</a>
        </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="card mt-4">
           
          <div class="card-body">
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
