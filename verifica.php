<html>

<head>

  <link href="css/style_verifica.css" rel="stylesheet"  >

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
          <a href="index.php" class="list-group-item">Genera codice</a>
          <a href="verifica.php" class="list-group-item active">Verifica codice</a>
          <a href="storico.php" class="list-group-item">Storico</a>
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
	$query = mysqli_query($con, "SELECT id_object, id_color, DATE_FORMAT( id_date , '%d/%m/%Y') as id, id_edition, id_generated FROM generated_code WHERE id_generated = '$code'  ");
	$result3 = mysqli_fetch_array($query);
	  $id_object2 = $result3['id_object'];
	  $id_color2 = $result3['id_color'];
	  $id_date2 = $result3['id'];
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
 

  <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>
