<?php
session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . 'yunbooks/app/config/constant.php');
$sql_connection = require_once(ROOT . 'app/config/database.php');
require_once(ROOT . 'app/scripts/tool.php');

if (!($_SERVER['REQUEST_METHOD'] == 'POST')) {
    alert("呼叫方法錯誤！", "../../../../index.php?controller=admin&page=books");
    die();
}

$id = $_POST['id'];
$bookname = $_POST['bookname'];
$writername = $_POST['writername'];
$publishername = $_POST['publishername'];
$description = $_POST['description'];
$publishdate = $_POST['publishdate'];

$sql_command = "SELECT id FROM writer WHERE name = '$writername'";
$result = $sql_connection->query($sql_command);

if ($sql_connection->affected_rows == 0) {
    $sql_command = "INSERT INTO writer (name) VALUES ('$writername')";
    if ($sql_connection->query($sql_command) === TRUE) {
        $writer_id = $sql_connection->insert_id;
    } else {
        alert("新增作者時發生錯誤！" . $sql_connection->error, "../../../../index.php?controller=admin&page=books");
        die();
    }
} else {
    $writer_id = $result->fetch_array()[0];
}

$sql_command = "SELECT id FROM publisher WHERE name = '$publishername'";
$result = $sql_connection->query($sql_command);

if ($sql_connection->affected_rows == 0) {
    $sql_command = "INSERT INTO publisher (name) VALUES ('$publishername')";
    if ($sql_connection->query($sql_command) === TRUE) {
        $publisher_id = $sql_connection->insert_id;
    } else {
        alert("新增出版社時發生錯誤！" . $sql_connection->error, "../../../../index.php?controller=admin&page=books");
        die();
    }
} else {
    $publisher_id = $result->fetch_array()[0];
}

$sql_command = "INSERT INTO books
(`name`, `writer`, `publisher`, `publishdate`, `description`)
VALUES ('$bookname', $writer_id, $publisher_id, '$publishdate', '$description')";

if ($sql_connection->query($sql_command) === TRUE) {
    $book_id = $sql_connection->insert_id;
} else {
    alert("新增書籍時發生錯誤！" . $sql_connection->error, "../../../../index.php?controller=admin&page=books");
    die();
}

if($_FILES['newBookInputBookImage']['error'] !== UPLOAD_ERR_OK) {
    alert("檔案上傳錯誤！代碼：" . $sql_connection->error, "../../../../index.php?controller=admin&page=books");
    die();
}

if ($_FILES["newBookInputBookImage"]["size"] > 300000) {
    alert("檔案大小過大！代碼：" . $sql_connection->error, "../../../../index.php?controller=admin&page=books");
    die();
}

$imageFileType = strtolower(pathinfo($_FILES["newBookInputBookImage"]["name"], PATHINFO_EXTENSION));
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    alert("檔案格式錯誤(僅支援 .jpg / .png / .jpeg 格式)！代碼：" . $sql_connection->error, "../../../../index.php?controller=admin&page=books");
    die();
}

$newFileName = $book_id . "." . $imageFileType;
$destination = '../../../../public/assets/images/books/' . $newFileName;
move_uploaded_file($_FILES['newBookInputBookImage']['tmp_name'], $destination);

$destination_in_sql = 'public/assets/images/books/' . $newFileName;
$sql_command = "UPDATE books SET image = '$destination_in_sql' WHERE id = $book_id";

if ($sql_connection->query($sql_command) === TRUE) {
    alert("新增成功！", "../../../../index.php?controller=admin&page=books");
    die();
} else {
    alert("新增時發生錯誤！代碼：" . $sql_connection->error, "../../../../index.php?controller=admin&page=books");
    die();
}

mysqli_close($sql_connection);
