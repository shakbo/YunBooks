<?php
session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . 'yunbooks/app/config/constant.php');

$sql_connection = require_once(ROOT . 'app/config/database.php');
require_once(ROOT . 'app/scripts/tool.php');

if (!($_SERVER['REQUEST_METHOD'] == 'POST')) {
    alert("呼叫方法錯誤！", "../../../../index.php?controller=general&page=home");
    die();
}

$email = $_POST['email'];
$password = $_POST['password'];
$remember = $_POST['remember'] ?? null;

$sql_command = "SELECT * FROM users WHERE email ='$email' limit 1";
$result = mysqli_query_assoc($sql_command);

if (!$result) {
    alert("帳號不存在！", "../../../../index.php?controller=general&page=home");
    die();
}

$result = $result[0];

if (!password_verify($password, $result['password'])) {
    alert("密碼錯誤！", "../../../../index.php?controller=general&page=home");
    die();
}

$_SESSION['SES'] = $result;

if ($remember) {
    $expires = time() + (60 * 60 * 24 * 30);
    $salt = "TzuyuTop1";

    $token_key = hash('sha256', (time() . $salt));
    $token_value = hash('sha256', ('Logged_In' . $salt));

    setcookie('SES', $token_key . ':' . $token_value, $expires);

    $id = $result['id'];
    $sql_command = "UPDATE users set token_key = '$token_key', token_value='$token_value' where id = '$id' limit 1";
    mysqli_query_assoc($sql_command);
}

$currentHost = $_SERVER['HTTP_HOST'];
$refererUrl = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "http://$currentHostyunbooks/index.php?controller=general&page=home";

header("Location: $refererUrl");

mysqli_close($sql_connection);
exit;
