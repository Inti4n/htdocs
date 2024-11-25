<?php
error_reporting(0);
?>

<?php
//For Vaccination Details 2nd Dose
include("connections.php");

$user_id = $_POST["user_id"];


$new_vaccinee_id = $_POST["new_vaccinee_id"];
$new_db_name = $_POST["new_db_name"];
$new_sequence1 = $_POST["new_sequence1"];
$new_site1 = $_POST["new_site1"];
$new_brand1 = $_POST["new_brand1"];
$new_batchnum1 = $_POST["new_batchnum1"];
$new_lotnum1 = $_POST["new_lotnum1"];
$new_datevac1 = $_POST["new_datevac1"];
$new_vaccinatorname1 = $_POST["new_vaccinatorname1"];
$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];    
$folder = "image2nd/".$filename;
move_uploaded_file($tempname, $folder);		

mysqli_query($connections, "UPDATE tbl_vacdetails2nddose SET vacidno= '$new_vaccinee_id', name='$new_db_name', dosage_sequence='$new_sequence1', vac_site='$new_site1', vac_brand='$new_brand1', batch_number='$new_batchnum1', lot_number='$new_lotnum1', date_vaccination='$new_datevac1', vaccinator='$new_vaccinatorname1', filename='$filename' WHERE id='$user_id'" );


echo "<script language='javascript'>alert('Record has been updated!')</script>";
echo "<script>window.location.href='seconddetails.php';</script>";


?>