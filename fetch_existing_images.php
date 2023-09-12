<?php
include('database.php'); // Include your database connection file

if (isset($_POST['keycode']) && !empty($_POST['keycode'])) {
    $keycode = $_POST['keycode'];

    // Assuming you have a table named 'tbluploads' to store additional images
    // Fetch existing images related to the provided keycode
    $query = "SELECT images FROM tbluploads WHERE keycode = '$keycode'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $existingImages = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $existingImages[] = $row['images'];
        }

        // Return the existing images as JSON response
        echo json_encode($existingImages);
    } else {
        echo json_encode([]); // Return an empty JSON array if there are no existing images
    }
} else {
    echo json_encode([]); // Return an empty JSON array if the 'keycode' is not provided
}

    
?>
