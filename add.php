<?php

include('database.php');



    $un= $_POST['unitname'];
	$uv= $_POST['unitvalue'];
	$di=$_POST['display'];
	$date = date('Y-m-d H:i:s');

	$query = "INSERT INTO tblunits (`keycode`, `unitname`, `unitvalue`, `display`, `datetime`) VALUES (' ','$un','$uv','$di','$date')";
	

	$stmt=mysqli_query($conn,$query);
	
	if ($stmt==1){
		echo 1;
       
	}
	else{
		echo 0;
	}