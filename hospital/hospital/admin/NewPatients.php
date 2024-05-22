<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
   
</head>

<body>
<?php include('include/header.php')?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Patients</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="index.php" class="btn btn btn-primary btn-rounded float-right">Back</a>
                    </div>
                    
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table datatable mb-0">
                            <tbody>
											<tr>
                                            <h2><?php 
                                                    
                                                    include('include/connection.php');
                                                    $today = date("Y-m-d");
                                                    // Your SQL query to fetch data
                                                    $sql = "SELECT appointments.PatientFirstName,appointments.PatientLastName,doctors.DFirstName,doctors.DLastName,appointments.AppointmentTime,appointments.AppointmentReason FROM appointments,doctors where appointments.Doctor_id = doctors.Doctor_id and appointments.AppointmentType !='Follow-up'";
                                                    
                                                    // Prepare the query
                                                    $query = $dbh->prepare($sql);
                                                    
                                                    // Execute the query
                                                    $query->execute();
                                                    
                                                    // Fetch all records as an associative array
                                                    $result = $query->fetchAll(PDO::FETCH_ASSOC);
                                                    
                                                   $i=0;
                                                   
                                                    if (count($result) > 0) {
                                                        // Print the table header 
                                                       
                                                        echo "<tr>";
                                                        echo "<th>Sr. No</th>";
                                                        echo "<th>Patient Name</th>";
                                                        echo "<th>Doctor Name</th>";
                                                        echo "<th>Appointment Time </th>";
                                                        echo "<th>Appointment Reason </th>";
                                                        
                                                        echo "</tr>";
                                                    
                                                        // Iterate through the records and print table rows
                                                        foreach ($result as $row) {
                                                            $i++;
                                                            echo "<tr>";
                                                        
                                                            echo "<td>" . $i ."</td>";
                                                            echo "<td>" . $row['PatientFirstName'] . "</td>";
                                                            echo "<td>" . $row['DLastName'] . "</td>";
                                                            echo "<td>" . $row['AppointmentTime'] . "</td>";
                                                            echo "<td>" . $row['AppointmentReason'] . "</td>";
                                                            
                                                            echo "</tr>";
                                                        }
                                                        
                                                   
                                                    
                                                       
                                                       // Close the table
                                                       echo "</table>";
                                                   } else {
                                                       echo "No records found.";
                                                   }
                                                   ?>
											</tr>
										</tbody>
							</table>
						</div>
					</div>
                </div>
            </div>
           
        </div>
		<div id="delete_patient" class="modal fade delete-modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body text-center">
						<img src="assets/img/sent.png" alt="" width="50" height="46">
						<h3>Are you sure want to delete this Patient?</h3>
						<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
							<button type="submit" class="btn btn-danger">Delete</button>
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
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>