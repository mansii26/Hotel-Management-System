<?php
		include('include/connection.php');
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        
	session_start();
if(isset($_POST["login"]))
					{
						$sql="select * from doctors where Mobile_No='{$_POST["Mobile_No"]}'and Password='{$_POST["Password"]}'";
						$res=$conn->query($sql);
                        
						if($res->num_rows>0)
						{
							$ro=$res->fetch_assoc();
							$_SESSION["Doctor_id"]=$ro["Doctor_id"];
							$_SESSION["Mobile_No"]=$ro["Mobile_No"];
                            $_SESSION["DFirstName"]=$ro["DFirstName"];
                            $_SESSION["Doc_img"]=$ro["Doc_img"];
							$_SESSION['logged_in'] = true;
                            header("Location: index.php"); // Redirect to the dashboard or the next page
                            exit();
						}
						else
						{
							echo "<script>alert<div class='error'>Invalid Username Or Password</div></script>";
						}
					}
				
				
?>

<!DOCTYPE html>
<html>
<title>Admin Login</title>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="admin/assets/img/favicon.ico">
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
    background-image: url(../images/slider3.jpg);
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
                    <form action="" class="form-signin" method="post">
						<div class="account-logo">
                            <a href="index.php"><img src="assets/img/logo-dark.png" alt=""></a>
                            <h4>Doctor Login</h4>
                        </div>
                        <div class="form-group">
                            <label>Mobile No</label>
                            <input type="text" autofocus="" class="form-control" name="Mobile_No">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="Password">
                        </div>
                        <div class="form-group text-right">
                            <a href="forget_pass.php">Forgot your password?</a>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary account-btn" name="login" id="login">Login</button>
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