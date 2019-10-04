<?php
	session_start();
	include("includes/config.php");
	$_SESSION['id'] == "";
	
	require_once "config.php";
    	unset($_SESSION['access_token']);
    	$gclient -> revokeToken();
    	session_destroy();
    	header("location : login.php");
    	exit();

	session_unset();
	session_destroy();
	header('location:login.php');

?>
