<?php
session_start();

require_once($_SERVER['DOCUMENT_ROOT'].'yunbooks/app/config/constant.php');
$sql_connection = require_once(ROOT.'app/config/database.php');
require_once(ROOT.'app/scripts/tool.php');

$id = $_SESSION['SES']['id'];

$book_id = $_GET['id'];

$sql_command = "SELECT COUNT(*) AS count FROM ownedbooks WHERE user = $id AND book = $book_id;";
$result = mysqli_query($sql_connection, $sql_command);
$row = mysqli_fetch_assoc($result);


if($row['count']) {
    $sql_command = "DELETE FROM `ownedbooks` WHERE user = $id AND book = $book_id;";
    $result = mysqli_query($sql_connection, $sql_command);
    if($result) {
        alert("移除成功！", "../../../../index.php?controller=personal&page=ownedbooks");
        die();
    } else {
        alert("移除時發生錯誤！", "../../../../index.php?controller=personal&page=ownedbooks");
        die();
    }
} else {
    alert("您無法將未擁有的書籍從列表中移除！", "../../../../index.php?controller=personal&page=ownedbooks");
    die();
}

mysqli_close($sql_connection);
?>