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
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
 
</head>

<body>
    <div class="main-wrapper">
        <?php include('include/header.php')?>
       
        <div class="page-wrapper" style="background-color:#F5F5F5">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Appointment</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form action="insert_appointment.php" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input class="form-control"name="fname" style="background-color: white;" type="text"  id="firstname" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input class="form-control" name="lname"type="text" style="background-color: white;" id="lastname" >
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                
            <label for="select">Select Branch</label>
            <select class="form-control" name="branch" id="branch" >
                <option value="#">Select Branch</option>
            </select>
        </div>
        <div class="col-md-6 col-sm-6">
            <label for="select">Select Doctor</label>
            <select class="form-control" name="doctors" id="doctors" >
                <option value="#">Select Doctor</option>
            </select>
        </div>
                  
        </div>
       <br> 
                  <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
            <label for="Bdate">Appointment Date</label>
            <input type="date" name="Bdate" value="" class="form-control" style="border: 1px solid gray; color: gray; margin-bottom: 20px;" onfocus="this.style.color = 'black';" onblur="if(this.value=='') this.style.color = 'gray';">
        </div>
                                    </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Appointment Time</label>
                                        <div class="time-icon">
                                            <input type="time" name="time"class="form-control" id="datetimepicker3">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input class="form-control" name="phone" type="text">
                                    </div>
                                </div>
                           
                                <div class="col-md-6">
                                    <div class="form-group" >
                                        <label>Appointment-Type</label>
                                        <select class="select" name="type">
                                            <option value="#">Select</option>
                                            <option value="check-up">check-up</option>
                                            <option value="Follow-up">Follow-up</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea cols="30" rows="4" name="message" class="form-control"></textarea>
                            </div>
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary btn-rounded" style="margin:10px">Book</button>
                                <a href="appointments.php" class="btn btn-primary btn-rounded">Cancel</a>
                            </div>
                        </form>
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
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script>
$(document).ready(function(){
    var getmakes = true;
    
    // Request to populate Clinic dropdown initially
    $.post("try.php", { getmakes }, function(data){
        $("#branch").html(data);
    }).fail(function(xhr, status, error) {
        console.error("Error fetching makes:", error);
    });
    
   // Event handler for Branch dropdown change
    $("#branch").on('change', function(){
        var make1 = $(this).val();
        
        // Request to populate Branch dropdown based on selected make
        $.post("try.php", { make1 }, function(data){
            $("#doctors").html(data);
        }).fail(function(xhr, status, error) {
            console.error("Error fetching branch:", error);
        });
    });
});

</script>
</body>

</html>