<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - add-doctor</title>
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
                        <h4 class="page-title">Add Doctor</h4>
                    </div>
                </div>

                
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                    
                        <form action="save_data.php" id="add-doctor-form" enctype="multipart/form-data" method="post" >

                             <div class="row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label>First Name <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="DFirstName" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group">
                    <label>Last Name</label>
                    <input class="form-control" type="text" name="DLastName">
                </div>
            </div>
                              <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email <span class="text-danger">*</span></label>
                                        <input class="form-control" type="email" name="Email">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Specialization</label>
                                        <input class="form-control" type="text" name="Specialization">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Education</label>
                                        <input class="form-control" type="text" name="Education">
                                    </div>
                                </div>

                               <!-- newley added-->
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
                                        <label>Password</label>
                                        <input class="form-control" type="password" name="Password">
                                    </div>
                                </div>

                              
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <div class="cal-icon">
                                            <input type="text" class="form-control datetimepicker" name="DOB">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group gender-select">
                                        <label class="gen-label">Gender:</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="Gender" class="form-check-input" value="Male">Male
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="Gender" class="form-check-input" value="Female">Female
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
											<div class="form-group">
												<label>Address</label>
												<input type="text" class="form-control" name="Address">
											</div>
										</div>

								<div class="col-sm-12">
									<div class="row">
										
										<div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Country</label>
												<select class="form-control select" name="Country">
													<option>India</option>
                                                    <option>USA</option>
													<option>United Kingdom</option>
												</select>
											</div>
										</div>

										<div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>City</label>
												<input type="text" class="form-control" name="City">
											</div>
										</div>

										<div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>State/Province</label>
												<select class="form-control select" name="State">
													<option>California</option>
													<option>Maharastra</option>
													<option>Goa</option>
                                                    <option>Alaska</option>
													<option>Alabama</option>
												</select>
											</div>
										</div>

										<div class="col-sm-6 col-md-6 col-lg-3">
											<div class="form-group">
												<label>Pincode</label>
												<input type="text" class="form-control" name="Pincode">
											</div>
										</div>
									</div>
								</div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Mobile No </label>
                                        <input class="form-control" type="text" name="Mobile_No">
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

							<div class="form-group">
                                <label>Experience</label>
                                <textarea class="form-control" rows="3" cols="30" name="Experience"></textarea>
                            </div>
                           
                            <div class="m-t-20 text-center">
                                
                                 <button class="btn btn-primary btn-rounded" type="submit" name="submit">&nbsp;&nbsp;Save&nbsp;&nbsp;</button>&nbsp;
                                 <a href="doctors.php" class="btn btn-primary btn-rounded">Cancel</a>
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
        $('#add-doctor-form').submit(function(e) {
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
                        html: 'Doctor added successfully',
                    });
                    // Reset form
                    $('#add-doctor-form')[0].reset();
                }
            });
        });
    });
</script>
</body>

</html>
