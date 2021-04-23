<?php ob_start(); ?>
<?php session_start(); ?>
<?php

		$_SESSION['username']=null;
		header("Location:admin-login.php");


 ?>v