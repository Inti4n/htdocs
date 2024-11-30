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

$search = $searchErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	
	if (empty ($_POST["search"])){
		
		$searchErr = "Required!";
		
	} else {
		
		$search = $_POST["search"];
		
		
	}
	
	if ($search){
		echo "<script>window.location.href='searchresult.php?search=$search';</script";
	}
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
					echo "<script>window.location.href='search.php';</script>";
				}
			}
?>

<!--End of Feedback-->

<!DOCTYPE html>
<html lang="en">
    
<?php include 'header.php' ?>

<body>
<?php include 'navbar.php' ?>
    <div>
        <div class="d-flex justify-content-center align-items-center"><img class="img-fluid d-flex justify-content-center align-items-center searchbg" data-aos="fade-up" data-aos-duration="1000" src="assets/img/customerservice.webp"></div>
        <div>
            <h1 style="text-align: center;color: #009933;">Heading</h1>
        </div>
        <div style="border-style: none;">
            <form class="d-flex justify-content-center align-items-center search-form" style="border-style: none;" method="POST" action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="on">
                <div class="input-group" style="width: 720px;"><span class="input-group-text" style="font-family: Roboto, sans-serif;font-size: 34px;"><i class="fa fa-search"></i></span>
				<input class="form-control" type="text" name="search" value="<?php echo $search; ?>" placeholder="I am looking for.." style="font-family: Roboto, sans-serif;">
					<button class="btn btn-light" type="submit" style="background: rgb(254,142,23);color: rgb(255,255,255);font-family: Roboto, sans-serif;font-size: 23px;">SEARCH</button>
						
					</div>
					&nbsp;<span style="color:red; font-size:20px;"><?php echo $searchErr; ?></span>
            </form>
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