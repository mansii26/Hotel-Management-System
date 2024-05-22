<!DOCTYPE html>
<html lang="en">

<!-- add-doctor24:06-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - edit-doctor</title>
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
                <h4 class="page-title">Edit Service</h4>
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
            if (isset($_POST['service_name'], $_POST['service_description'],$_FILES['service_img'], $_POST['Service_Id'])) {
                $service_name = $_POST['service_name'];
                $service_description = $_POST['service_description'];
                $service_img = $_FILES["service_img"]["name"];
                $Service_Id = $_POST['Service_Id'];

                move_uploaded_file($_FILES["service_img"]["tmp_name"], "assets/img/" . $_FILES["service_img"]["name"]); 

                // SQL query to update the doctor details
                $query = "UPDATE services SET service_name=?, service_description=?,service_img=? WHERE Service_Id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('sssi', $service_name, $service_description,$service_img, $Service_Id);
                $stmt->execute();

                if ($stmt) {
                    $success = "Services Details Updated";
                } else {
                    $err = "Please Try Again Or Try Later";
                }
            }
        }
        ?>
        <?php
        $Service_Id = isset($_GET['Service_Id']) ? $_GET['Service_Id'] : '';
        $ret = "SELECT * FROM services WHERE Service_Id=?";
        $stmt = $conn->prepare($ret);
        $stmt->bind_param('i', $Service_Id);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($row = $res->fetch_object()) {
        ?>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form method="post"  id="edit-service-form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Service Name<span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="service_name" value="<?php echo $row->service_name; ?>" required>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>service_description <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="service_description" value="<?php echo $row->service_description; ?>">
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Service Image</label>
                                    <div class="profile-upload">
                                        <div class="upload-img">
                                            <img alt="" src="assets/img/user.jpg">
                                        </div>
                                        <div class="upload-input">
                                            <input type="file" class="form-control" name="service_img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="Service_Id" value="<?php echo $Service_Id; ?>">
                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary btn-rounded">&nbsp; Save &nbsp;</button>&nbsp; &nbsp;
                            <button class="btn btn-primary btn-rounded" type="submit" name="cancel"><a href="services.php" style="color:white;">Cancel</a></button>

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
        $('#edit-service-form').submit(function(e) {
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
                        html: 'Service Edited successfully',
                    });
                    // Reset form
                    $('#edit-service-form')[0].reset();
                }
            });
        });
    });
</script>
</body>
</html>
