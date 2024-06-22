<?php
$sql_command = "SELECT `books`.`id`, `books`.`image`, `books`.`name`, `writer`.`name` AS `writer_name` FROM `books` JOIN `writer` ON `books`.`writer` = `writer`.`id`";
$result = mysqli_query($sql_connection, $sql_command);

echo '<div class="container pt-5 mb-4">';
echo '<button class="btn btn-primary w-100 py-2 fs-4 newbook" data-bs-toggle="modal" data-bs-target="#newBookModal">新增書籍</button>';
echo '</div>';

echo '<div class="container pt-3 pb-5">';
echo '<div class="row row-cols-1 row-cols-md-4 g-5">';

while ($row = mysqli_fetch_assoc($result)) {
?>
    <div class="col">
        <div class="card h-100">
            <div class="card-background">
                <img src="<?php echo $row['image']; ?>" alt="" class="card-img-top mt-3" style="object-fit: contain; height: 200px;">
            </div>
            <div class="card-body d-flex flex-column">
                <h5 class="card-title d-inline-block text-truncate"><?php echo $row['name']; ?></h5>
                <p class="card-text mb-0 d-inline-block text-truncate" style="line-height: 1.5em;">作者：<?php echo $row['writer_name']; ?></p>
                <div class="mt-auto">
                    <a href="javascript:edit('<?php echo $row['id']; ?>')" class="btn btn-primary stretched-link w-100">前往編輯</a>
                </div>
            </div>
        </div>
    </div>
<?php
}

echo '</div>';
echo '</div>'; ?>

<script type="text/javascript">
    function edit(id) {
        window.location.href = 'index.php?controller=admin&page=bookupdate&book_id=' + id;
    }
</script>