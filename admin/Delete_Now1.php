<?php

include("connections.php");

	$db_brimsidno = $_POST["db_brimsidno"];	


		mysqli_query($connections, "DELETE FROM tbl_residentinfo WHERE brimsidno = '$db_brimsidno' ");
		

			echo "<script language='javascript'>alert('Record has been Deleted!')</script>";
			echo "<script>window.location.href='regformadmin.php';</script>";
?>