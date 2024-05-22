<?php
// Include database connection file
include('include/connection.php');

// Array to hold branch data
$branches = array();

// Check if connection was successful
if ($conn) {
    // Query to fetch branches
    $query = "SELECT * FROM branches";
    $result = mysqli_query($conn, $query);

    // Check if query execution was successful
    if ($result) {
        // Loop through each row in the result set
        while ($row = mysqli_fetch_assoc($result)) {
            // Add branch data to the array
            $branches[] = $row;
        }

        // Free result set
        mysqli_free_result($result);
    } else {
        // Handle query execution error
        $response = array('status' => 'error', 'message' => 'Failed to fetch branches');
        echo json_encode($response);
        exit();
    }

    // Close database connection
    mysqli_close($conn);

    // Return branch data in JSON format
    echo json_encode($branches);
} else {
    // Handle database connection error
    $response = array('status' => 'error', 'message' => 'Database connection failed');
    echo json_encode($response);
}
?>
