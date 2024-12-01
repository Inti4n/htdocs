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
					echo "<script>window.location.href='confirmdelete.php';</script>";
				}
			}
?>

<!--End of Feedback-->



<!DOCTYPE html>
<html lang="en">

<?php include("header.php"); ?>

<body>
<?php include("navbar.php"); ?>
   <div style="text-align: center;">
        <div class="p-5 mb-4 bg-light round-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Delete Now</h1>
				
<?php

$db_brimsidno = $_REQUEST["brimsidno"];

include("connections.php");

$query_delete = mysqli_query($connections, "SELECT * FROM tbl_residentinfo WHERE brimsidno = '$db_brimsidno' ");

	while($row_delete = mysqli_fetch_assoc($query_delete)){
		$user_id = $row_delete["id"];
		$db_brimsidno = $row_delete["brimsidno"];
		$db_surname = $row_delete["surname"];
		$db_firstname = $row_delete["firstname"];	
		$db_middlename = $row_delete["middlename"];
		$db_suffix = $row_delete["suffix"];	
		$db_gender = $row_delete["gender"];
		$db_age = $row_delete["age"];	
		$db_birthday = $row_delete["birthday"];
		$d_birthplace = $row_delete["birthplace"];
		$db_address = $row_delete["address"];
		$db_contactnumber = $row_delete["contactnumber"];
		$db_email = $row_delete["email"];		
	}
	
	echo  "<p style='text-align: left;' class='col-md-8 fs-4'> Are you sure you want to delete <br> $db_brimsidno - $db_firstname $db_middlename $db_surname $db_suffix ? </p>";
?>				
				
	<form method="POST" action="Delete_Now1.php" autocomplete="on">

		<input type="hidden" name="db_brimsidno" value="<?php echo $db_brimsidno; ?>">
			<button class="btn btn-light btn-lg" style="margin-left: 16px;color: rgb(255,255,255);background: #009933;" type="submit">YES</button>
				<a class="btn btn-light btn-lg" role="button" style="margin-left: 16px;color: rgb(255,255,255);background: #fe8e17;" href="regformadmin.php">NO</a>

	</form>
				
              
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