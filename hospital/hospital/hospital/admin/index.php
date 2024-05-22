<?php
// On the top of each protected page
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: a_login.php"); // Redirect to the login page
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic -admin</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>

<body>
    <?php include('include/header.php') ?>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
							<span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
							<div class="dash-widget-info text-right">
								<?php
                                // include('include/config.php');
                                include('include/connection.php');

                               
                                $today = date("Y-m-d");
                                $sql6 ="SELECT Appointment_Id from appointments where AppointmentDate='$today'";
                                $query6 = $dbh -> prepare($sql6);;
                                $query6->execute();
                                $results6=$query6->fetchAll(PDO::FETCH_OBJ);
                                $query=$query6->rowCount();
                                ?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($query);?></div>
								<span class="widget-title1" >TodayAppointment</span>
							</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-check"></i></span>
                            <div class="dash-widget-info text-right">
                            <?php
                                // include('include/config.php');
                                
                               include('include/connection.php');
                                $today = date("Y-m-d");
                                $sql6 ="SELECT Appointment_Id from appointments where AppointmentStatus ='Confirmed' and AppointmentDate = '$today'";
                                    $query6 = $dbh -> prepare($sql6);
                                    $query6->execute();
                                    $results6=$query6->fetchAll(PDO::FETCH_OBJ);
                                    $query=$query6->rowCount();
                                    ?>
                                <div class="stat-panel-number h1 "><?php echo htmlentities($query);?></div>
								<span class="widget-title2">Completed</span>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                            <?php
                                // include('include/config.php');
                                include('include/connection.php');                               
                                $today = date("Y-m-d");
                                $sql6 ="SELECT Appointment_Id from appointments where AppointmentStatus ='Scheduled' and AppointmentDate = '$today'";
                                $query6 = $dbh -> prepare($sql6);
                                $query6->execute();
                                $results6=$query6->fetchAll(PDO::FETCH_OBJ);
                                $query=$query6->rowCount();
                                ?>
                                <div class="stat-panel-number h1 "><?php echo htmlentities($query);?></div>
								<span class="widget-title3">Pending</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-user" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                            <?php
                                // include('include/config.php');
                               
                                $sql6 ="SELECT Appointment_Id from appointments";
                                $query6 = $dbh -> prepare($sql6);;
                                $query6->execute();
                                $results6=$query6->fetchAll(PDO::FETCH_OBJ);
                                $query=$query6->rowCount();
                                ?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($query);?></div>
								<span class="widget-title4">Total Appointment</span>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="row">
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="card">
							<div class="card-body">
								<div class="chart-title">
									<h4>Patient Total</h4>
									<span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> 15% Higher than Last Month</span>
								</div>	
								<canvas id="linegraph"></canvas>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="card">
							<div class="card-body">
								<div class="chart-title">
									<h4>Patients In</h4>
									<div class="float-right">
										<ul class="chat-user-total">
											<li><i class="fa fa-circle current-users" aria-hidden="true"></i>ICU</li>
											<li><i class="fa fa-circle old-users" aria-hidden="true"></i> OPD</li>
										</ul>
									</div>
								</div>	
								<canvas id="bargraph"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12 col-md-12 col-lg-12 col-xl-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title d-inline-block">Today's Appointments</h4> <a href="appointments.php" class="btn btn-primary float-right">View all</a>
							</div>
							<div class="card-body p-0">
								<div class="table-responsive">
									<table class="table mb-0">
										
										<tbody>
											<tr>
												
													<h2><?php 
                                                    
                                                    include('include/connecion.php');
                                                     $today = date("Y-m-d");
                                                     // Your SQL query to fetch data
                                                     $sql = "SELECT appointments.PatientFirstName,appointments.PatientLastName,doctors.DFirstName,doctors.DLastName,appointments.AppointmentTime FROM appointments,doctors where appointments.Doctor_Id = doctors.Doctor_Id and appointments.AppointmentDate='$today'";
                                                     
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
                                                        echo "<th></th>";
                                                        echo "</tr>";
                                                    
                                                        // Iterate through the records and print table rows
                                                        foreach ($result as $row) {
                                                            $i++;
                                                            echo "<tr>";
                                                        
                                                            echo "<td>" . $i ."</td>";
                                                            echo "<td>" . $row['PatientFirstName'] ."&nbsp;". $row['PatientLastName']. "</td>";
                                                            echo "<td>" . $row['DFirstName'] ."&nbsp;". $row['DLastName'] ."</td>";
                                                            echo "<td>" . $row['AppointmentTime'] . "</td>";
                                                            
                                                            echo "</tr>";
                                                        }
                                                        
                                                        
                                                        // Close the table
                                                        echo "</table>";
                                                    } else {
                                                        echo "No records found.";
                                                    }
                                                    ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
                    
				</div>
				<div class="row">
					<div class="col-12 col-md-12 col-lg-12 col-xl-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title d-inline-block">New Patients </h4> <a href="NewPatients.php" class="btn btn-primary float-right">View all</a>
							</div>
							<div class="card-block">
								<div class="table-responsive">
									<table class="table mb-0 new-patient-table">
										<tbody>
											<tr>
                                            <h2><?php 
                                                    
                                                    
                                                    $today = date("Y-m-d");
                                                    // Your SQL query to fetch data
                                                    $sql = "SELECT appointments.PatientFirstName,appointments.PatientLastName,doctors.DFirstName,doctors.DLastName,appointments.AppointmentTime,appointments.AppointmentReason FROM appointments,doctors where appointments.Doctor_id = doctors.Doctor_id and appointments.AppointmentType !='Follow-up' limit 2";
                                                    
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
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/Chart.bundle.js"></script>
    <script src="assets/js/chart.js"></script>
    <script src="assets/js/app.js"></script>

</body>
</html>
