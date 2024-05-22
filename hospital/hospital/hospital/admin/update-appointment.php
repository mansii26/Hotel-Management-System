<?php
// Include your database connection file or establish a connection here
 // Database connection parameters
 include('include/connection.php'); // Assuming this file contains database connection settings
 // Establish connection
 $conn = mysqli_connect($servername,$username, $password,$dbname);

 // Check connection
 if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
 }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the Appointment ID is provided
    if(isset($_POST['Appointment_Id'])) {
        $appointment_id = $_POST['Appointment_Id'];
        
        // Retrieve other form data
        $PatientFirstName = $_POST['Patient_FirstName'];
        $AppointmentDate = $_POST['Appointment_Date'];
        $AppointmentTime = $_POST['Appointment_Time'];
        $AppointmentType = $_POST['Appointment_Type'];
        $AppointmentReason = $_POST['Appointment_Reason'];
        $branch = $_POST['branch'];
        $doctors = $_POST['doctors'];

        
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
$stmt = $conn->prepare("SELECT Doctor_id FROM doctors WHERE Branch_Id= ?");
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

        // Prepare SQL statement to update appointment
        $sql = "UPDATE appointments 
        SET Branch_Id=?, Doctor_Id=?, PatientFirstName=?, 
            AppointmentDate=?, AppointmentTime=?, 
            AppointmentType=?, AppointmentReason=? 
        WHERE Appointment_Id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('iisssssi', $branch_id, $doctor_id, $PatientFirstName, $AppointmentDate, $AppointmentTime, $AppointmentType, $AppointmentReason, $appointment_id);

        // Execute the update statement
        if ($stmt->execute()) {
            header("Location:appointments.php");
            echo "<script>alert('New appointment record created successfully');</script>";
        } else {
            echo "Error updating appointment: " . $conn->error;
        }
        
        // Close statement
        $stmt->close();
    } else {
        echo "Appointment ID not provided.";
    }
} else {
    echo "Invalid request method.";
}

// Close database connection
$conn->close();
?>
