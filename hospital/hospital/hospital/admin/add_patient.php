<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic-add-patient</title>
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
                <h4 class="page-title">Add Patient</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form action="save_patient_data.php" id="add-patient-form" enctype="multipart/form-data" method="post" >
                    <div class="row">
                      
                        <div class="col-sm-6">
                               <div class="form-group">
        <label>Select Branch</label>
        <select class="form-control" name="Branch_id">
            <?php
            include('include/connection.php');
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Query to fetch branches
            $query = "SELECT * FROM branches";
            $result = mysqli_query($conn, $query);

            // Loop through each row in the result set
            while ($row = mysqli_fetch_assoc($result)) {
                // Output option tags for each branch
                echo '<option value="' . $row['Branch_Id'] . '">' . $row['Branch_Name'] . '</option>';
            }

            // Close database connection
            mysqli_close($conn);
            ?>
        </select>
    </div>
</div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>First Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="FirstName">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input class="form-control" type="text" name="LastName">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Mobile No. <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="MobileNo" >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Date Of Birth <span class="text-danger">*</span></label>
                                <input class="form-control" type="date" name="DOB">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Patient Age</label>
                                <input class="form-control" type="text" name="Age">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Patient Weight</label>
                                <input class="form-control" type="text" name="patient_Weight">
                            </div>
                        </div>
                    </div>
                    <div class="m-t-20 text-center">
                                
                                <button class="btn btn-primary btn-rounded" type="submit" name="submit">&nbsp;&nbsp;Save&nbsp;&nbsp;</button>&nbsp;
                                <a href="patients.php" class="btn btn-primary btn-rounded">Cancel</a>
                           </div>
                </form>
            </div>
        </div>
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
        $('#add-patient-form').submit(function(e) {
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
                        html: 'patient added successfully',
                    });
                    // Reset form
                    $('#add-patient-form')[0].reset();
                }
            });
        });
    });
</script>
</body>

</html>
