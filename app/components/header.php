<link rel="stylesheet" href="public/assets/css/component/header.css">

<nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary px-5">
    <div class="container-fluid my-2">
        <a href="index.php?controller=general&page=home" class="d-flex align-items-center mb-lg-0 link-body-emphasis text-decoration-none me-3">
            <img class="me-3" src="public/assets/images/logo.png" alt="logo" height="32px">
            耘書
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item ms-3">
                    <a href="index.php?controller=general&page=home" class="nav-link px-3 link-body-emphasis">首頁</a>
                </li>
                <li class="nav-item ms-3">
                    <a href="index.php?controller=book&page=list" class="nav-link px-3 link-body-emphasis">所有書籍</a>
                </li>
                <li class="nav-item dropdown px-3 link-body-emphasis">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        個人
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="index.php?controller=personal&page=home">主頁</a></li>
                        <?php if (isset($loggedin) && $loggedin) : ?>
                            <li><a class="dropdown-item" href="index.php?controller=personal&page=ownedbooks">書庫</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
                <?php if (isset($loggedin) && $loggedin && $accesslevel === "1") : ?>
                    <li class="nav-item dropdown px-3 link-body-emphasis">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            管理
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="index.php?controller=admin&page=books">書籍</a></li>
                            <li><a class="dropdown-item" href="index.php?controller=admin&page=accounts">帳號</a></li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
            <?php if (isset($loggedin) && $loggedin) : ?>
                <a href="app/scripts/account/general/logout.php" class="btn btn-outline-danger nav-item" tabindex="-1" role="button" aria-disabled="true">登出</a>
            <?php else : ?>
                <button type="button" class="btn btn-outline-primary nav-item" data-bs-toggle="modal" data-bs-target="#loginModal">登入</button>
            <?php endif; ?>
        </div>
    </div>
</nav>