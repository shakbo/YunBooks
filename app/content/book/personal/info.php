<?php
if (isset($_SESSION['SES']['username'])) {
    $id = $_SESSION['SES']['id'];

    $sql_command = "SELECT ob.id, u.username, b.name, b.image, b.id AS book_id , w.name AS writer_name, p.name AS publisher_name, b.publishdate, b.description FROM ownedbooks ob JOIN users u ON ob.user = u.id JOIN books b ON ob.book = b.id JOIN writer w ON b.writer = w.id JOIN publisher p ON b.publisher = p.id WHERE u.id = $id;";
    $result = mysqli_query($sql_connection, $sql_command);
}

if ($result->num_rows === 0 || !isset($_GET['book_id'])) {
    echo ("<h1 class='h1 text-light'>要找的書籍不存在</h1>");
    die();
}

$book_id = $_GET['book_id'];

$sql_command = "SELECT b.id, b.name, b.image, w.name AS writer_name, p.name AS publisher_name, b.publishdate, b.description FROM books b JOIN writer w ON b.writer = w.id JOIN publisher p ON b.publisher = p.id WHERE b.id = $book_id;";
$result = mysqli_query($sql_connection, $sql_command);
$row = mysqli_fetch_assoc($result) ?>
<div class="container infocard blur-background col-xxl-8 px-4 pt-5">
    <div class="row flex-lg-row align-items-center d-flex justify-content-center g-5 pb-4">
        <img src="<?php echo $row['image']; ?>" class="d-block mx-lg-auto img-fluid" alt="" style="max-width: 350px; max-height=350px;" loading="lazy">
        <div class="col-lg-6">
            <p class="fs-1 fw-bold text-body-emphasis lh-1 mb-0"><?php echo $row['name']; ?></p>
            <p class="fs-3 text-light mb-0">作者：<?php echo $row['writer_name']; ?></p>
            <p class="fs-3 text-light mb-3">出版社：<?php echo $row['publisher_name']; ?></p>
            <p class="fs-4 text-light pe-3">書本簡介：</p>
            <p class="lead text-light h3 mb-5"><?php echo $row['description']; ?></p>
            <div class="d-flex justify-content-end mt-auto align-items-center">
                <div class="d-flex flex-column blur-background justify-content-between align-items-center p-3">
                    <p class="fs-6 text-light fw-bold mb-0">發行日期：<?php echo $row['publishdate']; ?></p>
                    <div class="d-flex w-100 justify-content-around align-items-center">
                        <a class="btn fw-bold btn-primary w-100 ms-1" href="javascript:removebook('<?php echo $row['id']; ?>')" role="button">移除書籍</a>
                        <button type="button" class="btn fw-bold btn-primary w-100 ms-1" data-bs-toggle="modal" data-bs-target="#notavailableModal">開始閱讀</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function removebook(id) {
        if (confirm('確定要刪除?')) {
            window.location.href = 'app/scripts/book/general/remove_from_shelf.php?id=' + id;
        }
    }
</script>