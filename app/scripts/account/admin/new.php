<?php
session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . 'yunbooks/app/config/constant.php');

$sql_connection = require_once(ROOT . 'app/config/database.php');
require_once(ROOT . 'app/scripts/tool.php');

if (!($_SERVER['REQUEST_METHOD'] == 'POST')) {
    alert("呼叫方法錯誤！", "../../../../index.php?controller=general&page=home");
    die();
}

$username = $_POST['username'];
$email = $_POST['email'];
$phone_number = isset($_POST['phoneNumber']) && !empty($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '';
$accesslevel = $_POST['accesslevel'];
$password = $_POST['password'];

if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
    alert("電子郵件格式有誤！", "../../../../index.php?controller=admin&page=accounts");
    die();
}

$sql_command = "SELECT * FROM users WHERE email ='" . $email . "'";
$result = mysqli_query($sql_connection, $sql_command);

if (mysqli_num_rows($result) > 0) {
    alert("此電子郵件已有人使用！", "../../../../index.php?controller=admin&page=accounts");
    die();
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$sql_command = "INSERT INTO users(id, username, password, email, phoneNumber, accesslevel) VALUES(NULL, '$username', '$hashedPassword', '$email', '$phone_number', '$accesslevel')";
$result = mysqli_query($sql_connection, $sql_command);
if ($result) {
    alert("新增成功！", "../../../../index.php?controller=admin&page=accounts");
    die();
} else {
    alert("新增失敗！", "../../../../index.php?controller=admin&page=accounts");
    die();
}

mysqli_close($sql_connection);
