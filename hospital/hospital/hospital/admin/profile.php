<!DOCTYPE html>
<html lang="en">


<!-- profile22:59-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - profile</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
   
</head>

<body>
    <?php include('include/header.php');?>
        <div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-7 col-6">
                <h4 class="page-title">My Profile</h4>
            </div>
            <div class="col-sm-5 col-6 text-right m-b-30">
                <a href="doctors.php" class="btn btn-primary btn-rounded">Go Back</a>
            </div>
            <div class="col-sm-5 col-6 text-right m-b-30">

            </div>
        </div>
        <div class="card-box profile-header">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                            <?php
                               include('include/connection.php');

                                // Create connection
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                // Check connection
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }

                                // Assuming the Doctor ID is set in the URL
                                if (isset($_GET['Doctor_id'])) {
                                    $Doctor_id = $_GET['Doctor_id'];

                                    // Fetch profile data from the database based on the Doctor_id
                                    $sql = "SELECT * FROM doctors WHERE Doctor_id  = $Doctor_id";
                                    $result = $conn->query($sql);

                                    if ($result && $result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                ?>
                                <a href="#"><img class="avatar" src="assets/img/<?php echo $row["Doc_img"];?>" alt=""></a>
                                <?php
                                    } else {
                                        echo "No profile found for this ID";
                                    }
                                } else {
                                    echo "ID not provided";
                                }

                                // Close database connection
                                $conn->close();
                                ?>
                            </div>
                        </div>
                        <!-- Profile basic info -->
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                    <h3 class="user-name mt0 mb-0">
                                     <?php 
                                     if(isset($row["DFirstName"]) && isset($row["DLastName"])) {
                                     echo $row["DFirstName"] . ' ' . $row["DLastName"]; 
                                      } elseif(isset($row["DFirstName"])) {
                                      echo $row["DFirstName"];
                                        } else {
                                     echo '';
                                     }
                                     ?>
                                    </h3>  
                                      <small class="text-muted"><?php echo isset($row["Specialization"]) ? $row["Specialization"] : ''; ?></small>
                                        <div class="staff-id">Employee ID : <?php echo isset($row["Doctor_id"]) ? $row["Doctor_id"] : ''; ?></div><br>
                                        <a href="edit-doctor.php?Doctor_id=<?php echo $row["Doctor_id"];?>" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i>Edit Profile</a> 
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        <li>
                                            <span class="title">Phone:</span>
                                            <span class="text"><a href="tel:<?php echo isset($row["Mobile_No"]) ? $row["Mobile_No"] : ''; ?>"><?php echo isset($row["Mobile_No"]) ? $row["Mobile_No"] : ''; ?></a></span>

                                        </li>
                                        <li>

                                            <span class="title">Email:</span>
                                            <span class="text"><a href="mailto:<?php echo isset($row["Email"]) ? $row["Email"] : ''; ?>"><?php echo isset($row["Email"]) ? $row["Email"] : ''; ?></a></span>
                                        </li>
                                        <li>
                                            <span class="title">Birthday:</span>
                                            <span class="text"><?php echo isset($row["DOB"]) ? $row["DOB"] : ''; ?></span>
                                        </li>
                                        <li>
                                            <span class="title">Address:</span>
                                            <span class="text"><?php echo isset($row["Address"]) ? $row["Address"] : ''; ?></span>
                                        </li>
                                        <li>
                                            <span class="title">Gender:</span>
                                            <span class="text"><?php echo isset($row["Gender"]) ? $row["Gender"] : ''; ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>

  
		
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/app.js"></script>
</body>
</html>