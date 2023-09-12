
<?php

include('database.php');



	// 	// Taking all 4 values from the form data(input)
	// 	$username=mysqli_real_escape_string($conn, $_POST['username']);
	// 	$email=mysqli_real_escape_string($conn, $_POST['email']);
	// 	$password=mysqli_real_escape_string($conn, $_POST['password']);
	// 	$phone=mysqli_real_escape_string($conn, $_POST['phone']);
	// 	$query 	=mysqli_query($conn,"INSERT INTO users (`keycode`, `email`, `phone`, `username`, `password`, ` datetime`) VALUES (' ','$email','$phone','$username','$password',' ')");
	
	

	// // $stmt=mysqli_query($conn,$query);
	
	// if ($query ==1){
	// 	echo 1;
	// }
	// else{
	// 	echo 0;
	// }
	$username= $_POST['username'];
	$password= $_POST['password'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$date = date('Y-m-d H:i:s');

	$query = "INSERT INTO users (`keycode`, `email`, `phone`, `username`, `password`, `datetime`) VALUES (' ','$email','$phone','$username','$password','$date')";
	

	$stmt=mysqli_query($conn,$query);
	
	if ($stmt==1){
		echo 1;
	}
	else{
		echo 0;
	}


?>
