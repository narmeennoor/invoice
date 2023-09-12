<?php

include('database.php');

$sql = "select invoiceno from  invoicehead";
$result = $conn->query($sql);
// $userinfo = array();
$invoices = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $invoices[] = array("invoiceno" => $row["invoiceno"]);
    }
}

// Close the database connection
$conn->close();

// Return the invoice numbers in JSON format
header('Content-Type: application/json');
echo json_encode($invoices);

?>
