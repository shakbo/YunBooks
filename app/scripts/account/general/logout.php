<?php
session_start();

if (!empty($_SESSION['SES'])) {
	unset($_SESSION['SES']);
	setcookie('SES', '', time() - (9000));
	$_SESSION = array();
	session_destroy();
}

$currentHost = $_SERVER['HTTP_HOST'];

header("Location: http://$currentHostyunbooks/index.php?controller=general&page=home");
