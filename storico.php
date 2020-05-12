<!doctype html>
<html lang="en">
 
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/style3.css" rel="stylesheet"  >

  <title>Home</title>

  <!-- Bootstrap core CSS -->
 
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 
 
 
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
   <script type="text/javascript">
	function VoucherSourcetoPrint(source) {
		return "<html><head><script>function step1(){\n" +
				"setTimeout('step2()', 10);}\n" +
				"function step2(){window.print();window.close()}\n" +
				"</scri" + "pt></head><body onload='step1()'>\n" +
				"<img src='" + source + "' /></body></html>";
	}
	function VoucherPrint(source) {
		Pagelink = "about:blank";
		var pwa = window.open(Pagelink, "_new");
		pwa.document.open();
		pwa.document.write(VoucherSourcetoPrint(source));
		pwa.document.close();
	}
	
	 
 
</script>
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

      <div class="col-lg-9" >

        <div class="card mt-4" id = "rettangolo">
           <?php
		   $startDate = "2020-04-01";
		   $endDate = "2020-05-01";
          echo " <form method='POST' action=''>
		  <div  class='card-body'>
				<div id ='start_date'  style='float:left; display:block;' >
				<label for='start'>Data iniziale:</label>
				 <input type='date' id='start' name= 'trip-start' value= '$startDate'  >	 
				</div>
 
         
		 
				<div id = 'end_date' style='float:left; display:block;'  >
				<label for='start'>Data finale:</label>
				<input type='date' id='start' name='trip-end' value='2020-05-31'  >
				</div>
			 <button id = 'cercabutton' type='submit' name = 'submit' class='btn btn-primary'>Cerca</button>
        </div>
		</form>";
		 
	   if(isset($_POST["submit"])){
		$startDate = $_POST["trip-start"];
		$endDate = $_POST["trip-end"]; 
		$sqli = "SELECT  id_object, id_color, DATE_FORMAT( id_date , '%d/%m/%Y') as id , id_edition, id_generated  FROM generated_code WHERE id_date between '$startDate' and '$endDate' ORDER BY id_date ASC ";
		$result = mysqli_query($con, $sqli);
		$sqli2 = "SELECT   count(id_generated)  FROM generated_code WHERE id_date between '$startDate' and '$endDate'" ;
		$result2 = mysqli_query($con, $sqli2);
		if(mysqli_num_rows($result) == 0)
			echo ' Nessun codice è stato generato nelle date indicate';
		else{
			$row2 = mysqli_fetch_array($result2);
			echo '<b>Codici presenti: ' .$row2[0]. '</b>';
			
		echo '
	  
 <table    class="table table-bordered table-striped">
  <thead  >
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
	  <th>
	  
	  </th>
    </tr>
  </thead>
  <tbody>';
		
		while ($row = mysqli_fetch_array($result)) {
			echo '
			<tr>
			<th class="text-nowrap" scope="row"   >  '.$row["id_generated"].'
			<div style="clear:both;"></div>
			<a type="button5"  href="#" onclick="VoucherPrint(\'code/barcode.php?text='.$row["id_generated"].'&size=60&&print=true\'); return false;"   margin-top: 20px;>Stampa</a></th>
			<td> '.$row["id_object"].'</td>
			<td>  '.$row["id_color"].'</td>
			<td>  '.$row["id"].'</td>
			<td id = "tabella"> '.$row["id_edition"].'</td>
			<td> 
			 <form method="POST" action="">
			<button type="button5" name = "delete" value = '.$row["id_generated"].' class="btn btn-secondary"  >Elimina</button>
			
			
			</form>
			</td>
			</tr>';
	 
		}
		echo '</tbody> 
  
		</table> '; 
		}
	   }
	   ?>
 <?php
  if(isset($_POST["delete"])){
	  $deletingrow = $_POST["delete"];
	  mysqli_query($con,"DELETE FROM generated_code WHERE id_generated = '$deletingrow' ");
	   echo '<script language="javascript">';
		echo 'alert("codice eliminato correttamente")';
		echo '</script>';
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
