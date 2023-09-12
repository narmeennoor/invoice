<?php

include('database.php');



    $pc= $_POST['pdcode'];
	$pn= $_POST['pdname'];
	$units=$_POST['units'];
    $rate=$_POST['rate'];
    $stock=$_POST['stock'];
    //$di=$_POST['display'];
	$date = date('Y-m-d H:i:s');

	$query = "INSERT INTO tblproducts (`keycode`, `productcode`, `productname`, `unit`,`rate`,`stock`, `datetime`) VALUES (' ','$pc','$pn','$units','$rate','$stock','$date')";
	

	$stmt=mysqli_query($conn,$query);
	
	if ($stmt==1){
		echo 1;
       
	}
	else{
		echo 0;
	}