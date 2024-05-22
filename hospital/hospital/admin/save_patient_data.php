<?php 
include('include/connection.php');

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Clinic_Id = $_POST['Clinic_Id'];
    $Branch_Id = $_POST['Branch_Id']; 
    $DFirstName = $_POST['DFirstName']; 
// Corrected field name
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $MobileNo = $_POST['MobileNo'];
    $DOB = $_POST['DOB'];
    $Age = $_POST['Age'];
    $patient_Weight = $_POST['patient_Weight'];

    $query = "INSERT INTO patients (Clinic_Id, Branch_Id,DFirstName, FirstName, LastName, MobileNo, DOB, Age, patient_Weight)
              VALUES ('$Clinic_Id', '$Branch_Id','$DFirstName', '$FirstName','$LastName','$MobileNo','$DOB','$Age','$patient_Weight')";

    if ($conn->query($query) === TRUE) {
        // Close connection
        $conn->close();
        // Redirect to another page
        header("Location: patients.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
