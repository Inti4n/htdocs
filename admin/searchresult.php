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
					echo "<script>window.location.href='searchresult.php';</script>";
				}
			}
?>

<!--End of Feedback-->

<!DOCTYPE html>
<html lang="en">

<?php include("header.php"); ?>

<body>
<?php include("navbar.php"); ?>
    <div>
        <div class="d-flex justify-content-center align-items-center"><img class="img-fluid d-flex justify-content-center align-items-center searchbg" data-aos="fade-up" data-aos-duration="1000" src="assets/img/vaccinated.png"></div>
        <div>
            <div class="p-5 mb-4 bg-light round-3">
                <div class="container-fluid py-5">
                    <h1 class="display-5 fw-bold">Heading</h1>
                    <p class="col-md-8 fs-4"><strong>RESULT:</strong></p>

<?php

include("connections.php");
		if (empty($_GET["search"])){
	
			echo "Walang laman si GET ...";
		} else {

			$check = $_GET["search"];
	
			$terms = explode(" ", $check);
			$q = "SELECT * FROM tbl_vacinfo WHERE " ;
			$i = 0;
	

		foreach($terms as $each) {
			
			$i++;
			
			if($i==1){
				$q .="vacidno LIKE '%$each%' ";
			} else {
				$q .= "OR vacidno LIKE '%$each%' ";
			} if($i==2){
				$q .="surname LIKE '%$each%' ";
			} else {
				$q .= "OR surname LIKE '%$each%' ";
			} if($i==3){
				$q .="firstname LIKE '%$each%' ";
			} else {
				$q .= "OR firstname LIKE '%$each%' ";
			} if($i==4){
				$q .="middlename LIKE '%$each%' ";
			} else {
				$q .= "OR middlename LIKE '%$each%' ";
			} if($i==5){
				$q .="suffix LIKE '%$each%' ";
			} else {
				$q .= "OR suffix LIKE '%$each%' ";
			}
		}
			$query = mysqli_query($connections, $q);
			$c_q = mysqli_num_rows($query);
		}
		if($c_q > 0 && $check!=""){
			
			while($row = mysqli_fetch_assoc($query)){
			
				echo "<p class='col-md-8 fs-4' style='text-align: left;'>". $vacidno = $row["vacidno"] . "-" . " " . $fname = $row["firstname"] . "  " . $mname = $row["middlename"] . "  " . $sname = $row["surname"] . "  " . $suffix = $row["suffix"] . "</p>". "<br>";
			}
		}else {
	
				echo "<p class='col-md-8 fs-4' style='text-align: center;'>No result.</p>";
	
		}
		

?>                   
                    <div class="col-12 col-md-4 offset-md-4" style="width: 252.646px;height: 62px;text-align: center;margin-left: 0px;"><a class="btn btn-light btn-lg" role="button" style="margin-left: 16px;color: rgb(255,255,255);background: #fe8e17;" href="search.php">BACK</a></div>
                </div>
            </div>
        </div>
        <div style="border-style: none;"></div>
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