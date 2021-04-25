<?php

require_once __DIR__ . "/../database/dbUser.php";
$userDb = new dbUser();

if (isset($_POST['login'])) { // if submit button is clicked proceed

	$username = $_POST['username']; // get username from input form
	$password = $_POST['password']; // get password from input form

	if ($userDb->login($username, $password)) { // if data is valid start session & redirect to homepage

		session_start();
		$_SESSION['user'] = $userDb->login($username, $password);
		header('location:../index.php');
		exit;
	} else {	// if data is not valid return to login page

		$_SESSION['message'] = 'Invalid username or password';
		header('location:login.php');
		exit;
	}
} else {

	$_SESSION['message'] = 'You need to login first';
	header('location:login.php');
	exit;
}
