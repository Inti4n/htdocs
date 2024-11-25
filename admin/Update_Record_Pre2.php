<?php
//For Pre Vaccination 2nd Dose
include("connections.php");

$user_id = $_POST["user_id"];

$new_vaccinee_id = $_POST["new_vaccinee_id"];
$new_db_name = $_POST["new_db_name"];
$new_temp1 = $_POST["new_temp1"];
$new_hr1 = $_POST["new_hr1"];
$new_bp1 = $_POST["new_bp1"];
$new_rr1 = $_POST["new_rr1"];
if (empty($_POST["new_symptoms1"])) {
	$new_symptoms1 = "";
} else {
	
	$new_symptoms1 = implode(',', $_POST['new_symptoms1']);	
}

$new_dn1 = $_POST["new_dn1"];
$new_note1 = $_POST["new_note1"];

			

mysqli_query($connections, "UPDATE tbl_prevac2nddose SET vacidno= '$new_vaccinee_id', name='$new_db_name', temperature='$new_temp1', heart_rate='$new_hr1', blood_pressure='$new_bp1', respiratory_rate='$new_rr1', symptoms='$new_symptoms1', doctor_note='$new_dn1', note='$new_note1' WHERE id='$user_id'" );



echo "<script language='javascript'>alert('Record has been updated!')</script>";
echo "<script>window.location.href='seconddosepre.php';</script>";


?>