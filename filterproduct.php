<?php

// include('database.php');


// if (isset($_POST['filterCriteria'])) {
//     $filterCriteria = json_decode($_POST['filterCriteria'], true);
 

// $whereClause = "";
// $prevConjunction = "";


// foreach ($filterCriteria as $criteria) {
//     $category = $criteria['category'];
//     $criteriaValue = $criteria['criteria'];
//     $values = $criteria['values'];
//     $conjunction = $criteria['conjunction'];

    
//     if (!empty($whereClause)) {
//         if ($conjunction == "AND") {
//             $whereClause .= " AND ";
//         } elseif ($conjunction == "OR") {
//             $whereClause .= " OR ";
//         } elseif ($conjunction == "ONLY") {
//             $whereClause .= " AND ";
//         }
//     }

    
//     $category = "`" . $category . "`";
//     if ($criteriaValue === "=") {
//         $whereClause .= "$category = '$values'";
//     } elseif ($criteriaValue === "!=") {
//         $whereClause .= "$category != '$values'";
//     } elseif ($criteriaValue === "Starts with") {
//         $whereClause .= "$category LIKE '$values%'";
//     } elseif ($criteriaValue === "Greater Than") {
//         $whereClause .= "$category > '$values'";
//     } elseif ($criteriaValue === "Less Than") {
//         $whereClause .= "$category < '$values'";
//     }
// }


// $sql = "SELECT * FROM `tblproducts` ";


// if (!empty($whereClause)) {
//     $sql .= "WHERE $whereClause";
// }

//     echo "SQL Query: " . $sql;

   
//     $result = mysqli_query($conn, $sql);

//     if ($result) {
//         $filteredData = [];

   
//         while ($row = mysqli_fetch_assoc($result)) {
//             $filteredData[] = $row;
//         }

    
//         echo json_encode($filteredData);
//     } else {
       
//         echo "Error executing query: " . mysqli_error($conn);
//     }
// } else {
   
//     echo "Invalid POST data.";
// }

include('database.php');
if (isset($_POST['filterCriteria'])) {
    $filterCriteria = json_decode($_POST['filterCriteria'], true);

    $whereClause = ""; // Initialize the WHERE clause
    $prevConjunction = "";

    foreach ($filterCriteria as $criteria) {
        $category = $criteria['category'];
        $criteriaValue = $criteria['criteria'];
        $values = $criteria['values'];
        $conjunction = $criteria['conjunction'];

        if (!empty($whereClause)) {
            // Add appropriate AND or OR based on the previous conjunction
            if ($prevConjunction == "AND") {
                $whereClause .= " AND ";
            } elseif ($prevConjunction == "OR") {
                $whereClause .= " OR ";
            }
        }

        $category = "`" . $category . "`";
        if ($criteriaValue === "=") {
            $whereClause .= "$category = '$values'";
        } elseif ($criteriaValue === "!=") {
            $whereClause .= "$category != '$values'";
        } elseif ($criteriaValue === "Starts with") {
            $whereClause .= "$category LIKE '$values%'";
        } elseif ($criteriaValue === "Greater Than") {
            $whereClause .= "$category > '$values'";
        } elseif ($criteriaValue === "Less Than") {
            $whereClause .= "$category < '$values'";
        }

        // Update the previous conjunction
        $prevConjunction = $conjunction;
    }

    $sql = "SELECT * FROM `tblproducts`";

    if (!empty($whereClause)) {
        $sql .= " WHERE ($whereClause)";
    }
   

    // Echo the SQL query for debugging
    //echo "SQL Query: " . $sql;
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $filteredData = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $filteredData[] = $row;
        }

        echo json_encode($filteredData);
    } else {
        echo "Error executing query: " . mysqli_error($conn);
    }
} else {
    echo "Invalid POST data.";
}


?>


