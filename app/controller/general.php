<?php
$selected_page = isset($_GET['page']) ? $_GET['page'] : 'exception';

$page_data = [
    'home' => [
        'title' => '耘書 | 首頁',
        'stylesheet' => 'public/assets/css/home/public.css',
        'content' => 'app/content/home/public.php',
    ]
];

if (array_key_exists($selected_page, $page_data)) {
    $page = $page_data[$selected_page];
    echo '<title>' . $page['title'] . '</title>';
    echo '<link rel="stylesheet" type="text/css" href="' . $page['stylesheet'] . '">';
}
?>

<link rel="stylesheet" type="text/css" href="public/assets/css/general.css">

<?php
if (array_key_exists($selected_page, $page_data)) {
    require_once(ROOT . $page['content']);
} else {
    echo "<title>耘書 | 頁面不存在</title>";
    echo "<h1 class='text-light'>頁面不存在</h1>";
}
?>