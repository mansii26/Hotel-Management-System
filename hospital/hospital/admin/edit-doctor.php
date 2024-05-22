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
                <h4 class="page-title">Edit Doctor</h4>
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
            if (isset($_POST['DFirstName'], $_POST['DLastName'], $_POST['Email'], $_POST['Password'], $_FILES['Doc_img'], $_POST['Doctor_id'])) {
                $DFirstName = $_POST['DFirstName'];
                $DLastName = $_POST['DLastName'];
                $Email = $_POST['Email'];
                $Password = $_POST['Password'];
                $Doc_img = $_FILES["Doc_img"]["name"];
                $Doctor_id = $_POST['Doctor_id'];

                move_uploaded_file($_FILES["Doc_img"]["tmp_name"], "assets/img/" . $_FILES["Doc_img"]["name"]);

                // SQL query to update the doctor details
                $query = "UPDATE doctors SET DFirstName=?, DLastName=?, Email=?, Password=?, Doc_img=? WHERE Doctor_id = ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('sssssi', $DFirstName, $DLastName, $Email, $Password, $Doc_img, $Doctor_id);
                $stmt->execute();

                if ($stmt) {
                    $success = "Employee Details Updated";
                } else {
                    $err = "Please Try Again Or Try Later";
                }
            }
        }
        ?>
        <?php
        $Doctor_id = isset($_GET['Doctor_id']) ? $_GET['Doctor_id'] : '';
        $ret = "SELECT * FROM doctors WHERE Doctor_id=?";
        $stmt = $conn->prepare($ret);
        $stmt->bind_param('i', $Doctor_id);
        $stmt->execute();
        $res = $stmt->get_result();
        while ($row = $res->fetch_object()) {
        ?>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form method="post"  id="edit-doctor-form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>First Name <span class="text-danger">*</span></label>
                                    <input class="form-control" type="text" name="DFirstName" value="<?php echo $row->DFirstName; ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" name="DLastName" value="<?php echo $row->DLastName; ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email <span class="text-danger">*</span></label>
                                    <input class="form-control" type="email" name="Email" value="<?php echo $row->Email; ?>">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control" type="password" name="Password" value="<?php echo $row->Password; ?>" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Profile Image</label>
                                    <div class="profile-upload">
                                        <div class="upload-img">
                                            <img alt="" src="assets/img/user.jpg">
                                        </div>
                                        <div class="upload-input">
                                            <input type="file" class="form-control" name="Doc_img">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="Doctor_id" value="<?php echo $Doctor_id; ?>">
                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary btn-rounded">&nbsp;Save&nbsp;</button>&nbsp;&nbsp;
                            <button class="btn btn-primary btn-rounded" type="submit" name="cancel"><a href="doctors.php" style="color:white;">Cancel</a></button>

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
        $('#edit-doctor-form').submit(function(e) {
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
                        html: 'Profile Edited successfully',
                    });
                    // Reset form
                    $('#edit-doctor-form')[0].reset();
                }
            });
        });
    });
</script>
</body>
</html>
