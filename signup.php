<?php
	include("connections.php"); 
//for personal info
		$username = $email = $password = $cpassword =
//feedback
		$fb_email = $fb_message =  "";

//Error
		$usernameErr = $emailErr = $passwordErr = $cpasswordErr = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST"){


		if(empty ($_POST["username"])){
			$usernameErr = "Username is required!";
		} else {
			$username = $_POST["username"];
		}
		
		if(empty ($_POST["email"])){
			$emailErr = "Email is required!";
		} else {
			$email = $_POST["email"];
		}

		if(empty ($_POST["password"])){
			$passwordErr = "Password is required!";
		} else {
			$password = $_POST["password"];
		}

		if(empty ($_POST["cpassword"])){
			$cpasswordErr = "Confirm Password is required!";
		} else {
			if(($_POST["password"]) === ($_POST["cpassword"])) {
				$cpassword = $_POST["cpassword"];
	
			} else {
				$cpasswordErr = "Password do not match";
			}
		}

		if(empty($_POST["fb_email"])){
			$fb_email ="";
		} else {
			$fb_email = $_POST["fb_email"];
		}

		if(empty($_POST["fb_message"])){
			$fb_message ="";
		} else {
			$fb_message = $_POST["fb_message"];
		}

		if ($fb_email && $fb_message) {
			$query = mysqli_query($connections, "INSERT INTO tbl_feedback(email, feedback) VALUES ('$fb_email', '$fb_message')");

				echo "<script language='javascript'>alert('Your message is submitted')</script>";
				echo "<script>window.location.href='signup.php';</script>";

		}

//validate  
		if ($username && $email && $password && $cpassword){


		$check_email = mysqli_query($connections, "SELECT * FROM tbl_account WHERE email='$email'");

		$check_email_row = mysqli_num_rows($check_email);

	if($check_email_row > 0) {
		$emailErr = "Email is already registered!";
	
			}else {


//table
//part1 - vaccinee info
	$query = mysqli_query($connections, "INSERT INTO tbl_account(username, email, password, account_type) VALUES('$username', '$email', '$cpassword', '2') ");
				echo "<script language='javascript'>alert('New Record has been inserted!')</script>";
				echo "<script>window.location.href='index.php';</script>";

	
			}

		}

	}

?>


<script>
	function confirm_reset() {
		return confirm("Are you sure you want to reset all input text?");
}
</script>

<!DOCTYPE html>
<html lang="en">

<?php include("header.php"); ?>

<body>
<?php include("navbar.php"); ?>
    <div class="container-fluid">
        <div class="row mh-100vh">
            <div class="col-10 col-sm-8 col-md-6 col-lg-6 offset-1 offset-sm-2 offset-md-3 offset-lg-0 align-self-center d-lg-flex align-items-lg-center align-self-lg-stretch bg-white p-5 rounded rounded-lg-0 my-5 my-lg-0" id="login-block">
                <div class="m-auto w-lg-75 w-xl-50">
                    <h2 style="font-size: 35px;text-align: center;font-family: Roboto, sans-serif;color: #009933;"><img class="brimslogo" src="assets/img/brimslogo.png"><br>Barangay Record and Information Management System<br></h2>
                    <h3>Create Account</h3>
                    <h5><span style="color: var(--bs-red);">* Required</span><br></h5>
                    <form method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>" autocomplete="on"  enctype="multipart/form-data">
                        	<input type="hidden" name="user_id" value="<?php echo $user_id; ?>"> <br> <br>
						<div class="form-group mb-3">
							<label class="form-label text-secondary" for="username">Username:&nbsp;<span style="color: var(--bs-red);">&nbsp;*</span><br></label>
								<input class="form-control" type="text" name="username" value="<?php echo $username; ?>" placeholder="Username">
									<span style="color:red"><?php echo $usernameErr; ?></span>
						</div>
                        <div class="form-group mb-3">
							<label class="form-label text-secondary" for="email">Email:&nbsp;<span style="color: rgb(220, 53, 69);">*</span><br></label>
								<input class="form-control" type="email" name="email" value="<?php echo $email; ?>" placeholder="Email Address">
									<span style="color:red"><?php echo $emailErr; ?></span>
						</div>
                        <div class="form-group mb-3">
							<label class="form-label text-secondary" for="password">Password:&nbsp;<span style="color: rgb(220, 53, 69);">*</span><br></label>
								<input class="form-control" type="password" name="password" value="<?php echo $password; ?>" placeholder="Your Password">
									<span style="color:red"><?php echo $passwordErr; ?></span>
						</div>
                        <div class="form-group mb-3">
							<label class="form-label text-secondary" for="cpassword" >Confirm Password:&nbsp;<span style="color: rgb(220, 53, 69);">*</span><br></label>
								<input class="form-control" type="password" name="cpassword" value="<?php echo $cpassword; ?>" placeholder="Confirm your Password">
									<span style="color:red"><?php echo $cpasswordErr; ?></span> 
						</div>
                        <div>
                            <div class="d-flex justify-content-center">
								<button class="btn btn-info mt-2" type="submit" style="color: rgb(255,255,255);background: rgb(254,142,23);border-style: none;margin-left: 0px;margin-right: 10px;">SIGN UP</button>
									<div class="d-flex justify-content-center align-items-center" style="margin: 0px;padding: 0px;">
										<button class="btn btn-info text-center mt-2" type="reset" style="color: rgb(255,255,255);background: rgb(152,152,152);border-style: none;text-align: center;margin-right: 10px;" onclick="return confirm_reset();">RESET</button></div>
                                <div class="d-flex justify-content-center align-items-center"><a class="btn btn-info mt-2" role="button" href="index.php" style="color: rgb(255,255,255);background: rgb(0,153,51);border-style: none;">BACK</a></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 d-flex align-items-end" id="bg-block" style="background-image: url(&quot;assets/img/buildings3.jpg&quot;);background-size: cover;background-position: center center;">
                <p class="ms-auto small text-dark mb-2"><br></p>
            </div>
        </div>
    </div>

	<?php include("footer.php"); ?>

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