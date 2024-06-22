<?php
session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . 'yunbooks/app/config/constant.php');

$sql_connection = require_once(ROOT . 'app/config/database.php');
require_once(ROOT . 'app/scripts/tool.php');

if (!($_SERVER['REQUEST_METHOD'] == 'POST')) {
    alert("呼叫方法錯誤！", "../../../../index.php?controller=personal&page=home");
    die();
}

$id = $_SESSION['SES']['id'];

$username = $_POST['username'];
$email = $_POST['email'];
$phone_number = $_POST['phoneNumber'];
$password = $_POST['password'];

$sql_command = "SELECT password FROM users WHERE id = $id";
$result = mysqli_query($sql_connection, $sql_command);
$row = mysqli_fetch_assoc($result);

if (!password_verify($password, $row['password'])) {
    alert("密碼錯誤！", "../../../../index.php?controller=personal&page=home");
    die();
}

if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
    alert("電子郵件格式有誤！", "../../../../index.php?controller=personal&page=home");
    die();
}

$sql_command = "UPDATE `users` SET `username` = '$username', `phoneNumber` = '$phone_number' WHERE `users`.`id` = '$id'";
$result = mysqli_query($sql_connection, $sql_command);

if ($result) {
    $sql_command = "SELECT * FROM users WHERE email ='$email' limit 1";
    $result = mysqli_query_assoc($sql_command);
    $_SESSION['SES'] = $result[0];
    alert("更新成功！", "../../../../index.php?controller=personal&page=home");
    die();
} else {
    alert("更新失敗！", "../../../../index.php?controller=personal&page=home");
    die();
}

mysqli_close($sql_connection);
