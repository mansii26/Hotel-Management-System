
<!DOCTYPE html>
<html lang="en">
<?php 
include('include/connection.php');
session_start();
if(!isset($_SESSION["Doctor_id"]))
{
    echo"<script>window.open('index.php?mes=Access Denied..','_self');</script>";
    
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - doctors</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
   
</head>

<body>
<?php include('include/header.php')?>
<script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>

<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Appointments</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add-appointment.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Appointment</a>
                    </div>
                <div class="row" style="width:100%;">
                    <div class="col-md-12">
                        <div class="table-responsive">
                        <table class="table table-striped custom-table">
    <thead>
        <tr>
            <th>Appointment ID</th>
            <th>Patient Name</th>
            <th>Appointment Date</th>
            <th>Appointment Time</th>
            <th>Doctor Name</th>
            <th>Appointment Type</th>
            <th>Status</th>
            <th class="text-right">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include('include/connection.php'); // Assuming this file contains database connection settings

        // Establish connection
        $conn = mysqli_connect($servername,$username, $password,$dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $d_id=$_SESSION["Doctor_id"];
        // Fetch appointments
        $sql = "SELECT appointments.*, doctors.DFirstName 
                FROM appointments 
                INNER JOIN doctors ON appointments.Doctor_Id = doctors.Doctor_id where doctors.Doctor_Id='$d_id'";
        $result = mysqli_query($conn, $sql);

        // Check if there are any appointments
        if (mysqli_num_rows($result) > 0) {
            // Output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $row['Appointment_Id']; ?></td>
                    <td><?php echo $row['PatientFirstName']; ?></td>
                    <td><?php echo $row['AppointmentDate']; ?></td>
                    <td><?php echo $row['AppointmentTime']; ?></td>
                    <td><?php echo $row['DFirstName']; ?></td>
                    <td><?php echo $row['AppointmentType']; ?></td>
                    <td><span class="custom-badge status-red">Inactive</span></td>
                    <td class="text-right">
                        <div class="dropdown dropdown-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="edit-appointment.php?Appointment_Id=<?php echo $row['Appointment_Id']; ?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="appointments.php?id=<?php echo $row['Appointment_Id']; ?>"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php
            }
        } else {
            echo "<tr><td colspan='8'>No appointments found</td></tr>";
        }

        // Close connection
        mysqli_close($conn);
        ?>
    </tbody>
</table>

                        </div>
                    </div>
                </div>
            </div>

            <?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "healthcare"); 
// Assuming you have a database connection established

// Your database connection and other code
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        // Perform the delete operation
        $sql = "DELETE FROM appointments WHERE Appointment_Id = $id";

        mysqli_query($conn, $sql);
    }

?>


            <!-- Tab content -->
<div id="London" class="tabcontent">
    <?php
    // Database credentials

    // Check if user submitted the form
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['datepicker'])) {
        // Get selected date from the datepicker
        $selectedDate = $_POST['datepicker'];
    
        // Parse selected date
        $parsedDate = date_parse_from_format('Y-m-d', $selectedDate);
    
        // Get year, month, and day from the parsed date
        $year = $parsedDate['year'];
        $month = $parsedDate['month'];
        $day = $parsedDate['day'];
    
        // Establish database connection
        $conn = mysqli_connect("localhost", "root", "", "healthcare");
    
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    
        // Prepare SQL query
        $sql = "SELECT *
                FROM appointments
                WHERE ";
    
        // Check if only year is selected
        if ($year && !$month && !$day) {
            $sql .= "YEAR(AppointmentDate) = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $year);
        }
        // Check if only month is selected
        elseif ($year && $month && !$day) {
            $sql .= "YEAR(AppointmentDate) = ? AND MONTH(AppointmentDate) = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $year, $month);
        }
        // Check if only day is selected
        elseif ($year && $month && $day) {
            $sql .= "YEAR(AppointmentDate) = ? AND MONTH(AppointmentDate) = ? AND DAY(AppointmentDate) = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iii", $year, $month, $day);
        } else {
            die("Invalid date selection");
        }
    
        // Execute query
        $stmt->execute();
    
        // Get result
        $result = $stmt->get_result();
    
        // Check if query executed successfully
        if (!$result) {
            die("Query failed: " . $conn->error);
        }
    
        // Fetch data
        $data = $result->fetch_all(MYSQLI_ASSOC);
    
        // Close statement
        $stmt->close();
    
        // Close connection
        $conn->close();
    }
    
    
    ?>
    <br>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" id="datepicker" name="datepicker" placeholder="Select Date wise" class="datepicker" autocomplete="off" style="border:1px solid gray;margin:20px;" required>
        <input type="submit" class="btn btn btn-primary btn-rounded" value="Submit"><br>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['datepicker'])): ?>
        <h5  style="text-decoration:bold;">Results for <?php echo $selectedDate; ?></h5>
        <?php if (!empty($data)): ?>
            <table class="table table-striped">
                <thead>
                <tr>
                <th>Appointment ID</th>
                <th>Patient Name</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Doctor ID</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data as $row): ?>
                    <tr>
                        <td><?php echo $row['Appointment_Id']?></td>
                        <td><?php echo $row['PatientFirstName'] ?></td>
                        <td><?php echo $row['AppointmentDate'] ?></td>
                        <td><?php echo $row['AppointmentTime'] ?></td>
                        <td><?php echo $row['Doctor_Id'] ?></td>
                        <!-- Add more columns as needed -->
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No data found for the selected year and month.</p>
        <?php endif; ?>
    <?php endif; ?>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
    <!-- Bootstrap Datepicker CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <!-- Bootstrap Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        // Initialize Bootstrap Datepicker
        $(document).ready(function() {
            $('.datepicker').datepicker({
                format: 'yyyy-mm',
                startView: 'months',
                minViewMode: 'months',
                autoclose: true
            });
        });

       
    </script>

 
</div>

    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/app.js"></script>
	<script>
            $(function () {
                $('#datetimepicker3').datetimepicker({
                    format: 'LT'
                });
				$('#datetimepicker4').datetimepicker({
                    format: 'LT'
                });
            });
     </script>
</body>


<!-- appointments23:20-->
</html>
<!-- create table speciality(speciality_id primary key auto_increment, speciality_name text) -->
<!-- create table doctor(doctor_id int primary key auto_increment, doctor_name varchar(200), doctor_mobile int(13),doctor_email varchar(200),speciality text,doctor_service_id foreign) -->
<!-- create table appointment(appointment_id int primary key auto_increment,speciality_id int, doctor_id int, branch text,patient_name text, patient_mobile_no int(13),patient_email text, appointment_date varchar(200), appointment_time varchar(200), appointment_status varchar(100)); -->