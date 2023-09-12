<?php

include('database.php'); 

$action = isset($_POST['action']) ? $_POST['action']: '';
switch ($action){
    case 'fetchdata':
        include 'fetchdata.php';
        //echo "fetched";
        break;
    case 'addhead':
        include 'addhead.php';
        break;
    // case 'fetchSavedInvoices':
    //     include 'fetchSavedInvoices.php';
    //     break;
    // case 'modifyhead':
    //     include 'modifyhead.php';
    //     break;
}



?>
