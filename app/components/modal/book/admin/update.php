<?php
if (isset($_SESSION['SES']['username'])) {
    $id = $_SESSION['SES']['id'];

    if (isset($_GET['book_id'])) {
        $sql_command = "SELECT b.id, b.name, b.image, w.name AS writer_name, p.name AS publisher_name, b.publishdate, b.description FROM books b JOIN writer w ON b.writer = w.id JOIN publisher p ON b.publisher = p.id WHERE b.id = $book_id;";
        $result = mysqli_query($sql_connection, $sql_command);
        $row = mysqli_fetch_assoc($result);
    }
}
?>

<?php if (isset($_SESSION['SES']['username']) && isset($_GET['book_id'])) : ?>
    <div class="modal fade" id="bookUpdateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="bookUpdateModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="bookUpdateModal">書本資訊更新</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="bookUpdateForm" method="post" action="app/scripts/book/admin/update.php" class="needs-validation" enctype="multipart/form-data" novalidate>
                        <div class="mb-3">
                            <label for="bookUpdateInputId" class="form-label">資料庫編號</label>
                            <input type="text" class="form-control" id="bookUpdateInputId" name="id" maxlength="800" value="<?php echo $row['id']; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="bookUpdateInputBookName" class="form-label">書名</label>
                            <input type="text" class="form-control" id="bookUpdateInputBookName" name="bookname" maxlength="800" value="<?php echo $row['name']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="bookUpdateInputBookImage" class="form-label">書本圖片</label>
                            <input type="file" class="form-control" name="bookUpdateInputBookImage" id="bookUpdateInputBookImage">
                        </div>
                        <div class="mb-3">
                            <label for="bookUpdateInputWriterName" class="form-label">作者</label>
                            <input type="text" class="form-control" id="bookUpdateInputWriterName" name="writername" maxlength="255" value="<?php echo $row['writer_name']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="bookUpdateInputPublisherName" class="form-label">出版社</label>
                            <input type="text" class="form-control" id="bookUpdateInputPublisherName" name="publishername" maxlength="255" value="<?php echo $row['publisher_name']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="bookUpdateInputDescription" class="form-label">書本簡介</label>
                            <input type="text" class="form-control" id="bookUpdateInputDescription" name="description" maxlength="2000" value="<?php echo $row['description']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="bookUpdateInputPublishDate" class="form-label">發行日期</label>
                            <input type="date" class="form-control" id="bookUpdateInputPublishDate" name="publishdate" value="<?php echo $row['publishdate']; ?>" required>
                        </div>
                        <button type="submit" form="bookUpdateForm" class="btn btn-primary w-100">更新</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>