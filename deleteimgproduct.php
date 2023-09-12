<?php
include('database.php');


    // $keycode=$_POST['keycode'];

    // $query="DELETE FROM tblimage WHERE keycode=$keycode";
    // //$query1="DELETE FROM tbluploads WHERE keycode=$keycode"
    // // if ($conn->query($query) === TRUE) {
    // //   echo 1;
    // // } else {
    // //   echo 0;
    // // }
    // $query_run=mysqli_query($conn,$query);
    // if($query_run){
    //   echo 1;
    // }
    // else{
    //   //echo("Error description: " . $mysqli -> error);
    //   echo 0;
   
    //  }

$keycode = $_POST['keycode'];

// Delete from tblimage
$query_image = "DELETE FROM tblimage WHERE keycode = $keycode";
$query_run_image = mysqli_query($conn, $query_image);

// Delete from tbluploads
$query_uploads = "DELETE FROM tbluploads WHERE keycode = $keycode";
$query_run_uploads = mysqli_query($conn, $query_uploads);

if ($query_run_image && $query_run_uploads) {
    echo 1; 
} else {
    echo 0; 
}
?>