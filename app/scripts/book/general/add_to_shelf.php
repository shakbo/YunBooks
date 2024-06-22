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
    alert("您已擁有該書籍！", "../../../../index.php?controller=personal&page=ownedbooks");
    die();
}

$sql_command = "INSERT INTO `ownedbooks` (`id`, `user`, `book`) VALUES (NULL, $id, $book_id)";
$result = mysqli_query($sql_connection, $sql_command);

if($result) {
    alert("新增成功！", "../../../../index.php?controller=personal&page=ownedbooks");
    die();
} else {
    alert("新增失敗！", "../../../../index.php?controller=book&page=list");
    die();
}

mysqli_close($sql_connection);
?>