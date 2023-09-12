<?php
include('database.php');
$max = "SELECT MAX(invoiceno) AS invoiceval FROM invoicehead";
$result = mysqli_query($conn, $max);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    if ($row['invoiceval'] === null) {
        $nextInvoiceNumber = 1; 
    } else {
        $nextInvoiceNumber =$row['invoiceval'] + 1;
    }
} else {
    $nextInvoiceNumber = 1; 
}


echo $nextInvoiceNumber;
?>
