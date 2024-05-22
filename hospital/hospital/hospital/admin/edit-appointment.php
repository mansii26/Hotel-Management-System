<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>
    <div class="main-wrapper">
        <?php include('include/header.php')?>
         <div class="page-wrapper" style="background-color:#F5F5F5">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Edit Appointment</h4>
            </div>
        </div>
        <div class="row">
    <div class="col-lg-8 offset-lg-2">
        <form id="edit-appointment-form" method="post" action="update-appointment.php">
            <!-- PHP code to fetch appointment details -->
            <?php
            include('include/connection.php'); // Assuming this file contains database connection settings
            // Establish connection
            $conn = mysqli_connect($servername,$username, $password,$dbname);
            // Check if the appointment ID is set in the URL
            if (isset($_GET['Appointment_Id'])) {
                $appointment_id = $_GET['Appointment_Id'];
                // Prepare and execute statement to fetch appointment details
                $stmt = $conn->prepare("SELECT * FROM appointments WHERE Appointment_Id = ?");
                $stmt->bind_param('i', $appointment_id);
                $stmt->execute();
                $result = $stmt->get_result();
                // Check if appointment exists
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
            ?>

            <!-- Appointment ID -->
            <input type="hidden" name="Appointment_Id" value="<?php echo $appointment_id; ?>">

            <!-- Other form fields -->
            <!-- Example: First Name -->
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" name="Patient_FirstName" value="<?php echo $row['PatientFirstName']; ?>">
            </div>

            <!-- Example: Last Name -->
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" name="Patient_LastName" value="<?php echo $row['PatientLastName']; ?>">
            </div>

            <!-- Example: Branch (populate dynamically) -->
            <div class="form-group">
                <label for="branch">Branch</label>
                <select class="form-control" name="branch" id="branch">
                    <option value="#">Select Branch</option>
                    <!-- Populate options dynamically based on your data -->
                </select>
            </div>

            <!-- Example: Doctor (populate dynamically) -->
            <div class="form-group">
                <label for="doctors">Doctor</label>
                <select class="form-control" name="doctors" id="doctors">
                    <option value="#">Select Doctor</option>
                    <!-- Populate options dynamically based on your data -->
                </select>
            </div>

            <!-- Example: Appointment Date -->
            <div class="form-group">
                <label for="appointment-date">Appointment Date</label>
                <input type="date" class="form-control" id="appointment-date" name="Appointment_Date" value="<?php echo $row['AppointmentDate']; ?>">
            </div>

            <!-- Example: Appointment Time -->
            <div class="form-group">
                <label for="appointment-time">Appointment Time</label>
                <input type="text" class="form-control" id="appointment-time" name="Appointment_Time" value="<?php echo $row['AppointmentTime']; ?>">
            </div>

            <!-- Example: Appointment Type -->
            <div class="form-group">
                <label for="appointment-type">Appointment Type</label>
                <select class="form-control" name="Appointment_Type">
                    <option>Select</option>
                    <option value="Check_up">Check-up</option>
                    <option value="Follow_up">Follow-up</option>
                </select>
            </div>

            <!-- Example: Appointment Reason -->
            <div class="form-group">
                <label for="appointment-reason">Message</label>
                <textarea class="form-control" id="appointment-reason" name="Appointment_Reason" rows="4"><?php echo $row['AppointmentReason']; ?></textarea>
            </div>
            <?php
                        } else {
                            echo "Appointment not found.";
                        }
                        // Close prepared statement
                        $stmt->close();
                    } else {
                        echo "Appointment ID not provided.";
                    }
                    // Close the database connection
                    $conn->close();
                    ?>
            <!-- SAVE button -->
            <div class="m-t-20 text-center">
                <button type="submit" class="btn btn-primary btn-rounded" style="margin:10px">SAVE</button>
                <a href="appointments.php" class="btn btn-primary btn-rounded">Cancel</a>
            </div>
        </form>
    </div>
</div>

    </div>
</div>
<script>
$(document).ready(function(){
    var getmakes = true;
    
    // Request to populate Clinic dropdown initially
    $.post("try.php", { getmakes }, function(data){
        $("#branch").html(data);
    }).fail(function(xhr, status, error) {
        console.error("Error fetching makes:", error);
    });
    
   // Event handler for Branch dropdown change
    $("#branch").on('change', function(){
        var make1 = $(this).val();
        
        // Request to populate Branch dropdown based on selected make
        $.post("try.php", { make1 }, function(data){
            $("#doctors").html(data);
        }).fail(function(xhr, status, error) {
            console.error("Error fetching branch:", error);
        });
    });

    // Intercept form submission
    $('#edit-appointment-form').submit(function(e) {
            e.preventDefault(); // Prevent default form submission
            var formData = new FormData(this); // Create FormData object

            // Ajax request to handle form submission
            $.ajax({
                url: $(this).attr('action'), // Get form action URL
                type: $(this).attr('method'), // Get form method
                data: formData, // Form data
                processData: false, // Prevent jQuery from automatically transforming the data into a query string
                contentType: false, // Prevent jQuery from automatically setting the Content-Type header
                success: function(response) {
                    // SweetAlert2 success message
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        html: 'Appointment Edited successfully',
                    });
                    // Reset form
                    $('#edit-appointment-form')[0].reset();
                }
            });
        });
});

</script>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>

</body>

</html>