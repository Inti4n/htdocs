<?php
//For Personal Info
include("connections.php");

$user_id = $_POST["user_id"];

$new_vaccinee_id = $_POST["new_vaccinee_id"];
$new_db_name = $_POST["new_db_name"];
$new_sname = $_POST["new_sname"];
$new_fname = $_POST["new_fname"];
$new_mname = $_POST["new_mname"];
$new_suffix = $_POST["new_suffix"];

if(empty($_POST["new_gender"])){
	$new_gender ="";
} else {
	$new_gender = $_POST["new_gender"];
}

$new_age = $_POST["new_age"];
$new_birthday = $_POST["new_birthday"];
$new_birthplace = $_POST["new_birthplace"];
$new_address = $_POST["new_address"];
$new_cnum = $_POST["new_cnum"];
$new_email = $_POST["new_email"];
$new_contactperson = $_POST["new_contactperson"];
$new_relationvac = $_POST["new_relationvac"];
$new_relcnum = $_POST["new_relcnum"];
$new_category = $_POST["new_category"];

//name concatenation
$new_db_name = $new_fname . " " . $new_mname . " " . $new_sname . " " . $new_suffix;

mysqli_query($connections, "UPDATE tbl_vacinfo SET vacidno='$new_vaccinee_id', surname='$new_sname', firstname='$new_fname', middlename='$new_mname', suffix='$new_suffix', gender='$new_gender', age='$new_age', birthday='$new_birthday', birthplace='$new_birthplace', address='$new_address', contactnumber='$new_cnum', email='$new_email', contactperson='$new_contactperson', relation='$new_relationvac', relcontactnumber='$new_relcnum', category='$new_category' WHERE id='$user_id'" );



mysqli_query($connections, "UPDATE tbl_prevac1stdose SET name='$new_db_name' WHERE vacidno='$new_vaccinee_id'");
mysqli_query($connections, "UPDATE tbl_vacdetails1stdose SET name='$new_db_name' WHERE vacidno='$new_vaccinee_id'");
mysqli_query($connections, "UPDATE tbl_postvac1stdose SET name='$new_db_name' WHERE vacidno='$new_vaccinee_id'");
mysqli_query($connections, "UPDATE tbl_prevac2nddose SET name='$new_db_name' WHERE vacidno='$new_vaccinee_id'");
mysqli_query($connections, "UPDATE tbl_vacdetails2nddose SET name='$new_db_name' WHERE vacidno='$new_vaccinee_id'");
mysqli_query($connections, "UPDATE tbl_postvac2nddose SET name='$new_db_name' WHERE vacidno='$new_vaccinee_id'");
mysqli_query($connections, "UPDATE tbl_booster SET name='$new_db_name' WHERE vacidno='$new_vaccinee_id'");


echo "<script language='javascript'>alert('Record has been updated!')</script>";
echo "<script>window.location.href='regformadmin.php';</script>";


?>