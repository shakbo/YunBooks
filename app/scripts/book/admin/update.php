<?php
session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . 'yunbooks/app/config/constant.php');
$sql_connection = require_once(ROOT . 'app/config/database.php');
require_once(ROOT . 'app/scripts/tool.php');

if (!($_SERVER['REQUEST_METHOD'] == 'POST')) {
    alert("呼叫方法錯誤！", "../../../../index.php?controller=admin&page=bookupdate&book_id=" . $id);
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
        alert("新增作者時發生錯誤！" . $sql_connection->error, "../../../../index.php?controller=admin&page=bookupdate&book_id=" . $id);
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
        alert("新增出版社時發生錯誤！" . $sql_connection->error, "../../../../index.php?controller=admin&page=bookupdate&book_id=" . $id);
    }
} else {
    $publisher_id = $result->fetch_array()[0];
}

$sql_command = "SELECT image FROM books WHERE id = $id";
$result = $sql_connection->query($sql_command);
$row = $result->fetch_assoc();
$currentImage = $row['image'];

if (isset($_FILES['bookUpdateInputBookImage']) && $_FILES['bookUpdateInputBookImage']['error'] === UPLOAD_ERR_OK) {
    if($_FILES['bookUpdateInputBookImage']['error'] !== UPLOAD_ERR_OK) {
        alert("檔案上傳錯誤！代碼：" . $sql_connection->error, "../../../../index.php?controller=admin&page=bookupdate&book_id=" . $id);
        die();
    }
    
    if ($_FILES["bookUpdateInputBookImage"]["size"] > 300000) {
        alert("檔案大小過大！代碼：" . $sql_connection->error, "../../../../index.php?controller=admin&page=bookupdate&book_id=" . $id);
        die();
    }
    
    $imageFileType = strtolower(pathinfo($_FILES["bookUpdateInputBookImage"]["name"], PATHINFO_EXTENSION));
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        alert("檔案格式錯誤(僅支援 .jpg / .png / .jpeg 格式)！代碼：" . $sql_connection->error, "../../../../index.php?controller=admin&page=bookupdate&book_id=" . $id);
        die();
    }

    if ($currentImage && file_exists("../../../../" . $currentImage)) {
        unlink("../../../../" . $currentImage); 
    }

    $newFileName = $id . "." . $imageFileType;
    $destination = '../../../../public/assets/images/books/' . $newFileName;
    move_uploaded_file($_FILES['bookUpdateInputBookImage']['tmp_name'], $destination);

    $destination_in_sql = 'public/assets/images/books/' . $newFileName;

    $sql_command = "UPDATE books
    SET name = '$bookname',
        image = '$destination_in_sql',
        writer = $writer_id,
        publisher = $publisher_id,
        publishdate = '$publishdate',
        description = '$description'
    WHERE id = $id";
} else {
    $sql_command = "UPDATE books
    SET name = '$bookname',
        writer = $writer_id,
        publisher = $publisher_id,
        publishdate = '$publishdate',
        description = '$description'
    WHERE id = $id";
}

if ($sql_connection->query($sql_command) === TRUE) {
    alert("更新成功！", "../../../../index.php?controller=admin&page=bookupdate&book_id=" . $id);
    die();
} else {
    alert("更新時發生錯誤！" . $sql_connection->error, "../../../../index.php?controller=admin&page=bookupdate&book_id=" . $id);
    die();
}

mysqli_close($sql_connection);
