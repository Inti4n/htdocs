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


<?php
//For Personal Info
$user_id = $_REQUEST["id"];

//$user_id;

include("connections.php");


$get_record = mysqli_query($connections, "SELECT * FROM tbl_residentinfo WHERE id='$user_id'");



while($row_edit = mysqli_fetch_assoc($get_record)){

			$db_brimsidno = $row_edit["brimsidno"];
			$db_surname = $row_edit["surname"];
			$db_firstname = $row_edit["firstname"];
			$db_middlename = $row_edit["middlename"];
			$db_suffix = $row_edit["suffix"];
			$db_gender = $row_edit["gender"];
			$db_age = $row_edit["age"];
			$db_birthday = $row_edit["birthday"];
			$db_birthplace = $row_edit["birthplace"];
			$db_address = $row_edit["address"];
			$db_contactnumber = $row_edit["contactnumber"];
			$db_email = $row_edit["email"];

}

//name concatenation
$db_name = $db_firstname . " " . $db_middlename . " " . $db_surname . " " . $db_suffix;
 
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
					echo "<script>window.location.href='editinfo.php';</script>";
				}
			}
?>

<!--End of Feedback-->


<!DOCTYPE html>
<html lang="en">

<?php include("header.php"); ?>

<body>
<?php include("navbar.php"); ?>

<br>
 <div style="text-align: center;">
        <h2 style="border-color: #009933;color: #009933;"><strong>REGISTRATION FORM</strong></h2>
    </div>
    <div class="container">
        <div>
            <form method="POST" action="Update_Record_Info.php" autocomplete="on">
                <div class="form-group mb-3">
                    <div id="formdiv">
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col">
                                <h4 style="border-color: #009933;color: rgb(254,142,23);"><strong>PERSONAL&nbsp;INFORMATION</strong></h4>
                                <p style="height: 24px;font-size: 21px;color: var(--bs-red);">* Required</p>
                            </div>
                            <div class="col-md-8 offset-md-1">
                                <p style="margin-left: 2%;font-family: Roboto, sans-serif;font-size: 20px;"><strong>ID&nbsp;No.:</strong><span style="color: var(--bs-red);">&nbsp;*</span></p>
                            </div>
                            <div class="col-md-10 offset-md-1">
							<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
							<input type="hidden" name="new_db_name" value="<?php echo $db_name; ?>">
							<input class="form-control" type="text" style="margin: 7px;margin-left: 0px;font-family: Roboto, sans-serif;" name="new_resident_id" value="<?php echo $db_brimsidno; ?>" placeholder="Your ID" readonly></div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-8 offset-md-1">
                                <p style="margin-left: 2%;font-family: Roboto, sans-serif;font-size: 20px;"><strong>Name:</strong><span style="color: var(--bs-red);">&nbsp;*</span></p>
                            </div>
                            <div class="col-md-10 offset-md-1"><input class="form-control" type="text" style="margin: 7px;margin-left: 0px;font-family: Roboto, sans-serif;" name="new_sname" value="<?php echo $db_surname; ?>"  placeholder="Surname" >
							<input class="form-control" type="text" style="margin: 7px;margin-left: 0px;font-family: Roboto, sans-serif;" name="new_fname" value="<?php echo $db_firstname; ?>" placeholder="First Name" >
							<input class="form-control" type="text" style="margin: 7px;margin-left: 0px;font-family: Roboto, sans-serif;" name="new_mname" value="<?php echo $db_middlename; ?>" placeholder="Middle Name" >
							<input class="form-control" type="text" style="margin: 7px;margin-left: 0px;font-family: Roboto, sans-serif;" name="new_suffix" value="<?php echo $db_suffix; ?>" placeholder="Suffix" ></div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;margin-top:-16px;">
                            <div class="col-md-8 offset-md-1" style="font-size: 20px;">
                                <p style="margin-left: 2%;font-family: Roboto, sans-serif;font-size: 20px;"><strong>Gender:</strong><span style="color: var(--bs-red);">&nbsp;*</span><strong> </strong></p>
                            </div>
                            <div class="col-md-10 offset-md-1">
                                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-1" name="new_gender" <?php if (isset($db_gender) && $db_gender=="Male") echo "checked"; ?> value="Male">
									<label class="form-check-label" for="formCheck-1" style="font-family: Roboto, sans-serif;">Male</label></div>
                                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-2" name="new_gender" <?php if (isset($db_gender) && $db_gender=="Female") echo "checked"; ?> value="Female">
									<label class="form-check-label" for="formCheck-2" style="font-family: Roboto, sans-serif;">Female</label></div>
                                <div class="form-check"><input class="form-check-input" type="radio" id="formCheck-3" name="new_gender" <?php if (isset($db_gender) && $db_gender=="Other") echo "checked"; ?> value="Other">
									<label class="form-check-label" for="formCheck-3" style="font-family: Roboto, sans-serif;">Other</label></div>
                            </div>
							
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;margin-top:-16px;">
                            <div class="col-md-8 offset-md-1" style="font-size: 20px;">
                                <p style="margin-left: 2%;font-family: Roboto, sans-serif;font-size: 20px;"><strong>Age:</strong><span style="color: var(--bs-red);">&nbsp;*</span><strong> </strong></p>
                            </div>
                            <div class="col-md-10 offset-md-1"><input class="form-control" type="number"  placeholder="Enter your Age" style="font-family: Roboto, sans-serif;" name="new_age" value="<?php echo $db_age; ?>" min="1" max="125"></div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-8 offset-md-1">
                                <p style="margin-left: 2%;font-family: Roboto, sans-serif;font-size: 20px;"><strong>Birth Date:</strong><span style="color: var(--bs-red);">&nbsp;*</span></p>
                            </div>
                            <div class="col-md-10 offset-md-1"><input class="form-control" style="font-family:Roboto, sans-serif;"  name="new_birthday"  placeholder="dd-mm-yyyy" value="<?php echo $db_birthday; ?>" min="1896-01-01" max="2030-12-31" type="date" ></div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-8 offset-md-1">
                                <p style="margin-left: 2%;font-family: Roboto, sans-serif;font-size: 20px;"><strong>Birth Place:</strong><span style="color: var(--bs-red);">&nbsp;*</span></p>
                            </div>
                            <div class="col-md-10 offset-md-1"><input class="form-control" type="text" style="margin-left:0px;font-family:Roboto, sans-serif;"  name="new_birthplace" value="<?php echo $db_birthplace; ?>" placeholder="Enter your Birth Place" ></div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-8 offset-md-1">
                                <p style="margin-left: 2%;font-family: Roboto, sans-serif;font-size: 20px;"><strong>Complete&nbsp;Address:</strong><span style="color: var(--bs-red);">&nbsp;*</span></p>
                            </div>
                            <div class="col-md-10 offset-md-1" style="font-family:Roboto, sans-serif;"><input class="form-control" type="text" style="margin-left:0px;" name="new_address" value="<?php echo $db_address; ?>"  placeholder="Enter your Address" ></div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-8 offset-md-1">
                                <p style="margin-left: 2%;font-family: Roboto, sans-serif;font-size: 19px;"><strong>Contact Number:</strong><span style="color: var(--bs-red);">&nbsp;*</span></p>
                            </div>
                            <div class="col-md-10 offset-md-1"><input class="form-control" type="number"  placeholder="Enter your Number" style="font-family: Roboto, sans-serif;" name="new_cnum" value="<?php echo $db_contactnumber; ?>"></div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-8 offset-md-1">
                                <p style="margin-left: 2%;font-family: Roboto, sans-serif;font-size: 20px;"><strong>Email:</strong><span style="color: var(--bs-red);">&nbsp;*</span></p>
                            </div>
                            <div class="col-md-10 offset-md-1"><input class="form-control" type="email"  style="font-family: Roboto, sans-serif;" name="new_email" value="<?php echo $db_email; ?>" placeholder="Enter your Email"></div>
                        </div>
                  
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-12 col-md-4 offset-md-4 d-flex align-items-center align-content-center" style="width: 252.646px;height: 62px;"><button class="btn btn-light btn-lg" style="margin-left: 16px;color: rgb(255,255,255);background: #009933;" type="submit">UPDATE</button><a class="btn btn-light btn-lg" role="button" style="margin-left: 16px;color: rgb(255,255,255);background: #fe8e17;" href="regformadmin.php">BACK</a></div>
                        </div>
                    </div>
                </div>
            </form>
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