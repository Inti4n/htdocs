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
					echo "<script>window.location.href='about.php';</script>";
				}
			}
?>


<!DOCTYPE html>
<html lang="en">
    
<?php include("header.php"); ?>

<body>
<?php include("navbar.php"); ?>

    <div class="d-flex justify-content-center align-items-center"><img class="img-fluid d-flex justify-content-center align-items-center bsmslogo" data-aos="zoom-in-up" data-aos-duration="1000" src="assets/img/bsms.png"></div>
    <div>
        <div>
            <hr>
            <h2 class="text-center" style="color: rgb(0,153,51);font-size: 50px;font-family: Roboto, sans-serif;"><strong>BARANGAY PROFILE</strong></h2>
            <p style="font-family: Roboto, sans-serif;text-align: justify;font-size: 20px;margin: 14px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit, quam vitae ultrices tristique, sem dui ornare diam, ac aliquam felis ipsum eu lectus. Sed in commodo est, ut dignissim enim. Sed lacinia nisi quam, mattis auctor tellus convallis eget. Vestibulum dictum aliquam cursus. Mauris ultrices dolor sed tellus tristique faucibus. Fusce interdum tellus eu nibh porttitor, at sodales est pellentesque. Etiam ut sollicitudin ipsum, ac bibendum risus. Sed sollicitudin, purus non egestas malesuada, nulla magna ultrices sapien, ac iaculis ligula est accumsan mauris. Nunc sapien lacus, lobortis finibus nunc sed, maximus lacinia massa. Donec accumsan nisl a magna ultricies elementum. Donec sodales cursus sodales.

</p>
    <hr>
    <h2 class="text-center" style="color: rgb(0,153,51);font-size: 50px;font-family: Roboto, sans-serif;"><strong>MISSION AND</strong>&nbsp;<strong>VISION</strong></h2>
    <p style="font-family: Roboto, sans-serif;text-align: justify;font-size: 20px;margin: 14px;"><strong>VISION -</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec hendrerit, quam vitae ultrices tristique, sem dui ornare diam, ac aliquam felis ipsum eu lectus. Sed in commodo est, ut dignissim enim. Sed lacinia nisi quam, mattis auctor tellus convallis eget. Vestibulum dictum aliquam cursus. Mauris ultrices dolor sed tellus tristique faucibus. Fusce interdum tellus eu nibh porttitor, at sodales est pellentesque. Etiam ut sollicitudin ipsum, ac bibendum risus. Sed sollicitudin, purus non egestas malesuada, nulla magna ultrices sapien, ac iaculis ligula est accumsan mauris. Nunc sapien lacus, lobortis finibus nunc sed, maximus lacinia massa. Donec accumsan nisl a magna ultricies elementum. Donec sodales cursus sodales.</p>
    <p style="font-family: Roboto, sans-serif;text-align: justify;font-size: 20px;margin: 14px;"><strong>MISSION -</strong>Vestibulum in odio ut sem tempor auctor. Suspendisse cursus tempor orci, at tristique nisl tincidunt et. Morbi at elit sodales, ultrices odio at, tincidunt nibh. Mauris molestie lorem lorem, ac elementum sem lacinia ut. Fusce lobortis accumsan purus vel scelerisque. Pellentesque at est quis magna bibendum aliquet eget ut felis. Sed ut sem justo. Nulla eleifend elit est, fringilla euismod erat tincidunt at. Donec vel lacus non mi commodo sodales a eget magna. Proin iaculis mauris lorem, non varius felis tempus non.</p>
    <div class="d-flex justify-content-center align-items-center"><img class="img-fluid d-flex justify-content-center align-items-center bsmslogo" data-aos="flip-left" data-aos-duration="1000" src="assets/img/communitybg.png"></div>
    
    
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