<?php
if (!isset($_GET['book_id'])) {
    echo ("<h1 class='h1 text-light'>未指出要編輯的書籍</h1>");
    die();
}
$book_id = filter_input(INPUT_GET, 'book_id', FILTER_SANITIZE_NUMBER_INT);
$sql_command = "SELECT b.id, b.name, b.image, w.name AS writer_name, p.name AS publisher_name, b.publishdate, b.description FROM books b JOIN writer w ON b.writer = w.id JOIN publisher p ON b.publisher = p.id WHERE b.id = $book_id;";
$result = mysqli_query($sql_connection, $sql_command);
$row = mysqli_fetch_assoc($result);
?>
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
                        <a class="btn fw-bold btn-outline-primary w-100 me-1 back-button" href="index.php?controller=admin&page=books" role="button">返回上頁</a>
                        <a class="btn fw-bold btn-danger w-100 me-1 ms-1 fw-4" href="javascript:removebook('<?php echo $row['id']; ?>')" role="button">移除書籍</a>
                        <button type="button" class="btn fw-bold btn-primary w-100 me-1 ms-1" data-bs-toggle="modal" data-bs-target="#bookUpdateModal">編輯資訊</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
?>

<script type="text/javascript">
    function removebook(id) {
        if(confirm('確定要從資料庫中移除?')) {
            window.location.href = 'app/scripts/book/admin/remove_from_database.php?id=' + id;
        }
    }
</script>