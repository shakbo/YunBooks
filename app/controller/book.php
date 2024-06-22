<?php
$selected_page = isset($_GET['page']) ? $_GET['page'] : 'exception';

$page_data = [
    'list' => [
        'title' => '耘書 | 書籍總覽',
        'stylesheet' => 'public/assets/css/book/general/list.css',
        'content' => 'app/content/book/general/list.php',
    ],
    'info' => [
        'title' => '耘書 | 書籍詳情',
        'stylesheet' => 'public/assets/css/book/general/info.css',
        'content' => 'app/content/book/general/info.php',
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
if (array_key_exists($selected_page, $page_data)) {
    require_once(ROOT . $page['content']);
} else {
    echo "<title>耘書 | 頁面不存在</title>";
    echo "<h1 class='text-light'>頁面不存在</h1>";
}
?>