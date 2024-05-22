<!DOCTYPE html>
<html lang="en">
<head>

     <title>Health</title>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="Tooplate">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">
     <link rel="stylesheet" href="css/animate.css">
     <link rel="stylesheet" href="css/owl.carousel.css">
     <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/services.css" rel="stylesheet"> 
    <title>Medilife | Home</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">

  <link href="assets/css/style.css" rel="stylesheet">  

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/tooplate-style.css"> 
<style>
body{
width:100%;
}
input::placeholder{
opacity:0.5;
font-weight:bold;
color: white;

}

</style>
</head>
<body id="top" data-target=".navbar-collapse" data-offset="0">

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!-- <h1 class="logo me-auto"><a href="admin/a_login.php" style="font-size:50px; margin-left:60px;"><img src="images/logo.jpg" style="width:200px; height:50px;"></a></h1> -->
      
      <a href="admin/index.php" class="logo me-auto"><img src="images/logo.jpg" alt="" class="img-fluid" style="max-width: 200px;"></a>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="#about_us">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#contact-us">Contact</a></li>
          <li><a class="nav-link scrollto" href="admin/a_login.php">Login</a></li>


        </ul>
        
      </nav><!-- .navbar -->

      <!-- <a href="admin/a_login.php" class="btn btn-primary btn-rounded">Login</a> -->
      <!-- <a href="admin/a_login.php" class="a_login-btn scrollto" style="border-radius: 50px;  ">Login</a> -->

    </div>
  </header>
<section id="home" class="slider" data-stellar-background-ratio="0">
          <div style="width:100%; height:100%;">
               <div class="row">

                         <div class="owl-carousel owl-theme">
                              <div class="item item-first">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>Let's make your life happier</h3>
                                             <h1>Healthy Living</h1>
                                            <a href="#appointment" class="appointment-btn scrollto">Book Appointment</a>
                                        </div>
                                   </div>
                              </div>

                              <div class="item item-second">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>Aenean luctus lobortis tellus</h3>
                                             <h1>New Lifestyle</h1>
                                             <a href="#appointment" class="appointment-btn scrollto">Book Appointment</a>
                                        </div>
                                   </div>
                              </div>

                              <div class="item item-third">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3>Pellentesque nec libero nisi</h3>
                                             <h1>Your Health Benefits</h1>
                                             <a href="#appointment" class="appointment-btn scrollto">Book Appointment</a>
                                        </div>
                                   </div>
                              </div>
                         </div>

               </div>
          </div>
     </section>

<!-- ***** Book An Appoinment Area Start ***** -->
<!-- MAKE AN APPOINTMENT -->
<section id="appointment" data-stellar-background-ratio="3">
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-6">
                         <img src="images/appointment-image.jpg" class="img-responsive" alt="">
                    </div>

                    <div class="col-md-6 col-sm-6">
                         <!-- CONTACT FORM HERE -->
                         <form id="appointment-form" role="form" method="post" action="insert_appointment.php">

<!-- SECTION TITLE -->
<div class="section-title wow fadeInUp" data-wow-delay="0.4s">
    <h2 style="text-align:center">Make an appointment</h2>
</div>

<div class="wow fadeInUp" data-wow-delay="0.8s">

    <div class="row">
        <div class="col-md-4 col-sm-6">
            <label for="fname">First Name</label>
            <input type="text" name="fname" placeholder="First Name" class="form-control" style="border: 1px solid gray; color: gray;" onfocus="this.style.color = 'black';" onblur="if(this.value=='') this.style.color = 'gray';">
        </div>
        <div class="col-md-4 col-sm-6">
            <label for="lname">Last Name</label>
            <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" style="border: 1px solid gray; margin-bottom: 20px;">
        </div>
        <div class="col-md-4 col-sm-6">
            <label for="select">Select Branch</label>
            <select class="form-control" name="branch" id="branch" style="border: 1px solid gray; color: gray;" onfocus="this.style.color = 'black';" onblur="if(this.value=='') this.style.color = 'gray';">
                <option value="#">Select Branch</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-sm-6">
            <label for="select">Select Doctor</label>
            <select class="form-control" name="doctors" id="doctors" style="border: 1px solid gray; color: gray; margin-bottom: 20px;" onfocus="this.style.color = 'black';" onblur="if(this.value=='') this.style.color = 'gray';">
                <option value="#">Select Doctor</option>
            </select>
        </div>
        <div class="col-md-4 col-sm-6">
            <label for="Bdate">Appointment Date</label>
            <input type="date" name="Bdate" value="" class="form-control" style="border: 1px solid gray; color: gray; margin-bottom: 20px;" onfocus="this.style.color = 'black';" onblur="if(this.value=='') this.style.color = 'gray';">
        </div>
        <div class="col-md-4 col-sm-6">
            <label for="time">Appointment Time</label>
            <input type="time" name="time" value="" class="form-control" style="border: 1px solid gray;">
        </div>
    </div>

    <div class="row">
        <div class="col-md-4 col-sm-6">
            <label for="telephone">Phone Number</label>
            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone" style="border: 1px solid gray;">
        </div>
        <div class="col-md-4 col-sm-6">
            <label for="select">Appointment Type</label>
            <select class="form-control" name="type" id="type" style="border: 1px solid gray; color: gray; margin-bottom: 20px;" onfocus="this.style.color = 'black';" onblur="if(this.value=='') this.style.color = 'gray';">
                <option value="#">Select Type</option>
                <option value="Follow-up">Follow-up</option>
                <option value="Check Up">Check Up</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <label for="Message">Additional Message</label>
            <textarea class="form-control" rows="5" id="message" name="message" placeholder="Message" style="border: 1px solid gray;"></textarea>
            <br>
            <input type="submit" class="a_login-btn scrollto" id="cf-submit" name="submit" style="background-color: #006cff; border-radius: 50px; border: none; float: right;" value="Book Now">
        </div>
    </div>
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
</div>
</form>

                    </div>

               </div>
          </div>
     </section>
    <!-- ***** Book An Appoinment Area End ***** -->
  <!-- *****  About US ***** -->
    <div id="about_us" class="medilife-features-area section-padding-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <div class="features-content">
                        <h2>We always put our pacients first</h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer adipiscing eli.Lorem ipsum dolor sit amet, consec tetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Lorem ipsum dolor sit amet, consectetuer.</p>
                        
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="features-thumbnail">
                        <img src="images/about1.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Features Area End ***** -->
  <!-- ################# Key Features Starts Here#######################--->

    <section class="key-features">
        <div id="services"class="container">
            <div class="inner-title">

                <h2 style="text-align:center;">Services</h2>
               
            </div>

            <div class="row">
               <?php
              include('admin/include/connection.php');
               // Create connection
               $conn = new mysqli($servername, $username, $password, $dbname);

               // Check connection
               if ($conn->connect_error) {
                   die("Connection failed: " . $conn->connect_error);
               }

               // Fetch data from the database
               $query = "SELECT * FROM services";
               $result = mysqli_query($conn, $query);

               // Check if query execution was successful
               if (!$result) {
                   die("Query failed: " . mysqli_error($conn));
               }
               ?>

               <section class="key-features">
                   <div class="row">
                       <?php
                       // Loop through each row of the result set
                       while ($row = mysqli_fetch_assoc($result)) {
                       ?>
                           <div class="col-md-4 col-sm-6">
                               <div class="single-key">
                                   <img src="admin/assets/img/<?php echo $row["service_img"];?>" alt="" class="service-img"><br>
                                   <br><h4><b><?php echo $row['service_name']; ?></b></h4>
                                   <p><?php echo $row['service_description']; ?></p>
                               </div>
                           </div>
                       <?php
                       }
                       ?>
                   </div>
               </section>
           </div>

    </section>
    
    <!-- Contact Us -->
          
    <section id="contact-us" data-stellar-background-ratio="3">
     
     <div class="container">
          
          <div class="row">
               <h2 style="text-align: center;">Contact Us</h2>
               <div class="col-md-6 col-sm-6">
<br><br>
                    <img src="images/news-image2.jpg" class="img-responsive" alt="">
               </div>

               <div class="col-md-6 col-sm-6">



<!----------------------------- CONTACT FORM HERE --------------------------------->



                    <form action="contact.php"  id="add-contact-form" enctype="multipart/form-data" method="post">

                         <!-- SECTION TITLE -->
                         <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                             
                         </div>

                         <div class="wow fadeInUp" data-wow-delay="0.1s">
                              <div class="col-md-6 col-sm-6">
                                   <label for="name">First Name</label>
                                   <input type="text" class="form-control" id="name" name="first_name" placeholder="First Name" required>
                              </div>

                              <div class="col-md-6 col-sm-6">
                                   <label for="name">last tName</label>
                                   <input type="text" class="form-control" id="name" name="last_name" placeholder="last Name" required>
                              </div>
                       
                       
                              <div class="col-md-12 col-sm-12">
                                   <br>
                                   <label for="telephone">Phone Number</label>
                                   <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone" required>
                                   
                              </div>
                              <div class="col-md-12 col-sm-12">
                                   <br>
                               <label for="Message">Message</label>
                               <textarea class="form-control" rows="5" id="message" name="message" placeholder="Message"></textarea> <br> <br>
                               <!-- <button type="submit" class="a_login-btn scrollto" id="cf-submit" name="submit" style="background-color: #006cff; border-radius: 50px; border:none;float:right">Send</button> -->
                               <button class="btn btn-primary btn-rounded" type="submit" name="submit">&nbsp;&nbsp;Send&nbsp;&nbsp;</button>&nbsp;
                          </div>
                         </div>
                   </form>
               </div>

          </div>
     </div>
</section>
 <!-- FOOTER -->
<div style="background-color:black; color:white;">
<br>
     <footer data-stellar-background-ratio="5">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-4">
                         <div class="footer-thumb"  style="color:white;"> 
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s"style="color:white;" >Contact Info</h4>
                              <p style="color:white;">Fusce at libero iaculis, venenatis augue quis, pharetra lorem. Curabitur ut dolor eu elit consequat ultricies.</p>

                              <div class="contact-info">
                                   <pstyle="color:white;"><i class="fa fa-phone"></i> 010-070-0170</p>
                                   <p style="color:white;"><i class="fa fa-envelope-o"></i> <a href="#" style="color:white;">info@company.com</a></p>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s" style="color:white;">Location</h4>
              <div class="address">
                
                
                <p class="bi bi-geo-alt" style="color:white;"> &nbsp; &nbsp;Rajyug It Solution, wakad Pune-411017 , India</p>
<!-- Google map-->
<section id="google-map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3780.863508264085!2d73.69584731432457!3d18.584493387367825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2c0dbbfb378d5%3A0xb3b6195ed8442e0e!2sBhumkar%20Chowk%2C%20Wakad%2C%20Pimpri-Chinchwad%2C%20Maharashtra%20411157%2C%20India!5e0!3m2!1sen!2sbd!4v1644354343907!5m2!1sen!2sbd" width="100%" height="100" frameborder="0" style="border:0" allowfullscreen ></iframe>
</section>
              </div>

            </div>

          </div>
                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb">
                              <div class="opening-hours">
                                   <h4 class="wow fadeInUp" data-wow-delay="0.4s"style="color:white;">Opening Hours</h4>
                                   <p style="color:white;">Monday - Friday <span style="color:white;">06:00 AM - 10:00 PM</span></p>
                                   <p style="color:white;">Saturday <span style="color:white;">09:00 AM - 08:00 PM</span></p>
                                   <p style="color:white;">Sunday <span style="color:white;">Closed</span></p>
                              </div> 

                              <ul class="social-icon">
                                   <li><a href="https://www.facebook.com/tooplate" style="color: white; font-size:25px; padding:10px;"class="fa fa-facebook-square" attr="facebook icon"></a>
                                   <a href="#" style="color: white;  font-size:25px; padding:10px;" class="fa fa-twitter"></a>
                                   <a href="#" style="color: white;  font-size:25px; padding:10px;" class="fa fa-instagram"></a>
                                   <a href="https://wa.me/+917028121922?text=Hello%2C%20I%20have%20a%20query%3A" target="_blank" style="color: white;  font-size:25px; padding:10px;" class="fa fa-whatsapp"></a>
                              </li>
                              </ul>

                         </div>
                    </div>

                    
               </div>
          </div>
         
     </footer>

</div>
   <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.sticky.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/wow.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/custom.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
  $(document).ready(function() {
    // Intercept form submission
    $('#add-contact-form').submit(function(e) {
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
                    text: 'Contact added successfully',
                });
                // Reset form
                $('#add-contact-form')[0].reset();
            },
            error: function(xhr, status, error) {
                // SweetAlert2 error message
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: 'Failed to add contact. Please try again later.',
                });
            }
        });
    });
});

</script>
</body>
</html>