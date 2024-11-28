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

<?php include 'header.php' ?>

<body>
<?php include 'navbar.php' ?>
    <div id="videoContainer" class="mobile-background">
        <div class="container-fluid d-flex justify-content-center align-items-center align-content-center video-parallax-container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center typewriter" style="color: #ffffff;font-size: 67px;font-family: Roboto, sans-serif;text-shadow: 4px 4px 4px #000000;">Your title goes here&nbsp;&nbsp;</h1>
                    <p class="text-center" style="color: rgb(255,255,255);font-size: 29px;">Still not vaccinated?&nbsp;<a class="btn btn-primary" role="button" style="background: rgb(0,153,51);font-family: Roboto, sans-serif;font-size: 23px;border-style: none;" href="regformadmin.php">REGISTER NOW!</a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="p-5 mb-4 bg-light round-3">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold" style="color: rgb(0,153,51);">San Nicolas RHU (Rural Health Unit)</h1>
            <p class="col-md-8 fs-4">A health unit that provides comprehensive and primary health care services to the townspeople of San Nicolas. The Health Care team provides proper consultations, laboratory tests, and treatments that people need and deserve.</p>
        </div>
    </div>
    <div class="d-flex justify-content-center align-items-center" style="padding: 20px;margin: 8px;"><iframe class="shadow-lg d-flex justify-content-center align-items-center" allowfullscreen="" frameborder="0" src="https://www.youtube.com/embed/vg5ZfIZNVO4?autoplay=1&amp;mute=1&amp;loop=1&amp;playlist=vg5ZfIZNVO4" width="560" height="315"></iframe></div>
    <div class="d-flex justify-content-center align-items-center" style="padding: 20px;margin: 8px;"><iframe src="https://free.timeanddate.com/clock/i860qgq3/n145/tlph/fs34/fc093/tceee/pct/ftb/bas3/bac999/tt0/th2" frameborder="0" width="736" height="46" allowtransparency="true"></iframe>
<br></div>
    <div>
        <hr>
        <h1 style="text-align: center;padding: 0px;margin: 15px;font-family: Roboto, sans-serif;color: rgb(0,153,51);"><strong>FREQUENTLY ASK QUESTIONS</strong><br></h1>
    </div>
    <div class="carousel slide" data-bs-ride="carousel" id="carousel-1" style="height: 600px;">
        <div class="carousel-inner h-100">
            <div class="carousel-item active h-100"><img class="w-100 d-block position-absolute h-100 fit-cover" src="assets/img/faq1.png" alt="Slide Image" style="z-index: -1;"></div>
            <div class="carousel-item h-100"><img class="w-100 d-block position-absolute h-100 fit-cover" src="assets/img/faq2.png" alt="Slide Image" style="z-index: -1;"></div>
            <div class="carousel-item h-100"><img class="w-100 d-block position-absolute h-100 fit-cover" src="assets/img/faq3.png" alt="Slide Image" style="z-index: -1;"></div>
            <div class="carousel-item h-100"><img class="w-100 d-block position-absolute h-100 fit-cover" src="assets/img/faq4.png" alt="Slide Image" style="z-index: -1;"></div>
            <div class="carousel-item h-100"><img class="w-100 d-block position-absolute h-100 fit-cover" src="assets/img/faq5.png" alt="Slide Image" style="z-index: -1;"></div>
            <div class="carousel-item h-100"><img class="w-100 d-block position-absolute h-100 fit-cover" src="assets/img/faq6.png" alt="Slide Image" style="z-index: -1;"></div>
            <div class="carousel-item h-100"><img class="w-100 d-block position-absolute h-100 fit-cover" src="assets/img/faq7.png" alt="Slide Image" style="z-index: -1;"></div>
            <div class="carousel-item h-100"><img class="w-100 d-block position-absolute h-100 fit-cover" src="assets/img/faq8.png" alt="Slide Image" style="z-index: -1;"></div>
            <div class="carousel-item h-100"><img class="w-100 d-block position-absolute h-100 fit-cover" src="assets/img/faq9.png" alt="Slide Image" style="z-index: -1;"></div>
            <div class="carousel-item h-100"><img class="w-100 d-block position-absolute h-100 fit-cover" src="assets/img/faq10.png" alt="Slide Image" style="z-index: -1;"></div>
        </div>
        <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon"></span><span class="visually-hidden">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon"></span><span class="visually-hidden">Next</span></a></div>
        <ol class="carousel-indicators">
            <li data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carousel-1" data-bs-slide-to="1"></li>
            <li data-bs-target="#carousel-1" data-bs-slide-to="2"></li>
            <li data-bs-target="#carousel-1" data-bs-slide-to="3"></li>
            <li data-bs-target="#carousel-1" data-bs-slide-to="4"></li>
            <li data-bs-target="#carousel-1" data-bs-slide-to="5"></li>
            <li data-bs-target="#carousel-1" data-bs-slide-to="6"></li>
            <li data-bs-target="#carousel-1" data-bs-slide-to="7"></li>
            <li data-bs-target="#carousel-1" data-bs-slide-to="8"></li>
            <li data-bs-target="#carousel-1" data-bs-slide-to="9"></li>
        </ol>
    </div><div><br></div>
    <div>
        <hr>
        <h3 style="text-align: center;padding: 0px;margin: 15px;font-family: Roboto, sans-serif;color: rgb(0,153,51);"><strong>Generate your Vaccination Certificate in VaxCertPH. Click here:&nbsp;</strong><a href="https://vaxcert.doh.gov.ph/" target="_blank">https://vaxcert.doh.gov.ph/</a>&nbsp;</h3>
    </div>
    <div>
        <hr>
        <div class="d-flex align-items-center align-content-center"><img class="img-fluid d-flex align-items-center align-content-center" id="vaxcert" src="assets/img/DOH%20VaxCertPH%20Vaccination%20Certificate%20Philippines.jpeg" style="margin-bottom: 0px;margin-right: 0px;padding: 0px;"><img class="img-fluid d-flex align-items-center align-content-center" id="vaxcert-1" src="assets/img/020920223.jpg" style="margin-bottom: 0px;margin-right: 0px;padding: 0px;"></div>
        <hr>
        <h1 style="text-align: center;padding: 0px;margin: 15px;font-family: Roboto, sans-serif;color: rgb(0,153,51);"><strong>VACCINATION&nbsp;REPORT</strong><br></h1><!--Vaccination worlwide-->
<center><iframe src="https://public.domo.com/cards/31O7r" width="900" height="600" marginheight="0" marginwidth="0" frameborder="0"></iframe></center>
    </div>
    <div class="text-center">
        <p style="font-size: 25px;font-family: Roboto, sans-serif;text-align: center;">For more details in Philippines:</p><a class="btn btn-primary" role="button" style="text-align: center;font-family: Roboto, sans-serif;background: rgb(0,153,51);border-style: none;" href="https://app.powerbi.com/view?r=eyJrIjoiMzliZTBjZWQtNjcwYi00YmM3LWFjYjktZDNjYWRjNDdiMmJmIiwidCI6IjM3ZDFjZmJmLTM1NTMtNDc5ZS1iOGM0LTVhZDdkNjNkNDM4MyIsImMiOjEwfQ%3D%3D" target="_blank">CLICK HERE</a>
    </div>
    <div>
        <hr>
        <h1 style="text-align: center;padding: 0px;margin: 15px;font-family: Roboto, sans-serif;color: rgb(0,153,51);"><strong>CATEGORIES</strong><br></h1>
        <div class="row">
            <div class="col-sm-4 col-md-4">
                <div class="pricingTable purple">
                    <div class="pricingTable-header">
                        <h3 class="text-center">Priority Eligible A<br></h3><span></span>
                    </div>
                    <div class="pricing-plans"></div>
                    <div class="pricingContent">
                        <ul>
                            <li class="text-start">A1. Workers in Frontline Health Services</li>
                            <li class="text-start">A2. All Senior Citizens</li>
                            <li class="text-start">A3. Persons with Comorbidities</li>
                            <li class="text-start">A4. Frontline personnel in essential sectors, including uniformed personnel</li>
                            <li class="text-start">A5. Indigent Population</li>
                            <li class="text-start"></li>
                        </ul>
                    </div>
                    <div class="text-start pricingTable-sign-up"></div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4 text-start">
                <div class="text-start pricingTable green">
                    <div class="text-start pricingTable-header">
                        <h3 class="text-center">&nbsp;&nbsp;Priority Eligible B </h3>
                    </div>
                    <div class="text-start pricing-plans"></div>
                    <div class="text-start pricingContent">
                        <ul class="text-start">
                            <li class="text-start">B1. Teachers, Social Workers</li>
                            <li class="text-start">B2. Other Goverment Workers</li>
                            <li class="text-start">B3. Other Essential Workers</li>
                            <li class="text-start">B4. Socio-demographic groups at significantly higher risk other than senior citizens and poor population based on the NTHS-PR</li>
                            <li class="text-start">B5. Overseas Filipino Workers</li>
                            <li class="text-start">B6. Other Remaining Workforce</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-4">
                <div class="pricingTable yellow">
                    <div class="text-start pricingTable-header">
                        <h3 class="text-center">Priority Eligible C </h3>
                    </div>
                    <div class="text-start pricing-plans"></div>
                    <div class="text-start pricingContent">
                        <ul class="text-start">
                            <li class="text-start">C. Rest of the Filipino population not otherwise included in the above groups</li>
                        </ul>
                    </div>
                    <div class="pricingTable-sign-up"></div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <hr>
        <h1 style="text-align: center;padding: 0px;margin: 15px;font-family: Roboto, sans-serif;color: rgb(0,153,51);"><strong>VACCINE DETAILS</strong></h1>
        <section class="photo-gallery py-4 py-xl-5">
            <div class="container-fluid p-0">
                <div class="row g-0 mb-5">
                    <div class="col-md-8 col-xl-6 text-center mx-auto">
                        <h2 style="font-family: Roboto, sans-serif;">Know your Vaccine</h2>
                        <p class="w-lg-50" style="font-family: Roboto, sans-serif;font-size: 22px;">Be informed, Get your Vaccination Now!</p>
                    </div>
                </div>
                <div class="row g-0 row-cols-1 row-cols-md-2 row-cols-xl-3 photos" data-bss-baguettebox="">
                    <div class="col item"><a href="assets/img/vac1.jpg"><img class="img-fluid" src="assets/img/vac1.jpg"></a></div>
                    <div class="col item"><a href="assets/img/vac2.jpg"><img class="img-fluid" src="assets/img/vac2.jpg"></a></div>
                    <div class="col item"><a href="assets/img/vac3.jpg"><img class="img-fluid" src="assets/img/vac3.jpg"></a></div>
                    <div class="col item"><a href="assets/img/vac4.jpg"><img class="img-fluid" src="assets/img/vac4.jpg"></a></div>
                    <div class="col item"><a href="assets/img/vac5.jpg"><img class="img-fluid" src="assets/img/vac5.jpg"></a></div>
                    <div class="col item"><a href="assets/img/vac6.jpg"><img class="img-fluid" src="assets/img/vac6.jpg"></a></div>
                    <div class="col item"><a href="assets/img/vac7.jpg"><img class="img-fluid" src="assets/img/vac7.jpg"></a></div>
                    <div class="col item"><a href="assets/img/vac8.jpg"><img class="img-fluid" src="assets/img/vac8.jpg"></a></div>
                </div>
            </div>
        </section>
    </div>
    <div>
        <hr>
        <h1 style="text-align: center;padding: 0px;margin: 15px;font-family: Roboto, sans-serif;color: rgb(0,153,51);"><strong>COVID&nbsp;TRACKER</strong><br></h1><!--Covid 19 Tracker-->
<center><div class='tableauPlaceholder' id='viz1642886288492' style='position: relative'><object class='tableauViz'  style='display:none;'>
	<param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' /> 
	<param name='embed_code_version' value='3' /> 
	<param name='site_root' value='' />
	<param name='name' value='COVID-19CasesandDeathsinthePhilippines_15866705872710&#47;Home' />
	<param name='tabs' value='no' />
	<param name='toolbar' value='yes' />
	<param name='animate_transition' value='yes' />
	<param name='display_static_image' value='yes' />
	<param name='display_spinner' value='yes' />
	<param name='display_overlay' value='yes' />
	<param name='display_count' value='yes' />
	<param name='filter' value='publish=yes' /></object>
</div></center> 
<script src="assets/js/covidtracker.js"></script>
    </div>
    <footer class="text-white bg-dark">
        <div class="container py-4 py-lg-5">
            <div class="row justify-content-center">
                <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item">
                    <div><img class="rhulogo" src="assets/img/logorhu.png" style="width: 80px;height: 80px;"><span style="font-size: 19px;font-family: Roboto, sans-serif;"><strong>SAN NICOLAS RHU</strong></span></div><span style="font-family: Roboto, sans-serif;"><i class="fas fa-phone-alt"></i>&nbsp;0912-345-6789<br></span><span style="font-family: Roboto, sans-serif;"><i class="fas fa-envelope"></i>&nbsp;info@sannicolasrhu.com<br></span><span style="font-family: Roboto, sans-serif;"><i class="fab fa-facebook" style="font-size: 19px;"></i>&nbsp;<a href="https://www.facebook.com/sannicolas.rhu.9" style="color: rgb(255,255,255);" target="_blank">San Nicolas RHU</a>&nbsp;</span>
                    <ul class="list-unstyled">
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item">
                    <h3 class="fs-6 text-white" style="font-size: 35px;font-family: Roboto, sans-serif;">Quick Links</h3>
                    <ul class="list-unstyled" style="font-family: Roboto, sans-serif;">
                        <li style="font-family: Roboto, sans-serif;"><a class="link-light" href="about.php" style="font-size: 16px;font-family: Roboto, sans-serif;">About</a></li>
                        <li style="font-family: Roboto, sans-serif;"><a class="link-light" href="regformadmin.php" style="font-family: Roboto, sans-serif;">Registration Form</a></li>
                        <li style="font-family: Roboto, sans-serif;"><a class="link-light" href="services.php" style="font-family: Roboto, sans-serif;">Services</a></li>
                        <li style="font-family: Roboto, sans-serif;"><a class="link-light" href="announcement.php" style="font-family: Roboto, sans-serif;">Announcements</a></li>
                        <li style="font-family: Roboto, sans-serif;"><a class="link-light" href="contact.php" style="font-family: Roboto, sans-serif;">Contact Us</a></li>
                        <li style="font-family: Roboto, sans-serif;"><a class="link-light" href="logout.php" style="font-family: Roboto, sans-serif;">Log Out</a></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column item">
                    <h3 class="fs-6 text-white" style="font-family: Roboto, sans-serif;">Message Us</h3>
                    <ul class="list-unstyled" style="font-family: Roboto, sans-serif;">
                        <li style="font-family: Roboto, sans-serif;"></li>
                        <li style="font-family: Roboto, sans-serif;"></li>
                        <li style="font-family: Roboto, sans-serif;"></li>
                    </ul>
						<form method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>" autocomplete="on">
							<input class="border rounded-0 textbox-email" type="email" name="fb_email" placeholder="Your email Address..." style="font-size: 21px;font-family: Roboto, sans-serif;background: rgb(42,42,42);padding: 6px 2px;color: rgb(255,255,255);" autocomplete="on">
					<div>
					<br>
					</div>
							<textarea class="textarea-message" name="fb_message" style="color: rgb(255,255,255);background: rgb(42,42,42);height: 77px;margin: 0px;" placeholder="Your Message here..."></textarea><div><br></div>
								<input class="btn btn-primary" type="submit" style="width: 260px;height: 51px;background: rgb(254,142,23);border-style: none;" value="SEND">
						</form>
				</div>
                <div class="col-lg-3 text-center text-lg-start d-flex flex-column align-items-center order-first align-items-lg-start order-lg-last item social">
                    <div class="fw-bold d-flex align-items-center mb-2"></div><img class="d-flex justify-content-center align-items-center rhulogo" src="assets/img/resbakuna.png" style="width: 194px;height: 120px;text-align: left;"><img class="rhulogo" src="assets/img/doh.png" style="width: 182px;height: 67px;text-align: left;">
                </div>
            </div>
            <hr>
            <div class="d-flex justify-content-between align-items-center pt-3">
                <p class="mb-0">©FINAL PROJECT. All Rights Reserved. Designed by GROUP BMGA | BSIT 3-A</p>
            </div>
        </div>
    </footer>
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