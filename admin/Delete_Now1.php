<?php

include("connections.php");

	$db_vacidno = $_POST["db_vacidno"];	


		mysqli_query($connections, "DELETE FROM tbl_vacinfo WHERE vacidno = '$db_vacidno' ");
		mysqli_query($connections, "DELETE FROM tbl_prevac1stdose WHERE vacidno = '$db_vacidno' ");
		mysqli_query($connections, "DELETE FROM tbl_vacdetails1stdose WHERE vacidno = '$db_vacidno' ");
		mysqli_query($connections, "DELETE FROM tbl_postvac1stdose WHERE vacidno = '$db_vacidno' ");
		mysqli_query($connections, "DELETE FROM tbl_prevac2nddose WHERE vacidno = '$db_vacidno' ");
		mysqli_query($connections, "DELETE FROM tbl_vacdetails2nddose WHERE vacidno = '$db_vacidno' ");
		mysqli_query($connections, "DELETE FROM tbl_postvac2nddose WHERE vacidno = '$db_vacidno' ");
		mysqli_query($connections, "DELETE FROM tbl_booster WHERE vacidno = '$db_vacidno' ");

			echo "<script language='javascript'>alert('Record has been Deleted!')</script>";
			echo "<script>window.location.href='regformadmin.php';</script>";
?>