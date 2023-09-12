<?php
include('database.php');


    $keycode=$_POST['keycode'];

    $query="DELETE FROM tblproducts WHERE keycode=$keycode";
   
    // if ($conn->query($query) === TRUE) {
    //   echo 1;
    // } else {
    //   echo 0;
    // }
    $query_run=mysqli_query($conn,$query);
    if($query_run){
      echo 1;
    }
    else{
      //echo("Error description: " . $mysqli -> error);
      echo 0;
   
     }
   
?>
