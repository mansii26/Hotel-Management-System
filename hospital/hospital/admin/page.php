<?php

// API endpoint URL
$api_url = 'localhost/hospital/admin/page.php';

// Replace 'YOUR_API_KEY' with the actual API key
$api_key = 'api_key';

// Set up cURL session
$ch = curl_init();

// Set the URL
curl_setopt($ch, CURLOPT_URL, $api_url);

// Set the HTTP method to GET
curl_setopt($ch, CURLOPT_HTTPGET, true);

// Set the API key as a query parameter
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(['api_key' => $api_key]));

// Return the response as a string instead of outputting it directly
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the request
$response = curl_exec($ch);

// Close cURL session
curl_close($ch);

// Handle the response
if ($response === false) {
    // Request failed
    echo 'Error: ' . curl_error($ch);
} else {
    // Request successful, parse and display the response
    $data = json_decode($response, true);
    print_r($data);
}

?>