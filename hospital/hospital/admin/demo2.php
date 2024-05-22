<?php

$con = mysqli_connect("localhost", "root", "", "healthcare");

// Check if API key is provided
if (isset($_GET['api_key'])) {
    $api_key = $_GET['api_key'];

    // Validate the API key
    $sql_validate_key = "SELECT * FROM doctors WHERE  Doctor_id= '$api_key'";
    $result_validate_key = mysqli_query($con, $sql_validate_key);

    if (mysqli_num_rows($result_validate_key) > 0) {
        // API key is valid, proceed to fetch doctor data

        // Fetch specific doctor's information based on the provided API key
        $sql_fetch_doctor = "SELECT * FROM doctors where Doctor_id=$api_key";
    
        $result_fetch_doctor = mysqli_query($con, $sql_fetch_doctor);

        if ($result_fetch_doctor) {
            $response = array();
            while ($row = mysqli_fetch_assoc($result_fetch_doctor)) {
                $response['Doctor_id'] = $row['Doctor_id'];
                $response['DFirstName'] = $row['DFirstName'];
                $response['DOB'] = $row['DOB'];
                $response['Email'] = $row['Email'];
            }
            
            // Output JSON response
            header("Content-Type: application/json");
            echo json_encode($response, JSON_PRETTY_PRINT);
        } else {
            echo "Failed to fetch doctor data";
        }
    } else {
        echo "Invalid API key";
    }
} else {
    echo "API key is missing";
}

?>
