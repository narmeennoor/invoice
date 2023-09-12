<?php
include('database.php');

$in = $_POST['invoice'];
$jsonData = $_POST['jsonData'];

// Insert into invoicehead
$insertHeadQuery = "INSERT INTO invoicehead (`invoiceno`, `invoicedate`, `custname`, `mobileno`, `remarks`, `nettotal`) VALUES ('$in', NOW(), '{$_POST['custname']}', '{$_POST['mobno']}', '{$_POST['remark']}', '{$_POST['ntotal']}')";

if (!$conn->query($insertHeadQuery)) {
    echo "Error inserting invoice head data: " . $conn->error;
    exit();
}
$lineno=1;

$data = json_decode($jsonData, true);

if ($data) {
    $insertDetailQuery = "INSERT INTO invoicedetail (`invoiceno`, `lno`, `code`, `pdesc`, `unit`, `rate`, `qty`, `total`) VALUES ";

    $values = array();
    foreach ($data as $row) {
      
        $code = $row['Code'];
        $desc = $row['Description'];
        $units = $row['Units'];
        $rate = $row['Rate'];
        $qty = $row['Quantity'];
        $total = $row['Total'];
        
        $values[] = "('$in', '$lineno', '$code', '$desc', '$units', '$rate', '$qty', '$total')";
        $lineno++;
    }

    $insertDetailQuery .= implode(", ", $values);


    if (!$conn->query($insertDetailQuery)) {
        echo "Error inserting invoice detail data: " . $conn->error;
        exit();
    }
    echo 1; // Success
} else {
    echo "No data to insert";
}


?>
