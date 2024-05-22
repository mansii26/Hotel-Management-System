<?php

include('include/connection.php');

// Check if API key is provided
if (isset($_GET['api_key'])) {
    $api_key = $_GET['api_key'];

    // Validate the API key
    $sql_validate_key = "SELECT * FROM api_keys WHERE api_key = ?";
    $stmt_validate_key = $dbh->prepare($sql_validate_key);
    $stmt_validate_key->bindParam(1, $api_key, PDO::PARAM_STR);
    $stmt_validate_key->execute();

    if ($stmt_validate_key->rowCount() > 0) {
        // API key is valid, proceed to fetch doctor data

        // Fetch specific doctor's information based on the provided API key
        $sql_fetch_doctor = "SELECT * FROM doctors WHERE Doctor_id = (
            SELECT Doctor_id FROM api_keys WHERE api_key = ?
        )";
        $stmt_fetch_doctor = $dbh->prepare($sql_fetch_doctor);
        $stmt_fetch_doctor->bindParam(1, $api_key, PDO::PARAM_STR);
        $stmt_fetch_doctor->execute();

        if ($stmt_fetch_doctor->rowCount() > 0) {
            // Doctor found, fetch details
            $doctor_details = $stmt_fetch_doctor->fetch(PDO::FETCH_ASSOC);

            // Output JSON response
            header("Content-Type: application/json");
            echo json_encode($doctor_details, JSON_PRETTY_PRINT);
        } else {
            echo json_encode(array('error' => 'Doctor not found'), JSON_PRETTY_PRINT);
        }
    } else {
        echo json_encode(array('error' => 'Invalid API key'), JSON_PRETTY_PRINT);
    }
} else {
    echo json_encode(array('error' => 'API key is missing'), JSON_PRETTY_PRINT);
}

?>
