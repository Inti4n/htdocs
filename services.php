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
					echo "<script>window.location.href='services.php';</script>";
				}
			}
?>


<!DOCTYPE html>
<html lang="en">

<?php include 'header.php' ?>

<body>
<?php include 'navbar.php' ?>
    <div class="d-flex justify-content-center align-items-center"><img class="img-fluid d-flex justify-content-center align-items-center bsmslogo" data-aos="flip-up" data-aos-duration="1000" src="assets/img/complaint.png"></div>
    <div>
        <div>
            <hr>
            <h2 class="text-center" style="color: rgb(0,153,51);font-size: 50px;font-family: Roboto, sans-serif;"><strong>Download complaint letter</strong><br></h2>
        </div>
    </div>
            <p>Complaint Letter Download </p>
    <hr>
    <h2 class="text-center" style="color: rgb(0,153,51);font-size: 50px;font-family: Roboto, sans-serif;"><strong>Request Forms</strong><br></h2>
    

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