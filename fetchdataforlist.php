<?php

include('database.php');

$sql = mysqli_query($conn,"select productcode, productname, unit, rate,stock from  tblproducts");
// $userinfo = array();

while ($row_user = mysqli_fetch_assoc($sql))
    $userinfo[] = $row_user;
    // foreach($userinfo as $usrinfo){
    //     echo "productcode: ".$usrinfo['productcode']."<br />";
    //     echo "productname: ".$usrinfo['productname']."<br />";
    //     echo "unit: ".$usrinfo['unit']."<br />";
    //     echo "rate: ".$usrinfo['rate']."<br />";
        header("Content-type: application/json");
        echo json_encode($userinfo);
    // }
exit;

?>
