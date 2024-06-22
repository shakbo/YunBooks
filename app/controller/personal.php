<?php
$selected_page = isset($_GET['page']) ? $_GET['page'] : 'exception';

$page_data = [
    'home' => [
        'title' => '耘書 | 個人首頁',
        'stylesheet' => 'public/assets/css/home/personal.css',
        'content' => 'app/content/home/personal.php',
    ],
    'ownedbooks' => [
        'title' => '耘書 | 已有書籍總覽',
        'stylesheet' => 'public/assets/css/book/general/list.css',
        'content' => 'app/content/book/personal/list.php',
    ],
    'ownedbookinfo' => [
        'title' => '耘書 | 已有書籍詳情',
        'stylesheet' => 'public/assets/css/book/general/info.css',
        'content' => 'app/content/book/personal/info.php',
    ]
];

if (array_key_exists($selected_page, $page_data)) {
    $page = $page_data[$selected_page];
    echo '<title>' . $page['title'] . '</title>';
    echo '<link rel="stylesheet" type="text/css" href="' . $page['stylesheet'] . '">';
}
?>

<link rel="stylesheet" type="text/css" href="assets/css/personal.css">

<?php
if (array_key_exists($selected_page, $page_data)) {
    require_once(ROOT . $page['content']);
} else {
    echo "<title>耘書 | 頁面不存在</title>";
    echo "<h1 class='text-light'>頁面不存在</h1>";
}
?>