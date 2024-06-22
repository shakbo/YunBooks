<?php
session_start();

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'noparameters';

require_once($_SERVER['DOCUMENT_ROOT'] . 'yunbooks/app/scripts/tool.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'yunbooks/app/config/database.php');
require_once($_SERVER['DOCUMENT_ROOT'] . 'yunbooks/app/config/constant.php');

if (isset($_SESSION["LAST_ACTIVITY"])) {
    if (time() - $_SESSION["LAST_ACTIVITY"] > 300) {
        session_unset();
        session_destroy();
    } else if (time() - $_SESSION["LAST_ACTIVITY"] > 60) {
        $_SESSION["LAST_ACTIVITY"] = time();
    }
}
?>

<!DOCTYPE html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="public/assets/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="app/libraries/bootstrap/bootstrap.css">
    <script src="app/libraries/bootstrap/bootstrap.bundle.js"></script>
    <script src="app/libraries/jquerry/jquery-3.7.1.js"></script>
    <script src="app/libraries/jbvalidator/jbvalidator.js"></script>
    <script src="public/assets/javascript/jbvalidator.js"></script>
    <link rel="stylesheet" type="text/css" href="public/assets/css/general.css">
</head>

<body onload="startTime()">
    <?php
    $loggedin = is_logged_in();
    $accesslevel = isset($_SESSION['SES']['accesslevel']) ? $_SESSION['SES']['accesslevel'] : 2;
    require_once(ROOT . 'app/components/header.php');
    ?>
    <div class="background"></div>
    <main>
        <?php
        switch ($controller) {
            case 'general':
                require_once($_SERVER['DOCUMENT_ROOT'] . 'yunbooks/app/controller/general.php');
                break;

            case 'about':
                require_once($_SERVER['DOCUMENT_ROOT'] . 'yunbooks/app/controller/about.php');
                break;

            case 'book':
                require_once($_SERVER['DOCUMENT_ROOT'] . 'yunbooks/app/controller/book.php');
                break;

            case 'personal':
                require_once($_SERVER['DOCUMENT_ROOT'] . 'yunbooks/app/controller/personal.php');
                break;

            case 'admin':
                require_once($_SERVER['DOCUMENT_ROOT'] . 'yunbooks/app/controller/admin.php');
                break;

            case 'noparameters':
                $currentHost = $_SERVER['HTTP_HOST'];
                $refererUrl = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "http://$currentHostyunbooks/index.php?controller=general&page=home";
                header("Location: $refererUrl");
                break;

            default:
                require_once($_SERVER['DOCUMENT_ROOT'] . 'yunbooks/app/controller/exception.php');
                break;
        }
        ?>
    </main>
    <?php
    require_once(ROOT . 'app/components/footer.php');
    require_once(ROOT . 'app/scripts/import/modal.php');
    ?>
</body>
</html>