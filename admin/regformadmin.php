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
	include("connections.php"); 
//for personal info
		$brims_id = $name = $sname = $fname = $mname = $suffix = $gender = $age = $birthday =  $birthplace = $address = $cnum = $email =
//feedback
		$fb_email = $fb_message =  "";

//Error
		$brims_idErr = $snameErr = $fnameErr = $mnameErr = $suffixErr = $genderErr = $ageErr = $birthdayErr =  $birthplaceErr = $addressErr = $cnumErr = $emailErr = "";

//AUTO ID number
	date_default_timezone_set('Asia/Manila');
	

		$get_id = mysqli_query($connections, "SELECT id FROM tbl_residentinfo");

			while($row_edit = mysqli_fetch_assoc($get_id)){

				$db_id = $row_edit["id"];
			}

$place = "BRIMS";
$code = rand(1,999);
$brims_id =  substr($place, 0, 5) . '-' . date('dmy') . '-' . $code . '-' . $db_id + 1;



	if ($_SERVER["REQUEST_METHOD"] == "POST"){

//part1
		if(empty ($_POST["brims_id"])){
			$brims_idErr = "Resident ID number is required!";
		} else {
			$brims_id = $_POST["brims_id"];
		}

		if(empty ($_POST["sname"])){
			$snameErr = "Surname is required!";
		} else {
			$sname = $_POST["sname"];
	//check if only contains letters and white space
			if (!preg_match("/^[a-zA-Z-' ]*$/",$sname)) {
				$snameErr = "Only letters and white space allowed";
			}
		}

		if(empty ($_POST["fname"])){
			$fnameErr = "First Name is required!";
		} else {
			$fname = $_POST["fname"];
	//check if only contains letters and white space
			if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
				$fnameErr = "Only letters and white space allowed";
			}
		}
//Not Required

		if(empty($_POST["mname"])){
			$mname ="";
		}else {
			$mname = $_POST["mname"];
	//check if only contains letters and white space
			if (!preg_match("/^[a-zA-Z-.' ]*$/",$mname)) {
				$mnameErr = "Only letters, dot and white space allowed";
			}  
		}	  
//Not Required

		if(empty($_POST["suffix"])) {
			$suffix = "";
		} else {
			$suffix = $_POST["suffix"];
	//check if only contains letters and white space
			if (!preg_match("/^[a-zA-Z-.' ]*$/",$suffix)) {
				$suffixErr = "Only letters, dot and white space allowed";
			}
		}

		if(empty ($_POST["gender"])){
			$genderErr = "Gender is required!";
		} else {
			$gender = $_POST["gender"];
		}

		if(empty ($_POST["age"])){
			$ageErr = "Age is required!";
		} else {
			$age = $_POST["age"];
		if ($age >=18 && $age <=125) {
			} else {
				$ageErr = "Age required for resident registration is 18 years old and up";
			}
		}

		if(empty ($_POST["birthday"])){
			$birthdayErr = "Birthday is required!";
		} else {
			$birthday = $_POST["birthday"];
		}
		
		if(empty ($_POST["birthplace"])){
			$birthplaceErr = "Birth Place is required!";
		} else {
			$birthplace = $_POST["birthplace"];
		}

		if(empty ($_POST["address"])){
			$addressErr = "Address is required!";
		} else {
			$address = $_POST["address"];
		}

		if(empty ($_POST["cnum"])){
			$cnumErr = "Contact Number is required!";
		} else {
			$cnum = $_POST["cnum"];
		}

		if(empty ($_POST["email"])){
			$emailErr = "Email is required!";
		} else {
			$email = $_POST["email"];
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

//name concatenation
	$name = $fname . " " . $mname . " " . $sname . " " . $suffix;


		if ($fb_email && $fb_message) {
			$query = mysqli_query($connections, "INSERT INTO tbl_feedback(email, feedback) VALUES ('$fb_email', '$fb_message')");

				echo "<script language='javascript'>alert('Your message is submitted')</script>";
				echo "<script>window.location.href='regformadmin.php';</script>";

		}

//validate  
	if ($brims_id && $sname && $fname && $gender  && $age && $birthday && $birthplace && $address && $cnum && $email){


		$check_email = mysqli_query($connections, "SELECT * FROM tbl_residentinfo WHERE email='$email'");

		$check_email_row = mysqli_num_rows($check_email);

	if($check_email_row > 0) {
		$emailErr = "Email is already registered!";
	
			}else {


//table
	$query = mysqli_query($connections, "INSERT INTO tbl_residentinfo(brimsidno, surname, firstname, middlename, suffix, gender, age, birthday, birthplace, address, contactnumber, email) VALUES('$brims_id', '$sname', '$fname', '$mname', '$suffix', '$gender', '$age', '$birthday', '$birthplace', '$address', '$cnum', '$email') ");
		
				echo "<script language='javascript'>alert('New Record has been inserted!')</script>";
				echo "<script>window.location.href='regformadmin.php';</script>";

	
			}

		}

	}

?>



<!DOCTYPE html>
<html lang="en">

<?php include("header.php"); ?>

<body>
   
<?php include("navbar.php"); ?>

<div style="text-align: center;">
	<br>
        <h2 style="border-color: #009933;color: #009933;"><strong>REGISTRATION FORM</strong></h2>
    </div>
    <div class="container-form">
        <div>
            <form method="POST" action="<?php htmlspecialchars("PHP_SELF"); ?>" autocomplete="on"  enctype="multipart/form-data">
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
							<input type="hidden" id ="textbox" name="name" value="<?php echo $name; ?>">
							<input class="form-control" type="text" style="margin: 7px;margin-left: 0px;font-family: Roboto, sans-serif;" name="brims_id" value="<?php echo $brims_id; ?>" placeholder="Your ID" readonly></div>
							<span class="error"><?php echo $brims_idErr; ?></span>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-8 offset-md-1">
                                <p style="margin-left: 2%;font-family: Roboto, sans-serif;font-size: 20px;"><strong>Name:</strong><span style="color: var(--bs-red);">&nbsp;*</span></p>
                            </div>
                            <div class="col-md-10 offset-md-1">
							<input class="form-control" type="text" style="margin: 7px;margin-left: 0px;font-family: Roboto, sans-serif;" name="sname" value="<?php echo $sname; ?>" placeholder="Surname">
								<span class="error"><?php echo $snameErr; ?></span>
							<input class="form-control" type="text" style="margin: 7px;margin-left: 0px;font-family: Roboto, sans-serif;" name="fname" value="<?php echo $fname; ?>" placeholder="First Name">
								<span class="error"><?php echo $fnameErr; ?></span>
							<input class="form-control" type="text" style="margin: 7px;margin-left: 0px;font-family: Roboto, sans-serif;" name="mname" value="<?php echo $mname; ?>" placeholder="Middle Name">
								<span class="error"><?php echo $mnameErr; ?></span>
							<input class="form-control" type="text" style="margin: 7px;margin-left: 0px;font-family: Roboto, sans-serif;" name="suffix" value="<?php echo $suffix; ?>" placeholder="Suffix">
								<span class="error"><?php echo $suffixErr; ?></span> 
							</div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;margin-top:-16px;">
                            <div class="col-md-8 offset-md-1" style="font-size: 20px;">
                                <p style="margin-left: 2%;font-family: Roboto, sans-serif;font-size: 20px;"><strong>Gender:</strong><span style="color: var(--bs-red);">&nbsp;*</span><strong> </strong></p>
                            </div>
                            <div class="col-md-10 offset-md-1">
                                <div class="form-check">
								<input class="form-check-input" type="radio" id="formCheck-1"  name="gender" <?php if (isset($gender) && $gender=="Male") echo "checked"; ?> value="Male">
									<label class="form-check-label" for="formCheck-1" style="font-family: Roboto, sans-serif;">Male</label></div>
                                <div class="form-check">
								<input class="form-check-input" type="radio" id="formCheck-2" name="gender" <?php if (isset($gender) && $gender=="Female") echo "checked"; ?> value="Female">
									<label class="form-check-label" for="formCheck-2" style="font-family: Roboto, sans-serif;">Female</label></div>
                                <div class="form-check">
								<input class="form-check-input" type="radio" id="formCheck-3" name="gender" <?php if (isset($gender) && $gender=="Other") echo "checked"; ?> value="Other">
									<label class="form-check-label" for="formCheck-3" style="font-family: Roboto, sans-serif;">Other</label>
									</div>
									<span class="error"><?php echo $genderErr; ?></span> 
                            </div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;margin-top:-16px;">
                            <div class="col-md-8 offset-md-1" style="font-size: 20px;">
                                <p style="margin-left: 2%;font-family: Roboto, sans-serif;font-size: 20px;"><strong>Age:</strong><span style="color: var(--bs-red);">&nbsp;*</span><strong> </strong></p>
                            </div>
                            <div class="col-md-10 offset-md-1"><input class="form-control" type="number" name="age" value="<?php echo $age; ?>"  placeholder="Enter your Age" style="font-family: Roboto, sans-serif;">
							<span class="error"><?php echo $ageErr; ?></span> 
							</div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-8 offset-md-1">
                                <p style="margin-left: 2%;font-family: Roboto, sans-serif;font-size: 20px;"><strong>Birth Date:</strong><span style="color: var(--bs-red);">&nbsp;*</span></p>
                            </div>
                            <div class="col-md-10 offset-md-1"><input class="form-control" style="font-family:Roboto, sans-serif;" name="birthday"  placeholder="dd-mm-yyyy" value="<?php echo $birthday; ?>" min="1896-01-01" max="2030-12-31" type="date">
								<span class="error"><?php echo $birthdayErr; ?></span> 
							</div>
								
						</div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-8 offset-md-1">
                                <p style="margin-left: 2%;font-family: Roboto, sans-serif;font-size: 20px;"><strong>Birth Place:</strong><span style="color: var(--bs-red);">&nbsp;*</span></p>
                            </div>
                            <div class="col-md-10 offset-md-1"><input class="form-control" type="text" style="margin-left:0px;font-family:Roboto, sans-serif;" name="birthplace" value="<?php echo $birthplace; ?>" placeholder="Enter your Birth Place">
							<span class="error"><?php echo $birthplaceErr; ?></span> 
							</div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-8 offset-md-1">
                                <p style="margin-left: 2%;font-family: Roboto, sans-serif;font-size: 20px;"><strong>Complete&nbsp;Address:</strong><span style="color: var(--bs-red);">&nbsp;*</span></p>
                            </div>
                            <div class="col-md-10 offset-md-1" style="font-family:Roboto, sans-serif;"><input class="form-control" type="text" style="margin-left:0px;" name="address" value="<?php echo $address; ?>"  placeholder="Enter your Address">
							<span class="error"><?php echo $addressErr; ?></span>
							</div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-8 offset-md-1">
                                <p style="margin-left: 2%;font-family: Roboto, sans-serif;font-size: 19px;"><strong>Contact Number:</strong><span style="color: var(--bs-red);">&nbsp;*</span></p>
                            </div>
                            <div class="col-md-10 offset-md-1"><input class="form-control" type="number" name="cnum" value="<?php echo $cnum; ?>" placeholder="Enter your Number" style="font-family: Roboto, sans-serif;">
							<span class="error"><?php echo $cnumErr; ?></span>
							</div>
                        </div>
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-md-8 offset-md-1">
                                <p style="margin-left: 2%;font-family: Roboto, sans-serif;font-size: 20px;"><strong>Email:</strong><span style="color: var(--bs-red);">&nbsp;*</span></p>
                            </div>
                            <div class="col-md-10 offset-md-1"><input class="form-control" type="email" style="font-family: Roboto, sans-serif;" name="email" value="<?php echo $email; ?>" placeholder="Enter your Email">
							<span class="error"><?php echo $emailErr; ?></span>
							</div>
                        </div>
                     
                       
                     
                        <div class="row" style="margin-right:0px;margin-left:0px;padding-top:24px;">
                            <div class="col-12 col-md-4 offset-md-4 d-flex align-items-center align-content-center" style="width: 252.646px;height: 62px;">
							<button class="btn btn-light btn-lg" style="font-family: Roboto, sans-serif;background: rgb(191,192,194);" type="reset" onclick="return confirm_reset();" >CLEAR</button>
							<button class="btn btn-light btn-lg" style="margin-left: 16px;color: rgb(255,255,255);background: #009933;" type="submit">SUBMIT</button></div>
                        
                    </div>
                </div>
            </form>
        </div>
    </div>
	
<div class="bootstrap_datatables">
<div class="container py-5">
  <header class="text-center text-black">
      <h2 class="display-4"><b>PERSONAL INFORMATION TABLE</b></h2>
  </header>
  <div class="row py-5">
    <div class="col-lg-10 mx-auto">
      <div class="card rounded shadow border-0">
        <div class="card-body p-5 bg-white rounded">
          <div class="table-responsive">
            <table id="example" style="width:100%" class="table table-striped table-bordered">
 
 
<?php
include("connections.php");

$sql = "SELECT * FROM tbl_residentinfo";

if ($result = mysqli_query($connections, $sql)) {
	$rowcount = mysqli_num_rows($result);
	echo "<p style='text-align: left;' class='col-md-8 fs-4'>Total Record: " . $rowcount . "</p>";
}


$view_query = mysqli_query($connections, "SELECT * FROM tbl_residentinfo ORDER BY id ASC ");


echo "<thead>
<tr>
	<th>Resident ID number</th>
	<th>Surname</th>
	<th>First Name</th>
	<th>Middle Name</th>
	<th>Suffix</th>
	<th>Gender</th>
	<th>Age</th>
	<th>Birthday</th>
	<th>Birth Place</th>
	<th>Complete Address</th>
	<th>Contact Number</th>
	<th>Email</th>
	<th>Option</th>
	
</tr>
</thead>";


while ($row = mysqli_fetch_assoc($view_query)) {
	
	$user_id = $row["id"];
	$db_brimsidno = $row["brimsidno"];
	$db_surname = $row["surname"];
	$db_firstname = $row["firstname"];
	$db_middlename = $row["middlename"];
	$db_suffix = $row["suffix"];
	$db_gender = $row["gender"];
	$db_age = $row["age"];
	$db_birthday = $row["birthday"];
	$db_birthplace = $row["birthplace"];
	$db_address = $row["address"];
	$db_contactnumber = $row["contactnumber"];
	$db_email = $row["email"];
	
		
		
		
	echo "<tbody>
	<tr>
		<td>$db_brimsidno</td>
		<td>$db_surname</td>
		<td>$db_firstname</td>
		<td>$db_middlename</td>
		<td>$db_suffix</td>
		<td>$db_gender</td>
		<td>$db_age</td>
		<td>$db_birthday</td>
		<td>$db_birthplace</td>
		<td>$db_address</td>
		<td>$db_contactnumber</td>
		<td>$db_email</td>
		<td>
		<a style='text-decoration:none; color:#009933;' href='editinfo.php?id=$user_id'>Update</a>
		&nbsp;
		<a  style='text-decoration:none; color:red;' href='confirmdelete.php?brimsidno=$db_brimsidno' id='delete'>Delete</a>
		
		</td>
	</tr>
</tbody>";

}

?>

            </table>
          </div>
        </div>
      </div>
    </div>
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
	<script>
	function confirm_reset() {
		return confirm("Are you sure you want to reset all input text?");
}
</script>
</body>

</html>