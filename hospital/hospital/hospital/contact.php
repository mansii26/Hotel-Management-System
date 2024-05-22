<?php
 include('admin/include/connection.php');

// // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact (first_name, last_name, phone, message) 
              VALUES ('$first_name', '$last_name', '$phone', '$message')";
              
              if ($conn->query($sql) === TRUE) {
                // Close connection
                $conn->close();
                // Redirect to another page
                header("Location: index.php");
                $success = "Employee Assigned Department";
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        
        // Close connection
        $conn->close();
        ?>
        