<?php
include('include/connection.php');

// // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $DFirstName = $_POST['DFirstName'];
    $DLastName = $_POST['DLastName'];
   // $DoctorId = $_POST['DoctorId'];
    $Email = $_POST['Email'];
    $Specialization = $_POST['Specialization'];
    $Education = $_POST['Education'];
    $Branch_id = $_POST['Branch_id'];
    $Address =  $_POST['Address'];
    $City =  $_POST['City'];
    $State =  $_POST['State'];
    $Pincode =  $_POST['Pincode'];
    $Country =  $_POST['Country'];
    $Gender =  $_POST['Gender'];       
    $Mobile_No =  $_POST['Mobile_No'];
    $DOB =  $_POST['DOB'];
    $Experience =  $_POST['Experience'];
    $Password =  $_POST['Password'];
    $Doc_img=$_FILES["Doc_img"]["name"];
	  move_uploaded_file($_FILES["Doc_img"]["tmp_name"],"assets/img/".$_FILES["Doc_img"]["name"]);

    

    
      
   // Default value
   
    
    // Retrieve other form fields in the same manner

    // SQL query to insert data into the database
    $sql = "INSERT INTO doctors(DFirstName, DLastName, Branch_id, Email, Specialization, Education, Address, City, State, Pincode, Country, Gender,  Mobile_No, DOB, Experience, Doc_img,  Password) 
    VALUES ('$DFirstName', '$DLastName', '$Branch_id', '$Email', '$Specialization', '$Education', '$Address', '$City', '$State', '$Pincode', '$Country', '$Gender',  '$Mobile_No', '$DOB', '$Experience', '$Doc_img', '$Password')";
    
            
    if ($conn->query($sql) === TRUE) {
        // Close connection
        $conn->close();
        // Redirect to another page
        header("Location: doctors.php");
        $success = "Employee Assigned Department";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>

