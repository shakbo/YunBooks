<?php
$selected_page = isset($_GET['page']) ? $_GET['page'] : 'exception';

$page_data = [
    'books' => [
        'title' => '耘書 | 書籍管理',
        'stylesheet' => 'public/assets/css/book/admin/list.css',
        'content' => 'app/content/book/admin/list.php',
    ],
    'bookupdate' => [
        'title' => '耘書 | 書籍資訊編輯',
        'stylesheet' => 'public/assets/css/book/general/info.css',
        'content' => 'app/content/book/admin/update.php',
    ],
    'accounts' => [
        'title' => '耘書 | 帳號管理',
        'stylesheet' => 'public/assets/css/account/admin/list.css',
        'content' => 'app/content/account/admin/list.php',
    ],
    'accountupdate' => [
        'title' => '耘書 | 帳號資訊編輯',
        'stylesheet' => 'public/assets/css/account/admin/update.css',
        'content' => 'app/content/account/admin/update.php',
    ]
];

if (array_key_exists($selected_page, $page_data)) {
    $page = $page_data[$selected_page];
    echo '<title>' . $page['title'] . '</title>';
    echo '<link rel="stylesheet" type="text/css" href="' . $page['stylesheet'] . '">';
}
?>

<link rel="stylesheet" type="text/css" href="assets/css/admin.css">

<?php
if ($accesslevel !== "1") {
    echo '<title>耘書 | 權限不足</title>';
    echo '<h1 class="h1 text-light">你沒有權限查看此頻道！</h1>';
} else {
    if (array_key_exists($selected_page, $page_data)) {
        require_once(ROOT . $page['content']);
    } else {
        echo "<title>耘書 | 頁面不存在</title>";
        echo "<h1 class='text-light'>頁面不存在</h1>";
    }
}
?>

<style>
    main {
        background-color: red;
    }
</style>