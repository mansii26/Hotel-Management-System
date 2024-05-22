<?php include('include/header.php')?>
<?php 
include('include/connection.php');
session_start();
if(!isset($_SESSION["Doctor_id"]))
{
    echo"<script>window.open('index.php?mes=Access Denied..','_self');</script>";
    
}
?>
<?php
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $adn = "DELETE FROM patients WHERE Patient_Id = ?";
    

    $stmt = $dbh->prepare($adn);
    $stmt->bindParam(1, $id, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->closeCursor(); // Use closeCursor() instead of close()

    if ($stmt) {
        $success = "Patient deleted successfully";
    } else {
        $err = "Error deleting doctor";
    }
}
?>

            
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Patients</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add_patient.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Patient</a>
                    </div>
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							

                            <?php
                            try {
                              

                                // Query to fetch records
                                include('include/connection.php');
                                $B=$_SESSION["Branch_id"];  
                                
                                $stmt = $dbh->prepare("SELECT patients.FirstName,patients.LastName,patients.Age,patients.MobileNo,patients.DOB,patients.Patient_Weight  FROM patients,doctors where patients.branch_Id=$B and patients.DFirstName=doctors.DFirstName");
                                $stmt->execute();

                                // Fetch data as an associative array
                                $patients = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                // Display records in HTML table
                                echo '<table class="table table-border table-striped custom-table datatable mb-0 ml-1 mr-3">
                                        <thead>
                                            <tr>
                                                <th>Name </th>
                                                <th>Age</th>
                                                <th>Mobile No.</th>
                                                <th>DOB</th>
                                                <th>Patient Weight</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>';

                                foreach ($patients as $patient) {
                                    echo '<tr>';
            
                                    echo '<td>' . $patient['FirstName'] . ' '. $patient['LastName'] . '</td>';
                                    echo '<td>' . $patient['Age'] . '</td>';
                                    
                                    echo '<td>' . $patient['MobileNo'] . '</td>';
                                    echo '<td>' . $patient['DOB'] . '</td>';
                                    echo '<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $patient['Patient_Weight'] . '</td>';
                                    echo '<td>'?>
                                    <div class="dropdown dropdown-action">
                                        <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                        
                                        <a class="dropdown-item" href="edit_patient.php?Patient_Id=<?php echo $patient["Patient_Id"];?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>

                                      
                                        <a class="dropdown-item delete-patient-btn" href="#" data-patient-id="<?php echo $patient['Patient_Id']; ?>" data-toggle="modal" data-target="#delete_patient_model"><i class="fa fa-trash-o m-r-5"></i> Delete</a>

                                        </div>
                                    </div>
                               
                                   <?php echo '</td></tr>';
                                    
                                    
                                }

                                echo '</tbody></table>';
                            } catch (PDOException $e) {
                                echo "Error: " . $e->getMessage();
                            }
                            ?>
                            
						</div>
					</div>
                </div>
            </div>
            
        </div>
		<div id="delete_patient_model" class="modal fade delete-modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body text-center">
						<img src="assets/img/sent.png" alt="" width="50" height="46">
						<h3>Are you sure want to delete this Patient?</h3>
						<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                        <a id="confirm_delete_button" href="#" class="btn btn-danger">Delete</a>

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

<script>
            $(document).ready(function() {
                $('.delete-patient-btn').click(function() {
                    var patientId = $(this).data('patient-id');
                    $('#confirm_delete_button').attr('href', 'patients.php?delete=' + patientId);
                });
            });
        </script>

</html>