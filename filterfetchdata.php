<?php

include('database.php');
// Query to fetch product names from the tblproducts table
$sql = "SELECT productname FROM tblproducts";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $productNames = array();

    // Fetch and store product names in an array
    while ($row = $result->fetch_assoc()) {
        $productNames[] = $row["productname"];
    }

    // Close the database connection
    $conn->close();

    // Return the product names as JSON
    echo json_encode($productNames);
} else {
    // No results found
    echo json_encode(array());
}




// include('database.php');
// // Define the response array
// $response = [];

// // Fetch Product Names
// $productNames = [];
// $sql = "SELECT DISTINCT productname FROM tblproducts";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         $productNames[] = $row['productname'];
//     }
// }

// $response['productNames'] = $productNames;

// // Fetch Product Codes
// $productCodes = [];
// $sql = "SELECT DISTINCT productcode FROM tblproducts";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         $productCodes[] = $row['productcode'];
//     }
// }

// $response['productCodes'] = $productCodes;

// // Fetch Units
// $units = [];
// $sql = "SELECT DISTINCT unit FROM tblproducts";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//     while ($row = $result->fetch_assoc()) {
//         $units[] = $row['unit'];
//     }
// }

// $response['units'] = $units;

// // Close the database connection
// $conn->close();

// // Return the response as JSON
// header('Content-Type: application/json');
// echo json_encode($response);
//
?>
