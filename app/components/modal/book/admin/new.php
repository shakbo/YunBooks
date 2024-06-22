<?php
if (isset($_SESSION['SES']['username'])) {
    $id = $_SESSION['SES']['id'];

    $sql_command = "SELECT max(id) AS lastid FROM books";
    $result =   mysqli_query($sql_connection, $sql_command);
    $row = mysqli_fetch_assoc($result);
    $last_id = $row['lastid'] + 1;
}
?>

<?php if (isset($_SESSION['SES']['username'])) : ?>
    <div class="modal fade" id="newBookModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="newBookModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="newBookModal">新增書本</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="newBookForm" method="post" action="app/scripts/book/admin/new.php" class="needs-validation" enctype="multipart/form-data" novalidate>
                        <div class="mb-3">
                            <label for="newBookInputId" class="form-label">資料庫編號</label>
                            <input type="text" class="form-control" id="newBookInputId" name="id" maxlength="800" value="<?php echo $last_id; ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="newBookInputBookName" class="form-label">書名</label>
                            <input type="text" class="form-control" id="newBookInputBookName" name="bookname" maxlength="800" required>
                        </div>
                        <div class="mb-3">
                            <label for="newBookInputBookImage" class="form-label">書本圖片</label>
                            <input type="file" class="form-control" name="newBookInputBookImage" id="newBookInputBookImage" require>
                        </div>
                        <div class="mb-3">
                            <label for="newBookInputWriterName" class="form-label">作者</label>
                            <input type="text" class="form-control" id="newBookInputWriterName" name="writername" maxlength="255" required>
                        </div>
                        <div class="mb-3">
                            <label for="newBookInputPublisherName" class="form-label">出版社</label>
                            <input type="text" class="form-control" id="newBookInputPublisherName" name="publishername" maxlength="255" required>
                        </div>
                        <div class="mb-3">
                            <label for="newBookInputDescription" class="form-label">書本簡介</label>
                            <input type="text" class="form-control" id="newBookInputDescription" name="description" maxlength="2000" required>
                        </div>
                        <div class="mb-3">
                            <label for="newBookInputPublishDate" class="form-label">發行日期</label>
                            <input type="date" class="form-control" id="newBookInputPublishDate" name="publishdate" required>
                        </div>
                        <button type="submit" form="newBookForm" class="btn btn-primary w-100">新增</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>