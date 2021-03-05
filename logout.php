<?php
	require 'db.php';
	unset($_SESSION['logged_user']);
	unset($_SESSION);

	session_destroy();
	header('Location: main.php');
	if (isset($_GET['logout'])) {
		session_destroy();
		header('Location: main.php');
	}

?>
