<!doctype html>
<html lang="en">
 
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/style3.css" rel="stylesheet"  >

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
          <a href="index.php" class="list-group-item ">Genera codice</a>
          <a href="verifica.php" class="list-group-item">Verifica codice</a>
          <a href="storico.php" class="list-group-item active">Storico</a>
        </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="card mt-4" id = "rettangolo">
           <?php
          echo ' <form method="POST" action="">
		  <div  class="card-body">
				<div id ="start_date"  style="float:left; display:block; >
				<label for="start">Data iniziale:</label>
				 <input type="date" id="start" name= "trip-start" value= "2020-05-01"  >	 
				</div>
 
         
		 
				<div id = "end_date" style="float:left; display:block;  >
				<label for="start">Data finale:</label>
				<input type="date" id="start" name="trip-end" value="2020-05-31"  >
				</div>
			 <button id = "cercabutton" type="submit" name = "submit" class="btn btn-primary">Cerca</button>
        </div>
		</form>';
		 
	   if(isset($_POST["submit"])){
		$startDate = $_POST["trip-start"];
		$endDate = $_POST["trip-end"]; 
		$sqli = "SELECT  id_object, id_color, DATE_FORMAT( id_date , '%d/%m/%Y') as id , id_edition, id_generated  FROM generated_code WHERE id_date between '$startDate' and '$endDate' ORDER BY id_date ASC ";
		$result = mysqli_query($con, $sqli);
		if(mysqli_num_rows($result) == 0)
			echo ' Nessun codice è stato generato nelle date indicate';
		else{
		echo ' <table class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Codice generato</th>
      <th class="text-center">
        Id oggetto 
      </th>
      <th class="text-center">
       Colore
      </th>
      <th class="text-center">
        Data
      </th>
      <th class="text-center">
        Edizione
      </th>
    </tr>
  </thead>
  <tbody>';
		
		while ($row = mysqli_fetch_array($result)) {
			echo '
			<tr>
			<th class="text-nowrap" scope="row"   >  '.$row["id_generated"].'</th>
			<td> '.$row["id_object"].'</td>
			<td>  '.$row["id_color"].'</td>
			<td>  '.$row["id"].'</td>
			<td> '.$row["id_edition"].'</td>
			</tr>';
	 
		}
		echo '</tbody> 
  
		</table>'; 
		}
	   }
	   ?>
 
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
