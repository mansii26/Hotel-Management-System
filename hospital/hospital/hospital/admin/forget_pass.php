<?php
		include('include/connection.php');
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

if(isset($_POST["send"])){
$email =$conn->real_escape_string($_POST['enter_email']);

					{
						$sql="select * from doctors where Email='$email'";
						$res=$conn->query($sql);
                        
						if($res->num_rows>0){
						
							header("Location: reset_pass.php");
						}
                        else
						{
							echo "<script>alert('Invalid email');</script>";
						}
                    }	
}
?>

<!DOCTYPE html>
<html>
<title>Admin Login</title>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <title>Preclinic - Medical & Hospital - Bootstrap 4 Admin Template</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
   
    <style>
*{
    padding: 0;
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
}
body{
    background-image: url(images/slider3.jpg);
    background-size: cover;
    background-position: 0px -50px;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    overflow: hidden;
}

</style>
</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
				<div class="account-box">
                    <form action=" " class="form-signin" method="post">
						<div class="account-logo">
                            <a href="index.php"><img src="assets/img/logo-dark.png" alt=""></a>
                        </div>
                        <div class="form-group">
                            <label>Enter Email</label>
                            <input type="email" autofocus="" class="form-control" name="enter_email">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary account-btn" name="send" id="send">send</button>
                        </div>
                        <div class="text-center register-link">
                            <a href="A_login.php">Back</a>
                        </div>
                    </form>
                </div>
			</div>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>


<!-- login23:12-->

      <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>let register_btn = document.querySelector(".Register-btn");
let login_btn = document.querySelector(".Login-btn");
let form = document.querySelector(".Form-box");
register_btn.addEventListener("click", () => {
  form.classList.add("change-form");
});
login_btn.addEventListener("click", () => {
  form.classList.remove("change-form");
});
</script>

</html>

  </body>
</html>