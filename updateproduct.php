<?php

include('database.php');

    $productcode= $_POST['productcode']; 
    $productname= $_POST['productname'];
    $units = $_POST['units'];
    $rate = $_POST['rate'];
    $stock = $_POST['stock'];
    $keycode=$_POST['keycode'];
  
    $query="UPDATE tblproducts  SET productcode='$productcode',productname='$productname',unit='$units',rate='$rate',stock='$stock' WHERE keycode=$keycode";
  // echo $query;

    if(mysqli_query($conn, $query))
    {
			echo 1;

			
		} else{
            // $error = $conn ->error;
            // echo("Error Occurred: ".$error);
           // echo " not working";
          // echo("Error description: " . $mysqli_error -> error);
			echo 0;
			
		}

?>