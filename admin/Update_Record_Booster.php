<?php
//For Booster
include("connections.php");

$user_id = $_POST["user_id"];


$new_vaccinee_id = $_POST["new_vaccinee_id"];
$new_db_name = $_POST["new_db_name"];
$new_booster = $_POST["new_booster"];
$new_vac_brand = $_POST["new_vac_brand"];

		

mysqli_query($connections, "UPDATE tbl_booster SET vacidno= '$new_vaccinee_id', name='$new_db_name', booster='$new_booster', vac_brand='$new_vac_brand' WHERE id='$user_id'" );


echo "<script language='javascript'>alert('Record has been updated!')</script>";
echo "<script>window.location.href='booster.php';</script>";


?>