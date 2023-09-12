    <?php

include('database.php');
// Check if the form fields exist in the $_POST array and are not empty
//$formData = $_POST['formData'];
if (
    isset($_POST['pdcode']) && !empty($_POST['pdcode']) &&
    isset($_POST['pdname']) && !empty($_POST['pdname']) &&
    isset($_POST['units']) && !empty($_POST['units']) &&
    isset($_POST['sp']) && !empty($_POST['sp']) &&
    isset($_POST['op']) && !empty($_POST['op']) &&
    isset($_POST['pd']) && !empty($_POST['pd'])
) {
    // Get the next available keycode
    $maxKeycodeQuery = "SELECT MAX(keycode) AS max_keycode FROM tblimage";
    $maxKeycodeResult = mysqli_query($conn, $maxKeycodeQuery);

    if ($maxKeycodeResult) {
        $row = mysqli_fetch_assoc($maxKeycodeResult);
        $nextKeycode = ($row['max_keycode'] === null) ? 1 : $row['max_keycode'] + 1;
    } else {
        $nextKeycode = 1;
    }

    // Initialize an empty array to store uploaded image filenames
    $uploadedImageFilenames = [];

    // Check if any files were uploaded
    if (!empty($_FILES['myFiles']['name'][0])) {
        $totalFiles = count($_FILES['myFiles']['name']);

        for ($i = 0; $i < $totalFiles; $i++) {
            $name = $_FILES['myFiles']['name'][$i];
            $tempName = $_FILES['myFiles']['tmp_name'][$i];
            $targetPath = 'C:/xampp/htdocs/test/uploads/' . $name;

            if (move_uploaded_file($tempName, $targetPath)) {
                $uploadedImageFilenames[] = $name;
            }
        }
    }

    // Get other form data
    $pc = $_POST['pdcode'];
    $pn = $_POST['pdname'];
    $units = $_POST['units'];
    $sp = $_POST['sp'];
    $op = $_POST['op'];
    $pd = $_POST['pd'];
    echo $pc;

    // Insert data into the tbluploads table with the same keycode for each image
    foreach ($uploadedImageFilenames as $filename) {
        $query = "INSERT INTO tbluploads (`keycode`, `images`) VALUES ('$nextKeycode', '$filename')";

        if ($conn->query($query) !== TRUE) {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    }

    // Insert data into the tblimage table with the same keycode
    if (!empty($uploadedImageFilenames)) {
        $imageFilename = $uploadedImageFilenames[0]; // Assuming the first image is the main one
        $query = "INSERT INTO tblimage (`keycode`, `productcode`, `productname`, `unit`, `sellingprice`, `offerprice`, `pdesc`, `image`) VALUES ('$nextKeycode', '$pc', '$pn', '$units', '$sp', '$op', '$pd', '$imageFilename')";

        if ($conn->query($query) === TRUE) {
            echo "1";
        } else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }
    } else {
        echo "Image upload failed";
    }
} else {
    echo "Form data is incomplete or missing.";
}


// // working code for tblimage
// // Insert data into the tblimage table with the same keycode
// if (!empty($uploadedImageFilenames)) {
//     $imageFilename = $uploadedImageFilenames[0]; 
//     $query = "INSERT INTO tblimage (`keycode`, `productcode`, `productname`, `unit`, `sellingprice`, `offerprice`, `pdesc`, `image`) VALUES ('$nextKeycode', '$pc', '$pn', '$units', '$sp', '$op', '$pd', '$imageFilename')";

//     if ($conn->query($query) === TRUE) {
//         echo "Data inserted successfully";
//     } else {
//         echo "Error: " . $query . "<br>" . $conn->error;
//     }
// } else {
//     echo "Image upload failed";
// }

// $conn->close();

// $imageFilename = "";
// if (!empty($_FILES['dp']['name'])) {
//     $name = $_FILES['dp']['name'];
//     $tempName = $_FILES['dp']['tmp_name'];
//     $targetPath = 'C:/xampp/htdocs/test/uploads/' . $name;

//     move_uploaded_file($tempName, $targetPath);
//     $imageFilename = $name; 
   
// }

// // Get other form data
// $pc = $_POST['pdcode'];
// $pn = $_POST['pdname'];
// $units = $_POST['units'];
// $sp = $_POST['sp'];
// $op = $_POST['op'];
// $pd = $_POST['pd'];

// // Insert data into the database
// if (!empty($imageFilename)) {
//     $query = "INSERT INTO tblimage (`keycode`, `productcode`, `productname`, `unit`,`sellingprice`,`offerprice`,`pdesc`, `image`) VALUES (' ','$pc','$pn','$units','$sp','$op','$pd','$imageFilename')";

//     if ($conn->query($query) === TRUE) {
//         echo "Data inserted successfully";
//     } else {
//         echo "Error: " . $query . "<br>" . $conn->error;
//     }
// } else {
//     //echo "Error: " . $query . "<br>" . $conn->error;
//     echo "Image upload failed";
// }

// $conn->close();


 ?>











