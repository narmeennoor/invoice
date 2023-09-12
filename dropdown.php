<?php

include('database.php');
$query="SELECT * FROM tblunits";

$query_run=mysqli_query($conn,$query);
$result_array=[];
if(mysqli_num_rows($query_run)>0)
{
    foreach($query_run as $row)
    {
        array_push($result_array,$row);
    }
    //header('Content-type:application/json');
    echo json_encode($result_array);
}
else{
//     $error = $conn ->error;
//    echo("Error Occurred: ".$error);
    echo $return="<h5>
    no record found</h5>";
}
?>