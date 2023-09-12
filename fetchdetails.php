<?php

include('database.php');

$selectedProductCode = $_GET['Value'];

// Query the database for details of the selected product code
$query = "SELECT productname, unit, rate FROM tblproducts WHERE productcode = '$selectedProductCode'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    
    $row = $result->fetch_assoc();
    
    $details = [
        'description' => $row['productname'],
        'unit' => $row['unit'],
        'rate' => $row['rate']
    ];
    // $detailsHtml = "<p>{$row['unit']}</p>";
    // echo $detailsHtml;
    echo json_encode($details);
} else {
    echo "Details not found.";
}
?>