<?php
include("connections.php");
//feedback
	$fb_email = $fb_message =  "";
//login
	$email = $password = "";
	$emailErr = $passwordErr = "";

		if($_SERVER["REQUEST_METHOD"] == "POST") {
			
			if (empty($_POST["email"])) {
				$emailErr = "Email is required!";
			} else {
				$email = $_POST["email"];
			}

			if (empty($_POST["password"])) {
				$passwordErr = "Password is required!";
			} else {
				$password = $_POST["password"];
			}

			if ($email && $password) {
					$check_email = mysqli_query($connections, "SELECT * FROM tbl_account WHERE email='$email'");
					$check_email_row = mysqli_num_rows($check_email);

				if($check_email_row > 0) {
	
					while($row = mysqli_fetch_assoc($check_email)) {
						$user_id = $row["id"];
						$db_password = $row["password"];
						$db_account_type = $row["account_type"];
		
						if($password == $db_password) {
			
							session_start();
			
								$_SESSION["id"] = $user_id;
			
							if ($db_account_type == "1") {
								echo "<script language='javascript'>alert('Login Successfully!')</script>";
								echo "<script>window.location.href='admin/index.php';</script>";
							}else {
								echo "<script language='javascript'>alert('Login Successfully!')</script>";
								echo "<script>window.location.href='user/index.php';</script>";	
							}
						}else {
						$passwordErr = "Password is incorrect!";
						}
					}
				}else {
					$emailErr = "Email is not Registered!";
				}
			}
			
			if(empty($_POST["fb_email"])){
			$fb_email ="";
		}else {
			$fb_email = $_POST["fb_email"];
		}

		if(empty($_POST["fb_message"])){
			$fb_message ="";
		}else {
			$fb_message = $_POST["fb_message"];
		}

		if ($fb_email && $fb_message) {
			$query = mysqli_query($connections, "INSERT INTO tbl_feedback(email, feedback) VALUES ('$fb_email', '$fb_message')");

				echo "<script language='javascript'>alert('Your message is submitted')</script>";
				echo "<script>window.location.href='login.php';</script>";

			}	
		}
?>



<!DOCTYPE html>
<html lang="en">
	
<?php include 'header.php' ?>

<body>
<?php include 'navbar.php' ?>

    <div class="container-fluid">
        <div class="row mh-100vh">
            <div class="col-10 col-sm-8 col-md-6 col-lg-6 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block">
                <div class="m-auto w-lg-75 w-xl-50">
                    <h2 style="font-size: 35px;text-align: center;font-family: Roboto, sans-serif;color: #009933;"><img class="brimslogo" src="assets/img/brimslogo.png"><br>Barangay Records and Information Management System<br></h2>
                    <h5><span style="color: var(--bs-red);">* Required</span><br></h5>
                    <form method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>" autocomplete="on">
                        <div class="form-group mb-3">
							<label  for="email" class="form-label text-secondary">Email:&nbsp;<span style="color: var(--bs-red);">&nbsp;*</span></label>
								<input class="form-control" type="email" name="email" value="<?php echo $email; ?>" placeholder="Email Address">
									<span style="color:red"><?php echo $emailErr; ?></span>
						</div>
                        <div class="form-group mb-3">
							<label for="password" class="form-label text-secondary">Password:&nbsp;<span style="color: var(--bs-red);">&nbsp;*</span></label>
								<input class="form-control" type="password" name="password" value="" placeholder="Password">
									<span style="color:red"><?php echo $passwordErr; ?></span>  <br>
						</div>		
									<button class="btn btn-info mt-2" type="submit" style="color: rgb(255,255,255);background: rgb(254,142,23);border-style: none;">LOG IN</button>
                        <div>
						<a class="btn btn-info mt-2" role="button" href="index.php" style="color: rgb(255,255,255);background: rgb(0,153,51);border-style: none;">BACK</a></div>
                    </form>
                    <p>Don't have an account yet? Sign up Now!</p>
                    <div><a class="btn btn-info mt-2" role="button" href="signup.php" style="color: rgb(255,255,255);background: rgb(0,153,51);border-style: none;">SIGN UP</a></div><p class="mt-3 mb-0"><a class="small" href="#" style="color: #009933;">Forgot your email or password?</a></p>
                </div>
            </div>
            <div class="col-lg-6 d-flex align-items-end" id="bg-block" style="background-image:url(&quot;assets/img/buildings.jpg&quot;);background-size:cover;background-position:center center;">
                <p class="ms-auto small text-dark mb-2"><br></p>
            </div>
        </div>
    </div>

    <?php include 'footer.php' ?>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/Bootstrap-DataTables.js"></script>
    <script src="assets/js/covidtracker.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="assets/js/Lightbox-Gallery.js"></script>
    <script src="assets/js/myScript.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
    <script src="assets/js/Video-Parallax-Background-v3.js"></script>
</body>

</html>