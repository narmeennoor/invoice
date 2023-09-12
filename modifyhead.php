<?php

include('database.php');

$in = $_POST['invoice'];
$cn = $_POST['custname'];
$mn = $_POST['mobno'];
$rm = $_POST['remark'];
$nt = $_POST['ntotal'];
$jsonData = $_POST['jsonData'];
$date = date('y-m-d H:i:s');


$deleteInvoiceHeadQuery = "DELETE FROM invoicehead WHERE invoiceno='$in'";
mysqli_query($conn, $deleteInvoiceHeadQuery);


$deleteInvoiceDetailQuery = "DELETE FROM invoicedetail WHERE invoiceno='$in'";
mysqli_query($conn, $deleteInvoiceDetailQuery);


$insertInvoiceHeadQuery = "INSERT INTO invoicehead (`invoiceno`, `invoicedate`, `custname`, `mobileno`, `remarks`, `nettotal`) VALUES ('$in','$date','$cn','$mn','$rm','$nt')";
mysqli_query($conn, $insertInvoiceHeadQuery);

$lineno = 1;
$data = json_decode($jsonData, true);
if ($data) {
    foreach ($data as $row) {
        $code = $row['Code'];
        $desc = $row['Description'];
        $units = $row['Units'];
        $rate = $row['Rate'];
        $qty = $row['Quantity'];
        $total = $row['Total'];
        $sql = "INSERT INTO invoicedetail (`invoiceno`, `lno`, `code`, `pdesc`, `unit`, `rate`, `qty`, `total`) VALUES ('$in','$lineno','$code','$desc','$units','$rate','$qty','$total')";
        mysqli_query($conn, $sql);

        $lineno++;
    }
}

echo '1'; 


?>
