<?php

$con = mysqli_connect("localhost", "root", "", "healthcare");

$response = array();

if ($con) {
    $api_key = generateApiKey(); // Generate API key
    
    // Insert API key into the database for the user
    $sql = "INSERT INTO api_keys (api_key) VALUES ('$api_key')";
    mysqli_query($con, $sql);
    
    $sql = "SELECT * FROM doctors";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header("Content-Type: application/json");

        $i = 0;

        while ($row = mysqli_fetch_assoc($result)) {
            $response[$i]['Doctor_id'] = $row['Doctor_id'];
            $response[$i]['DFirstName'] = $row['DFirstName'];
            $response[$i]['DOB'] = $row['DOB'];
            $response[$i]['Email'] = $row['Email'];

            $i++;
        }
        
        // Add the generated API key to the response array
        $response['api_key'] = $api_key;

        // Output JSON response
        echo json_encode($response, JSON_PRETTY_PRINT);
        
        // Retrieve and display the most recent API key
        $sql_api_key = "SELECT api_key FROM api_keys ORDER BY id DESC LIMIT 1";
        $result_api_key = mysqli_query($con, $sql_api_key);

        if ($result_api_key) {
            $row_api_key = mysqli_fetch_assoc($result_api_key);
            $recent_api_key = $row_api_key['api_key'];
            echo "API Key: " . $recent_api_key;
        } else {
            echo "Failed to fetch API key";
        }
    }
} else {
    // Handle connection error
    echo "Failed to connect to the database";
}

// Function to generate a unique API key
function generateApiKey() {
    return bin2hex(random_bytes(32));
}
?>
