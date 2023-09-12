<?php
include('database.php');
$max = "SELECT MAX(keycode) AS keycode FROM tblimage";
$result = mysqli_query($conn, $max);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    if ($row['keycode'] === null) {
        $nextInvoiceNumber = 1; 
    } else {
        $nextInvoiceNumber =$row['keycode'] + 1;
    }
} else {
    $nextInvoiceNumber = 1; 
}


echo $nextInvoiceNumber;
?>