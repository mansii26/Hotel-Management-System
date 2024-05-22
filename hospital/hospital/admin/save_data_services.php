<?php
// Database connection
include('include/connection.php');

// // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Branch_Id = $_POST['branch_id']; 
    $service_name = $_POST['service_name'];
    $service_description = $_POST['service_description'];
    $service_img = $_FILES["service_img"]["name"];
        move_uploaded_file($_FILES["service_img"]["tmp_name"], "assets/img/".$_FILES["service_img"]["name"]);
  

        $sql = "INSERT INTO services (branch_id, Service_Name, Service_Description, Service_img) 
              VALUES ('$Branch_Id', '$service_name', '$service_description', '$service_img')";
           
           if ($conn->query($sql) === TRUE) {
            // Close connection
            $conn->close();
            // Redirect to another page
            header("Location: services.php");
            $success = "Employee Assigned Department";
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
    // Close connection
    $conn->close();
    ?>
