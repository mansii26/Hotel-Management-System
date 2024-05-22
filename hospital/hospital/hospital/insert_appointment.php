<?php

include('include/connection.php'); // Assuming this file contains database connection settings
// Establish connection
$conn = mysqli_connect($servername,$username, $password,$dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$firstName = $_POST['fname'];
$lastName = $_POST['lname'];
$branch = $_POST['branch'];
$time = $_POST['time'];
$bookedDate = $_POST['Bdate'];
$type = $_POST['type'];
$message = $_POST['message'];

// Fetch Branch ID
$b_fetch = "SELECT Branch_Id FROM `branches` WHERE Branch_Name='$branch'";
$b_result = mysqli_query($conn, $b_fetch);

if ($b_result && mysqli_num_rows($b_result) > 0) {
    $row = mysqli_fetch_assoc($b_result);
    $branch_id = $row['Branch_Id'];
} else {
    echo "Error: Branch ID not found";
    exit;
}

// Fetch Doctor ID based on Branch ID
$stmt = $conn->prepare("SELECT Doctor_id FROM doctors WHERE Branch_id = ?");
$stmt->bind_param("i", $branch_id);
$stmt->execute();
$d_result = $stmt->get_result();

if ($d_result && mysqli_num_rows($d_result) > 0) {
    $row = mysqli_fetch_assoc($d_result);
    $doctor_id = $row['Doctor_id'];
} else {
    echo "Error: Doctor ID not found for the selected branch";
    exit;
}

$stmt->close();

// Prepare and bind the SQL statement for inserting appointment
$stmt = $conn->prepare("INSERT INTO appointments (Branch_Id, Doctor_Id, PatientFirstName, PatientLastName, AppointmentDate, AppointmentTime, AppointmentType, AppointmentReason) VALUES (?, ?, ?, ?, ?, ?, ?,?)");
$stmt->bind_param("iissssss", $branch_id, $doctor_id, $firstName, $lastName,$bookedDate, $time, $type, $message);

// Execute the statement
if ($stmt->execute()) {
    header("Location:index.php");
    echo "<script>alert('New appointment record created successfully');</script>";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and database connection
$stmt->close();
$conn->close();

?>
