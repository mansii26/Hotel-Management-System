<?php
 include('include/connection.php'); // Assuming this file contains database connection settings
 // Establish connection
 $conn = mysqli_connect($servername,$username, $password,$dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the AJAX request is for retrieving branches
if (isset($_POST['getmakes'])) {
    $getmakes = "SELECT * FROM branches";
    $result = mysqli_query($conn, $getmakes);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<option value=''>Select Branch</option>";
        while ($row = mysqli_fetch_assoc($result)) {
            $name = $row['Branch_Name'];
            echo "<option value='$name'>$name</option>";
        }
    } else {
        echo "<option value=''>No Branch Found</option>";
    }
}

// Check if the AJAX request is for retrieving doctors based on the selected branch
if (isset($_POST['make1'])) {
    $make1 = $_POST['make1'];
    
    // Prepare and execute SQL query to select doctor data based on the branch name
    $stmt = $conn->prepare("SELECT doctors.* FROM doctors INNER JOIN branches ON doctors.Branch_id = branches.Branch_id WHERE branches.Branch_Name = ?");
    $stmt->bind_param("s", $make1);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $output = "<option value=''>Select Doctor</option>";
        while ($row = $result->fetch_assoc()) {
            $output .= "<option value='" . $row['Doctor_id'] . "'>" . $row['DFirstName'] . "</option>";
        }
        echo $output;
    } else {
        echo "<option value=''>No Doctors Found</option>";
    }
    
    // Close prepared statement
    $stmt->close();
}

mysqli_close($conn);
?>
