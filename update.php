<?php

include('database.php');

    $unitname = $_POST['unitname']; 
    $unitvalue= $_POST['unitvalue'];
    $display = $_POST['display'];
    $keycode=$_POST['keycode'];
  
    $query="UPDATE tblunits  SET unitname='$unitname',unitvalue=$unitvalue,display='$display' WHERE keycode=$keycode";
   ;

    if(mysqli_query($conn, $query))
    {
			echo 1;

			
		} else{
           // echo " not working";
          // echo("Error description: " . $mysqli_error -> error);
//           $error = $conn ->error;
//    echo("Error Occurred: ".$error);

			echo 0;
			
		}

?>