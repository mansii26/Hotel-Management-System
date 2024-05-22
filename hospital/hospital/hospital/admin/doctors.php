<?php
include('include/connection.php');

if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $adn = "DELETE FROM doctors WHERE Doctor_id = ?";
    
    // Line number 13 start
    $stmt = $dbh->prepare($adn);
    $stmt->bindParam(1, $id, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->closeCursor(); // Use closeCursor() instead of close()

    if ($stmt) {
        $success = "Doctor deleted successfully";
    } else {
        $err = "Error deleting doctor";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

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
    <?php include('include/header.php');?>

        <!-- Doctors list -->
        <div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Doctors</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="add-doctor.php" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Doctor</a>
            </div>
        </div>
        <!-- Doctors list -->
        <div class="row">
        <?php 
// database connection
include('include/connection.php');
// // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//include("include/connection.php");

// Fetch doctor data from the database
$sql = "SELECT * FROM doctors";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
?>
    <div class="col-md-4 col-sm-4 col-lg-3">
        <div class="profile-widget">
            <div class="doctor-img">
                <a class="avatar" href="profile.php?Doctor_id=<?php echo $row['Doctor_id']; ?>"> <img src="assets/img/<?php echo $row["Doc_img"]; ?>"></a>
            </div>
            <div class="dropdown profile-action">
                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="edit-doctor.php?Doctor_id=<?php echo $row["Doctor_id"];?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                 <a class="dropdown-item delete-doctor-btn" href="#" data-doctor-id="<?php echo $row['Doctor_id']; ?>" data-toggle="modal" data-target="#delete_doctor_modal"><i class="fa fa-trash-o m-r-5"></i> Delete</a>

                </div>
            </div>
            <h4 class="doctor-name text-ellipsis"><a href="profile.php?Doctor_id =<?php echo $row['Doctor_id']; ?>"><?php echo $row["DFirstName"]. ' ' . $row["DLastName"];?></a></h4>            <div class="doc-prof"><?php echo $row["Specialization"]; ?></div>
            <div class="user-country">
                <i class="fa fa-map-marker"></i> <?php echo $row["Country"] . ", " . $row["City"]; ?>
            </div>
        </div>
    </div>
<?php
    }
} else {
    echo "No doctors found";
}
// Close database connection
$conn->close();
?>

        </div>
        <div id="delete_doctor_modal" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <img src="assets/img/sent.png" alt="" width="50" height="46">
                                <h3>Are you sure want to delete this Doctor?</h3>
                                <div class="m-t-20">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                    <!-- Confirm Delete Button -->
                                    <a id="confirm_delete_button" href="#" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <!-- End Doctors list -->

</div>
<div class="sidebar-overlay" data-reff=""></div>
   <script src="assets/js/jquery-3.2.1.min.js"></script> 
	<script src="assets/js/popper.min.js"></script> 
     <script src="assets/js/bootstrap.min.js"></script>
     <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/Chart.bundle.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/app.js"></script>
   
    <script>
            $(document).ready(function() {
                $('.delete-doctor-btn').click(function() {
                    var doctorId = $(this).data('doctor-id');
                    $('#confirm_delete_button').attr('href', 'doctors.php?delete=' + doctorId);
                });
            });
        </script>
        
</body>


</html>