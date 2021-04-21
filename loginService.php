<?php
require_once 'dbUser.php';

$userDb = new dbUser();

$username = $_POST['username'];
$password = $_POST['password'];

if(isset($_POST['login'])){

if($userDb->login($username, $password)) {
    $_SESSION['user'] = $userDb->login($username, $password);
    header('location:index.php');
    	
	}
	else{
        $_SESSION['message'] = 'Invalid username or password';
		
		header('location:login.php');
	}
}
else {

    $_SESSION['message'] = 'You need to login first';
	header('location:login.php');
}
?>