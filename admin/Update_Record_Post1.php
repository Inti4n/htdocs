<?php
//For Post Vaccination 1st Dose
include("connections.php");

$user_id = $_POST["user_id"];


$new_vaccinee_id = $_POST["new_vaccinee_id"];
$new_db_name = $_POST["new_db_name"];
$new_postvacnote1 = $_POST["new_postvacnote1"];
$new_monitor1 = $_POST["new_monitor1"];

		

mysqli_query($connections, "UPDATE tbl_postvac1stdose SET vacidno= '$new_vaccinee_id', name='$new_db_name', post_vacnote='$new_postvacnote1', monitor='$new_monitor1' WHERE id='$user_id'" );


echo "<script language='javascript'>alert('Record has been updated!')</script>";
echo "<script>window.location.href='firstdosepost.php';</script>";


?>