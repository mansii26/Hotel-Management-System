<?php 
include('include/connection.php');
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $adn = "DELETE FROM services WHERE Service_Id = ?";
    
    // Line number 13 start
    $stmt = $dbh->prepare($adn);
    $stmt->bindParam(1, $id, PDO::PARAM_INT);
    $stmt->execute();
    $stmt->closeCursor(); // Use closeCursor() instead of close()

    if ($stmt) {
        $success = "Service deleted successfully";
    } else {
        $err = "Error deleting service";
    }
}
?>

<?php 
include('include/header.php');

// Database connection parameters
include('include/connection.php');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["Save_Service"])) {
    $Branch_Id = $_POST['Branch_Id']; 
    $service_name = $_POST['service_name'];
    $service_description = $_POST['service_description'];
    
    // Check if file was uploaded successfully
    if(isset($_FILES["service_img"]) && $_FILES["service_img"]["error"] == 0) {
        $service_img = $_FILES["service_img"]["name"];
        move_uploaded_file($_FILES["service_img"]["tmp_name"], "assets/img/".$_FILES["service_img"]["name"]);
    } else {
        // Handle file upload error
        $service_img = "";
    }

    $query = "INSERT INTO services (Branch_Id, service_name, service_description, service_img) 
              VALUES ('$Branch_Id', '$service_name', '$service_description', '$service_img')";
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        echo '<script>alert("Record inserted successfully")</script>';
    } else {
        echo '<script>alert("Failed to insert record")</script>';
    }
}

// Query to fetch services
$query = "SELECT * FROM services";
$result = $conn->query($query);
$services = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $services[] = $row;
    }
}

mysqli_close($conn);
?>

<?php include('include/header.php');?>

<div class="page-wrapper">
    <div class="content">
    <div class="row">
            <div class="col-sm-4 col-3">
                <h4 class="page-title">Services</h4>
            </div>
            <div class="col-sm-8 col-9 text-right m-b-20">
                <a href="add_services.php" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Services</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-border table-striped custom-table datatable mb-0">
                        <thead>
                            <tr>
                                <th>Service Name</th>
                                <th>Description</th>
                                <th>Branch</th>
                                <th>Image</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($services as $service): ?>
                                <tr>
                                    <td><?php echo $service['service_name']; ?></td>
                                    <td><?php echo $service['service_description']; ?></td>
                                    <td><?php echo $service['branch_id']; // Replace with actual branch data retrieval ?></td>
                                    <td>
                                        <?php if (!empty($service['service_img'])): ?>
                                            <img src="assets/img/<?php echo $service['service_img']; ?>" alt="Service Image" width="50">
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="edit_services.php?Service_Id=<?php echo $service["Service_Id"];?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a class="dropdown-item delete-service-btn" href="#" data-service-id="<?php echo $service['Service_Id']; ?>" data-toggle="modal" data-target="#delete_service_modal"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="delete_service_modal" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <img src="assets/img/sent.png" alt="" width="50" height="46">
                                <h3>Are you sure want to delete this Service?</h3>
                                <div class="m-t-20">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                    <!-- Confirm Delete Button -->
                                    <a id="confirm_delete_button" href="#" class="btn btn-danger">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
</div>

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
<script>
    $(document).ready(function() {
        // Initialize DataTable
        $('.datatable').DataTable();

        // Fetch branches from the API
        $.ajax({
            url: 'get_branches.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                // Check if API call was successful
                if (response && response.length > 0) {
                    // Populate select dropdown with branch data
                    $.each(response, function(index, branch) {
                        $('select[name="Branch_Id"]').append($('<option>', {
                            value: branch.Branch_Id,
                            text: branch.Branch_Name
                        }));
                    });
                } else {
                    // Handle API call error or empty response
                    console.error('Failed to fetch branches');
                }
            },
            error: function(xhr, status, error) {
                // Handle AJAX error
                console.error('AJAX error:', status, error);
            }
        });
    });
</script>
<script>
            $(document).ready(function() {
                $('.delete-service-btn').click(function() {
                    var serviceId = $(this).data('service-id');
                    $('#confirm_delete_button').attr('href', 'services.php?delete=' + serviceId);
                });
            });
        </script>
</body>
</html>
