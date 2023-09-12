<?php

include('database.php');


    $invoiceNumber = $_POST['invoiceNumber'];

    // Query to fetch invoice details based on the provided invoice number
    $query = "SELECT * FROM invoicedetail WHERE invoiceno = '$invoiceNumber' ";

    // Execute the query
    $result = $conn->query($query);

    // Create an array to store fetched data
    $invoiceDetails = array();

    // Fetch the data from the result
    while ($row = $result->fetch_assoc()) {
        $invoiceDetails[] = $row;
    }

    // Return the fetched data as JSON response
    echo json_encode($invoiceDetails);

?>

