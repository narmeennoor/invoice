<?php

include('database.php');
// Query to fetch product names from the tblproducts table
$sql = "SELECT Distinct unit FROM tblproducts";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $productUnits = array();

    // Fetch and store product names in an array
    while ($row = $result->fetch_assoc()) {
        $productUnits[] = $row["unit"];
    }

    // Close the database connection
    $conn->close();

    // Return the product names as JSON
    echo json_encode($productUnits);
} else {
    // No results found
    echo json_encode(array());
}