<?php


include('database.php');

if (
    isset($_POST['productname']) && !empty($_POST['productname']) &&
    isset($_POST['units']) && !empty($_POST['units']) &&
    isset($_POST['sp']) && !empty($_POST['sp']) &&
    isset($_POST['keycode']) && !empty($_POST['keycode'])
) {
    // Get the POST data
    $productname = $_POST['productname'];
    $units = $_POST['units'];
    $sp = $_POST['sp'];
    $keycode = $_POST['keycode'];

    // Retrieve existing images for the product
    $existingImagesQuery = "SELECT images FROM tbluploads WHERE keycode='$keycode'";
    $existingImagesResult = mysqli_query($conn, $existingImagesQuery);
    $existingImages = [];

    while ($row = mysqli_fetch_assoc($existingImagesResult)) {
        $existingImages[] = $row['images'];
    }

    // Handle main display image
    if (!empty($_FILES['mainImage']['name'])) {
        $mainImageName = $_FILES['mainImage']['name'];
        $mainTempName = $_FILES['mainImage']['tmp_name'];
        $mainTargetPath = 'C:/xampp/htdocs/test/uploads/' . $mainImageName;

        // Move the new main display image to the desired location
        if (move_uploaded_file($mainTempName, $mainTargetPath)) {
            // Update the 'image' field in tblimage with the new main display image name
            $updateMainImageQuery = "UPDATE tblimage SET image='$mainImageName' WHERE keycode='$keycode'";
            if (mysqli_query($conn, $updateMainImageQuery)) {
                // Success
            } else {
                echo "Error updating main image: " . mysqli_error($conn);
            }
        } else {
            echo "Error uploading new main image.";
        }
    }

   
    // Handle additional images
if (!empty($_POST['imagesToDelete'])) {
    // Delete images marked for deletion
    foreach ($_POST['imagesToDelete'] as $imageToDelete) {
        $deleteQuery = "DELETE FROM tbluploads WHERE keycode='$keycode' AND images='$imageToDelete'";
        if (mysqli_query($conn, $deleteQuery)) {
            // Image deleted
        } else {
            echo "Error deleting image: " . mysqli_error($conn);
        }
    }
}


// Fetch and display additional images for editing, excluding the deleted ones
$fetchAdditionalImagesQuery = "SELECT images FROM tbluploads WHERE keycode='$keycode'";
$fetchAdditionalImagesResult = mysqli_query($conn, $fetchAdditionalImagesQuery);
$additionalImages = [];

while ($row = mysqli_fetch_assoc($fetchAdditionalImagesResult)) {
    $additionalImages[] = $row['images'];
}

// Return the additional images as JSON response to your JavaScript
echo json_encode($additionalImages);


    if (!empty($_FILES['additionalImages']['name'][0])) {
        // Insert new additional images
        foreach ($_FILES['additionalImages']['name'] as $key => $image) {
            $tempName = $_FILES['additionalImages']['tmp_name'][$key];
            $targetPath = 'C:/xampp/htdocs/test/uploads/' . $image;

            if (move_uploaded_file($tempName, $targetPath)) {
                // Insert the new additional image into tbluploads
                $insertAdditionalImageQuery = "INSERT INTO tbluploads (keycode, images) VALUES ('$keycode', '$image')";
                if (!mysqli_query($conn, $insertAdditionalImageQuery)) {
                    echo "Error inserting additional image: " . mysqli_error($conn);
                    exit;
                }
            } else {
                echo "Error uploading additional image: " . $image;
            }
        }
    }

    // Update product information in tblimage (excluding the image field)
    $query = "UPDATE tblimage SET productname='$productname', unit='$units', sellingprice='$sp' WHERE keycode='$keycode'";

    if (mysqli_query($conn, $query)) {
        echo "1"; // Success
    } else {
        echo "Error updating product information: " . mysqli_error($conn);
    }
} else {
    echo "Incomplete or missing form data.";
}

?>




