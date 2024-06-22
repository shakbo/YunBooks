<link rel="stylesheet" type="text/css" href="public/assets/css/component/modal.css">

<?php
require_once($_SERVER['DOCUMENT_ROOT'] . 'yunbooks/app/config/constant.php');

require_once(ROOT . 'app/components/modal/notavailable.php');
if (!(isset($loggedin) && $loggedin)) {
    require_once(ROOT . 'app/components/modal/account/general/recovery.php');
    require_once(ROOT . 'app/components/modal/account/general/login.php');
    require_once(ROOT . 'app/components/modal/account/general/sign_up.php');
} else {
    require_once(ROOT . 'app/components/modal/account/general/update.php');
    if ($accesslevel === "1") {
        require_once(ROOT . 'app/components/modal/book/admin/update.php');
        require_once(ROOT . 'app/components/modal/book/admin/new.php');
        require_once(ROOT . 'app/components/modal/account/admin/new.php');
    }
}
?>