<?php
session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . 'yunbooks/app/config/constant.php');

$sql_connection = require_once(ROOT . 'app/config/database.php');
require_once(ROOT . 'app/scripts/tool.php');

if (!($_SERVER['REQUEST_METHOD'] == 'POST')) {
    alert("呼叫方法錯誤！", "../../../../index.php?controller=general&page=home");
    die();
}

if (isset($_POST['btn-update'])) {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone_number = isset($_POST['phoneNumber']) && !empty($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '';
    $accesslevel = $_POST['accesslevel'];

    if (empty($_POST['password'])) {
        $sql_command = "UPDATE users SET username='$username', email='$email', phoneNumber='$phone_number', accesslevel='$accesslevel' WHERE id='$id'";
    } else {
        $password = $_POST['password'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql_command = "UPDATE users SET username='$username', password='$hashedPassword' ,email='$email', phoneNumber='$phone_number', accesslevel='$accesslevel' WHERE id='$id'";
    }

    if (mysqli_query($sql_connection, $sql_command)) {
?>
        <script type="text/javascript">
            alert('資料更新成功！');
            window.location.href = '../../../../index.php?controller=admin&page=accounts';
        </script>
    <?php
    } else {
    ?>
        <script type="text/javascript">
            alert('更新資料時發生錯誤！');
            window.location.href = '../../../../index.php?controller=admin&page=accounts';
        </script>
<?php
    }
}
?>