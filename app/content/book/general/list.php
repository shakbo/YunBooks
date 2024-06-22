<?php
$sql_command = "SELECT `books`.`id`, `books`.`image`, `books`.`name`, `writer`.`name` AS `writer_name` FROM `books` JOIN `writer` ON `books`.`writer` = `writer`.`id`";
$result = mysqli_query($sql_connection, $sql_command);

if ($result->num_rows === 0) { ?>
    <h1 class="h1 text-light">目前尚無任何書籍</h1>
    <?php } else {
    $counter = 0;
    echo '<div class="container py-5">';
    echo '<div class="row row-cols-1 row-cols-md-4 g-4">';

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
                        <a href="javascript:viewbook('<?php echo $row['id']; ?>')" class="btn btn-primary stretched-link w-100">前往查看詳情</a>
                    </div>
                </div>
            </div>
        </div>
<?php
        $counter++;
    }

    echo '</div>';
    echo '</div>';
}
?>

<script type="text/javascript">
    function viewbook(id) {
        window.location.href = 'index.php?controller=book&page=info&book_id=' + id;
    }
</script>