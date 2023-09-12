<?php

include('database.php');
$query="SELECT * FROM tblproducts";

// $result = $conn->query($query);

// $out_array = array();
// while($row =mysqli_fetch_assoc($result)){
//     $out_array[] = $row;
// }
//  echo json_encode($out_array);

// $conn->close();
$query_run=mysqli_query($conn,$query);
$result_array=[];
if(mysqli_num_rows($query_run)>0)
{
    foreach($query_run as $row)
    {
        array_push($result_array,$row);
    }
    header('Content-type:application/json');
    echo json_encode($result_array);
}
else{
    echo $return="<h5>
    no record found</h5>";
}
?>