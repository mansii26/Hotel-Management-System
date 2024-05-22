<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - edit-patient</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    <?php include('include/header.php');?>
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Edit Patient</h4>
                </div>
            </div>
            <?php
            // Database connection parameters
            include('include/connection.php');

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Check if form fields are set
                if (isset($_POST['FirstName'], $_POST['LastName'], $_POST['MobileNo'], $_POST['DOB'], $_POST['Age'], $_POST['Patient_Weight'], $_POST['Patient_Id'])) {
                    $FirstName = $_POST['FirstName'];
                    $LastName = $_POST['LastName'];
                    $MobileNo = $_POST['MobileNo'];
                    $DOB = $_POST['DOB'];
                    $Age = $_POST['Age'];
                    $Patient_Weight = $_POST['Patient_Weight'];
                    $Patient_Id = $_POST['Patient_Id'];

                    // SQL query to update the patient details
                    $query = "UPDATE patients SET FirstName=?, LastName=?, MobileNo=?, DOB=?, Age=?, Patient_Weight=? WHERE Patient_Id = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param('ssssisi', $FirstName, $LastName, $MobileNo, $DOB, $Age, $Patient_Weight, $Patient_Id);

                    if ($stmt->execute()) {
                        $success = "Patient Details Updated";
                        $conn->commit(); // Commit the transaction
                    } else {
                        $err = "Error updating patient details: " . $stmt->error;
                    }
                }
            }
            ?>
            <?php
            $Patient_Id = isset($_GET['Patient_Id']) ? $_GET['Patient_Id'] : '';
            $ret = "SELECT * FROM patients WHERE Patient_Id=?";
            $stmt = $conn->prepare($ret);
            $stmt->bind_param('i', $Patient_Id);
            $stmt->execute();
            $res = $stmt->get_result();
            while ($row = $res->fetch_object()) {
            ?>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="post" id="edit-patient-form" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First Name <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="FirstName" value="<?php echo $row->FirstName; ?>" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input class="form-control" type="text" name="LastName" value="<?php echo $row->LastName; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>MobileNo <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="MobileNo" value="<?php echo $row->MobileNo; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>DOB <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="DOB" value="<?php echo $row->DOB; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Age <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="Age" value="<?php echo $row->Age; ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Patient_Weight <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="Patient_Weight" value="<?php echo $row->Patient_Weight; ?>">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="Patient_Id" value="<?php echo $row->Patient_Id; ?>">
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary btn-rounded">&nbsp; Save &nbsp;</button>&nbsp;&nbsp;
                                <button class="btn btn-primary btn-rounded" type="submit" name="cancel"><a href="patients.php" style="color:white;">Cancel</a></button>

                            </div>
                        </form>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="sidebar-overlay" data-reff=""></div>
        <script src="assets/js/jquery-3.2.1.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/select2.min.js"></script>
        <script src="assets/js/moment.min.js"></script>
        <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
        <script src="assets/js/app.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            $(document).ready(function() {
                // Intercept form submission
                $('#edit-patient-form').submit(function(e) {
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
                            console.log(response); // Log the response
                            // SweetAlert2 success message
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                html: 'Patient Edited successfully',
                            });
                            // Reset form
                            $('#edit-patient-form')[0].reset();
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText); // Log any errors
                            // SweetAlert2 error message
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                html: 'An error occurred while updating the patient details. Please try again.',
                            });
                        }
                    });
                });
            });
        </script>
    </body>
</html>
