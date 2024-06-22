<?php
if (isset($_SESSION['SES']['username'])) {
    $id = $_SESSION['SES']['id'];

    $sql_command = "SELECT ob.id, u.username, b.name, b.image, b.id AS book_id , w.name AS writer_name, p.name AS publisher_name, b.publishdate, b.description FROM ownedbooks ob JOIN users u ON ob.user = u.id JOIN books b ON ob.book = b.id JOIN writer w ON b.writer = w.id JOIN publisher p ON b.publisher = p.id WHERE u.id = $id;";
    $result = mysqli_query($sql_connection, $sql_command);
}
?>
<?php if ($result->num_rows === 0) { ?>
    <h1 class="h1 text-light">你目前尚未擁有任何書籍</h1>
    <a class="btn btn-light gogetbooks fw-bold fs-5" href="index.php?controller=book&page=list" role="button">前往獲取書籍</a>
    <style>
        main {
            flex-direction: column;
        }

        .gogetbooks {
            scale: 1;
            transition: all 0.3s ease;
        }

        .gogetbooks:hover {
            scale: 1.2;
            transition: all 0.3s ease;
        }
    </style>
    <?php } else {
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
                        <a href="javascript:viewbook('<?php echo $row['book_id']; ?>')" class="btn btn-primary stretched-link w-100">前往查看詳情</a>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
    echo '</div>';
    echo '</div>';
} ?>

<script type="text/javascript">
    function removebook(id) {
        if (confirm('確定要刪除?')) {
            window.location.href = 'app/scripts/book/general/remove_from_shelf.php?id=' + id;
        }
    }

    function viewbook(id) {
        window.location.href = 'index.php?controller=personal&page=ownedbookinfo&book_id=' + id;
    }
</script>