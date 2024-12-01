<?php
	session_start();

		if (isset($_SESSION["id"])) {
	
			$user_id = $_SESSION["id"];
	
include("../connections.php");
			$get_record = mysqli_query($connections, "SELECT * FROM tbl_account WHERE id='$user_id'");
				
				while($row_edit = mysqli_fetch_assoc($get_record)) {
		
					$db_username = $row_edit["username"];
					$db_email = $row_edit["email"];
				}
				
			$login = "<p>Welcome<br> $db_username ! <br> <a style='color:#ffffff;' href='logout.php'>LOG OUT</a></p>";
	
		} else {
		
			$login = "<p>You must login<br> first! <a style='color:#ffffff;' href='../login.php'>Login now!</a></p>";
		
		}

?>


<!--Feedback-->
<?php

	include("connections.php"); 

		$fb_email = $fb_message =  "";

			if ($_SERVER["REQUEST_METHOD"] == "POST"){

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
					echo "<script>window.location.href='index.php';</script>";
				}
			}
?>

<!--End of Feedback-->
<!DOCTYPE html>
<html lang="en">

<?php include("header.php"); ?>

<body>
<?php include("navbar.php"); ?>
<div id="videoContainer" class="mobile-background">
        <div class="container-fluid d-flex justify-content-center align-items-center align-content-center video-parallax-container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center typewriter" style="color: #ffffff;font-size: 67px;font-family: Roboto, sans-serif;text-shadow: 4px 4px 4px #000000;">Your title goes here&nbsp;&nbsp;</h1>
                    <p class="text-center" style="color: rgb(255,255,255);font-size: 29px;">Do you need help?&nbsp;<a class="btn btn-primary" role="button" style="background: rgb(0,153,51);font-family: Roboto, sans-serif;font-size: 23px;border-style: none;" href="regformuser.php">REGISTER NOW!</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="p-5 mb-4 bg-light round-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold" style="color: rgb(0,153,51);">Barangay Records and Information Management System</h1>
            <p class="col-md-8 fs-4">A Barangay Record and Information Management System helps streamline processes for better service to the community. It provides an organized way to store, retrieve, and update resident and barangay records. With this system, local officials can respond to requests and concerns more efficiently. It promotes transparency and improves communication between the barangay and its constituents. Ultimately, it empowers the community by ensuring quick access to accurate information.</p>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center" style="padding: 20px;margin: 8px;"><iframe src="https://free.timeanddate.com/clock/i860qgq3/n145/tlph/fs34/fc093/tceee/pct/ftb/bas3/bac999/tt0/th2" frameborder="0" width="736" height="46" allowtransparency="true"></iframe>
        <br></div>


        <?php include("blogspot.php"); ?>
        <br>

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