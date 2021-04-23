<?php ob_start(); ?>
<?php session_start(); ?>
<?php

		$_SESSION['user_id']=null;
		$_SESSION['firstname']=null;
		$_SESSION['lastname']=null;
		$_SESSION['email']=null;
		header("Location:../login.php");


 ?>