<?php
include('database.php');

if (isset($_POST['keycode'])) {
    $keycode = $_POST['keycode'];
    
    // Perform a database query to fetch additional images associated with the keycode
    $query = "SELECT images FROM tbluploads WHERE keycode = '$keycode'";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        $additionalImages = array();
        
        while ($row = mysqli_fetch_assoc($result)) {
            $additionalImages[] = $row;
        }
        
        echo json_encode($additionalImages); // Return the additional images as JSON
    } else {
        echo json_encode(array()); // Return an empty array if no additional images found
    }
} else {
    echo json_encode(array()); // Return an empty array if keycode is not provided
}
?>
