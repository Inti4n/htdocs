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
					echo "<script>window.location.href='about.php';</script>";
				}
			}
?>

<!--End of Feedback-->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>San Nicolas RHU - Vaccination Registration Form</title>
    <meta name="twitter:image" content="assets/img/logorhu.png">
    <meta property="og:image" content="assets/img/logorhu.png">
    <meta name="twitter:title" content="San Nicolas RHU - Vaccination Registration Form">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=ABeeZee">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/-Login-form-Page-BS4-.css">
    <link rel="stylesheet" href="assets/css/Bootstrap-DataTables.css">
    <link rel="stylesheet" href="assets/css/Hero-Carousel.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Links.css">
    <link rel="stylesheet" href="assets/css/Pretty-Search-Form.css">
    <link rel="stylesheet" href="assets/css/Pricing-Table-Style-01-1.css">
    <link rel="stylesheet" href="assets/css/Pricing-Table-Style-01.css">
    <link rel="stylesheet" href="assets/css/Responsive-Form-1.css">
    <link rel="stylesheet" href="assets/css/Responsive-Form.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Video-Parallax-Background-v3.css">
<link rel="shortcut icon" href="logorhu.png" type="images/png" />
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md py-3">
        <div class="container"><img class="rhulogo" src="assets/img/logorhu.png"><a class="navbar-brand d-flex align-items-center" href="index.php" style="font-family: Roboto, sans-serif;">
    <div class="d-inline-block"><span style="color: rgba(255,255,255,1);padding: 0px;"><strong>SAN NICOLAS RHU</strong><br /><span style="color: rgba(255,255,255,1);padding: 0px;font-size:12px"><p>Poblacion, San Nicolas, Batangas</p></span></span></div>
</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-3" style="text-align: right;"><span class="visually-hidden">Toggle navigation</span><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="color: rgba(255,255,255,1);font-size: 39px;opacity: 1;filter: brightness(100%);">
                    <path d="M2 6C2 5.44772 2.44772 5 3 5H21C21.5523 5 22 5.44772 22 6C22 6.55228 21.5523 7 21 7H3C2.44772 7 2 6.55228 2 6Z" fill="currentColor"></path>
                    <path d="M2 12.0322C2 11.4799 2.44772 11.0322 3 11.0322H21C21.5523 11.0322 22 11.4799 22 12.0322C22 12.5845 21.5523 13.0322 21 13.0322H3C2.44772 13.0322 2 12.5845 2 12.0322Z" fill="currentColor"></path>
                    <path d="M3 17.0645C2.44772 17.0645 2 17.5122 2 18.0645C2 18.6167 2.44772 19.0645 3 19.0645H21C21.5523 19.0645 22 18.6167 22 18.0645C22 17.5122 21.5523 17.0645 21 17.0645H3Z" fill="currentColor"></path>
                </svg></button>
            <div class="collapse navbar-collapse" id="navcol-3">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php" style="color: rgb(255,255,255);font-size: 16px;font-family: Roboto, sans-serif;">HOME</a></li>
                    <li class="nav-item" style="font-family: Roboto, sans-serif;"><a class="nav-link" href="about.php" style="color: rgb(255,255,255);font-family: Roboto, sans-serif;">ABOUT</a></li>
                    <li class="nav-item" style="color: rgb(255,255,255);font-family: Roboto, sans-serif;"><a class="nav-link" href="regformadmin.php" style="color: rgb(255,255,255);font-family: Roboto, sans-serif;">REGISTRATION FORM</a></li>
                    <li class="nav-item" style="color: rgb(255,255,255);font-family: Roboto, sans-serif;"><a class="nav-link" href="services.php" style="color: rgb(255,255,255);font-family: Roboto, sans-serif;">SERVICES</a></li>
                    <li class="nav-item" style="color: rgb(255,255,255);font-family: Roboto, sans-serif;"><a class="nav-link" href="announcement.php" style="color: rgb(255,255,255);font-family: Roboto, sans-serif;">ANNOUNCEMENT</a></li>
                    <li class="nav-item" style="color: rgb(255,255,255);font-family: Roboto, sans-serif;"><a class="nav-link" href="contact.php" style="color: rgb(255,255,255);font-family: Roboto, sans-serif;">CONTACT US</a></li>
                    &nbsp; &nbsp;
                    <li class="nav-item" style="color: rgb(255,255,255);font-family: Roboto, sans-serif;">
					<?php 
							echo $login; 
						?></li> 
					&nbsp; &nbsp;
                    <li class="nav-item" style="color: rgb(255,255,255);font-family: Roboto, sans-serif;"><a class="nav-link" href="search.php" style="color: rgb(255,255,255);font-family: Roboto, sans-serif;background: rgb(254,142,23);border-radius: 4px;border-width: 0px;font-size: 16px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none" style="font-size: 24px;">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M18.319 14.4326C20.7628 11.2941 20.542 6.75347 17.6569 3.86829C14.5327 0.744098 9.46734 0.744098 6.34315 3.86829C3.21895 6.99249 3.21895 12.0578 6.34315 15.182C9.22833 18.0672 13.769 18.2879 16.9075 15.8442C16.921 15.8595 16.9351 15.8745 16.9497 15.8891L21.1924 20.1317C21.5829 20.5223 22.2161 20.5223 22.6066 20.1317C22.9971 19.7412 22.9971 19.1081 22.6066 18.7175L18.364 14.4749C18.3493 14.4603 18.3343 14.4462 18.319 14.4326ZM16.2426 5.28251C18.5858 7.62565 18.5858 11.4246 16.2426 13.7678C13.8995 16.1109 10.1005 16.1109 7.75736 13.7678C5.41421 11.4246 5.41421 7.62565 7.75736 5.28251C10.1005 2.93936 13.8995 2.93936 16.2426 5.28251Z" fill="currentColor"></path>
                            </svg>&nbsp; SEARCH</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="d-flex justify-content-center align-items-center"><img class="img-fluid d-flex justify-content-center align-items-center searchbg" data-aos="flip-right" data-aos-duration="1000" src="assets/img/registration.png"></div><div><br><br></div>
    <div style="text-align: center;">
        <h2 style="border-color: #009933;color: #009933;"><strong>SECOND DOSE INFORMATION</strong></h2>
    </div>
    <div class="container">
        <div>
            <form>
                <div class="form-group mb-3">
                    <div id="formdiv">
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col">
                                <h4 class="text-start" style="border-color: #009933;color: rgb(254,142,23);font-size: 20px;text-align: center;"><strong>VACCINATION&nbsp;DETAILS</strong><br></h4>
                                <p style="height: 24px;font-size: 21px;color: var(--bs-red);">* Required</p>
                            </div>
                            <div class="col-md-8 offset-md-1">
                                <p style="margin-left: 2%;font-family: Roboto, sans-serif;font-size: 20px;"><strong>ID&nbsp;No.:</strong><span style="color: var(--bs-red);">&nbsp;*</span></p>
                            </div>
                            <div class="col-md-10 offset-md-1"><input class="form-control" type="text" style="margin: 7px;margin-left: 0px;font-family: Roboto, sans-serif;" name="name" placeholder="Your ID" required=""></div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-8 offset-md-1">
                                <p style="margin-left: 2%;font-family: Roboto, sans-serif;font-size: 20px;"><strong>Full Name:</strong><span style="color: var(--bs-red);">&nbsp;*</span></p>
                            </div>
                            <div class="col-md-10 offset-md-1"><input class="form-control" type="text" style="margin: 7px;margin-left: 0px;font-family: Roboto, sans-serif;" name="name" placeholder="Your Name" required=""></div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;margin-top:-16px;">
                            <div class="col-md-8 offset-md-1" style="font-size: 20px;">
                                <p style="margin-left: 2%;font-family: Roboto, sans-serif;font-size: 20px;"><strong>Dosage Sequence:</strong><span style="color: var(--bs-red);">&nbsp;*</span><strong> </strong></p>
                            </div>
                            <div class="col-md-10 offset-md-1">
                                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-11"><label class="form-check-label" for="formCheck-11">Left</label></div>
                                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-12"><label class="form-check-label" for="formCheck-12">Right</label></div>
                            </div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;margin-top:-16px;">
                            <div class="col-md-8 offset-md-1" style="font-size: 20px;">
                                <p style="margin-left: 2%;font-family: Roboto, sans-serif;font-size: 20px;"><strong>Vaccination Site:</strong><span style="color: var(--bs-red);">&nbsp;*</span><strong> </strong></p>
                            </div>
                            <div class="col-md-10 offset-md-1"><input class="form-control" type="text" placeholder="Enter the Vaccination Site" required=""></div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-8 offset-md-1">
                                <p style="margin-left: 2%;font-family: Roboto, sans-serif;font-size: 20px;"><strong>Vaccination Brand:</strong><span style="color: var(--bs-red);">&nbsp;*</span></p>
                            </div>
                            <div class="col-md-10 offset-md-1"><select class="form-select">
                                    <optgroup label="Choose a Brand">
                                        <option value="Pfizer-BioNTech" selected="">Pfizer-BioNTech</option>
                                        <option value="Oxford-AstraZeneca">Oxford-AstraZeneca</option>
                                        <option value="Moderna">Moderna</option>
                                        <option value="Johnson and Johnson's Janssen">Johnson and Johnson's Janssen</option>
                                        <option value="CoronaVac-Sinovac">CoronaVac-Sinovac</option>
                                        <option value="Gamaleya Sputnik V">Gamaleya Sputnik V</option>
                                        <option value="Sinopharm">Sinopharm</option>
                                        <option value="Bharat BioTech">Bharat BioTech</option>
                                    </optgroup>
                                </select></div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;margin-top:-16px;">
                            <div class="col-md-8 offset-md-1" style="font-size: 20px;">
                                <p style="margin-left: 2%;font-family: Roboto, sans-serif;font-size: 20px;"><strong>Batch Number:</strong><span style="color: var(--bs-red);">&nbsp;*</span><strong> </strong></p>
                            </div>
                            <div class="col-md-10 offset-md-1"><input class="form-control" type="text" required="" placeholder="Enter the Batch Number" style="font-family: Roboto, sans-serif;"></div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;margin-top:-16px;">
                            <div class="col-md-8 offset-md-1" style="font-size: 20px;">
                                <p style="margin-left: 2%;font-family: Roboto, sans-serif;font-size: 20px;"><strong>Lot Number:</strong><span style="color: var(--bs-red);">&nbsp;*</span><strong> </strong></p>
                            </div>
                            <div class="col-md-10 offset-md-1"><input class="form-control" type="text" required="" placeholder="Enter the Lot Number" style="font-family: Roboto, sans-serif;"></div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-8 offset-md-1">
                                <p style="margin-left: 2%;font-family: Roboto, sans-serif;font-size: 20px;"><strong>Date of Vaccination:</strong><span style="color: var(--bs-red);">&nbsp;*</span></p>
                            </div>
                            <div class="col-md-10 offset-md-1" style="font-family: Roboto, sans-serif;"><input class="form-control" type="date" required=""></div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-8 offset-md-1">
                                <p style="margin-left: 2%;font-family: Roboto, sans-serif;font-size: 20px;"><strong>Vaccinator's Name:</strong><span style="color: var(--bs-red);">&nbsp;*</span><br></p>
                            </div>
                            <div class="col-md-10 offset-md-1"><input class="form-control" type="text" placeholder="Enter Vaccinator's Name"></div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-8 offset-md-1">
                                <p style="margin-left: 2%;font-family: Roboto, sans-serif;font-size: 20px;"><strong>Signature:</strong><span style="color: var(--bs-red);">&nbsp;*</span><br></p>
                            </div>
                            <div class="col-md-10 offset-md-1"><input class="form-control" type="file" placeholder="Enter Vaccinator's Name"></div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-12 col-md-4 offset-md-4 d-flex align-items-center align-content-center" style="width: 252.646px;height: 62px;"><button class="btn btn-light btn-lg" style="font-family: Roboto, sans-serif;background: rgb(191,192,194);" type="reset">CLEAR</button><button class="btn btn-light btn-lg" style="margin-left: 16px;color: rgb(255,255,255);background: #009933;" type="submit">SUBMIT</button></div>
                            <div class="col-12 col-md-4 offset-md-4 d-flex align-items-center align-content-center" style="width: 252.646px;height: 77px;"><a class="btn btn-light btn-lg" role="button" style="font-family: Roboto, sans-serif;background: #fe8e17;font-size: 14px;color: rgb(255,255,255);width: 95.1562px;" href="seconddosepre.php">PRE-VAC</a><a class="btn btn-light btn-lg" role="button" style="margin-left: 16px;color: rgb(255,255,255);background: #fe8e17;font-size: 14px;width: 104.0625px;font-family: Roboto, sans-serif;" href="seconddosepost.php">POST-VAC</a></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div><div class="bootstrap_datatables">
<div class="container py-5">
  <header class="text-center text-black">
      <h2 class="display-4"><b>SECOND DOSE INFORMATION TABLE</b></h2>
  </header>
  <div class="row py-5">
    <div class="col-lg-10 mx-auto">
      <div class="card rounded shadow border-0">
        <div class="card-body p-5 bg-white rounded">
          <div class="table-responsive">
            <table id="example" style="width:100%" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>ID No.</th>
                  <th>Full Name</th>
                  <th>Dosage Sequence</th>
                  <th>Vaccination Site</th>
                  <th>Vaccination Brand</th>
                  <th>Batch Number</th>
                  <th>Lot Number</th>
                  <th>Date of Vaccination</th>
                  <th>Vaccinator's Name</th>
                    <th>Signature</th>
                   <th>Option</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>SNRHU-001</td>
                  <td>Ronn Rick C. Gahol</td>
                  <td>Left</td>
                  <td>San Nicolas RHU</td>
                  <td>Pfizer-BioNtech</td>
                  <td>ABCDE123</td>
                  <td>ABCDE123</td>
                  <td>05/30/2022</td>
                  <td>Russel Aseron</td>
                    <td>Image</td>
                     <td><a href="updatedetails2.php" style="text-decoration:none; color:#009933;" >Update</a></td>
                  </tr>
                  
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
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