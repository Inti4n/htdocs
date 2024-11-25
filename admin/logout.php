<?php

	session_start();
	
	unset($_SESSION['id']);
	session_unset();
	session_destroy();
	header('Refresh: 3;url=../index.php');
	echo "Logging out ... Please wait ...";
	exit();

?>