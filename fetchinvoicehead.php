<?php
include('database.php');


    $selectedInvoiceNumber = $_GET['invoiceno'];

    // Assuming your database connection variable is $conn
    // Fetch invoice head data based on the selected invoice number
    $query = "SELECT * FROM invoicehead WHERE invoiceno =  $selectedInvoiceNumber";
   
    $result = $conn->query($query);
    


    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $invoiceHead = array(
            "invoiceno" => $row["invoiceno"],
            "invoicedate" => $row["invoicedate"],
            "custname" => $row["custname"],
            "mobileno" => $row["mobileno"],
            "remarks" => $row["remarks"],
            "nettotal" => $row["nettotal"]
        );
        $invoiceDate = date("Y-m-d", strtotime($invoiceHead["invoicedate"])); // Format the date to "yyyy-MM-dd"
        $invoiceHead["invoicedate"] = $invoiceDate;
        // Return the invoice head data as JSON
        echo json_encode($invoiceHead);
    } else {
        // Handle no data found case
        echo json_encode(array());
    }

  




?>


