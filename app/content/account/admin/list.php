<?php
$sql_command = "SELECT u.id, u.username, u.password, u.email, u.phoneNumber, a.name AS accesslevel FROM users u JOIN accesslevel a ON u.accesslevel = a.id;";
$result = mysqli_query($sql_connection, $sql_command); ?>
<div class="table-responsive-sm">
    <table class="table w-75 table-striped m-auto table-nowrap my-5">
        <thead>
            <th colspan="7" class="text-center"><a href="#" class="text-light text-decoration-none fs-4 " data-bs-toggle="modal" data-bs-target="#adminCreateModal">新增資料</a></th>
        </thead>
        <thead>
            <th scope="col" class="text-center text-light">編號</th>
            <th scope="col" class="text-center text-light">使用者名稱</th>
            <th scope="col" class="text-center text-light">電子郵箱地址</th>
            <th scope="col" class="text-center text-light">電話號碼</th>
            <th scope="col" class="text-center text-light">權限</th>
            <th scope="col" class="text-center text-light" colspan="2">操作</th>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr class="align-middle">
                    <th scope="row" class="text-center text-light"><?php echo $row['id']; ?></th>
                    <td class="text-light"><?php echo $row['username']; ?></td>
                    <td class="text-light"><?php echo $row['email']; ?></td>
                    <?php if ($row["phoneNumber"] == null) : ?>
                        <td class="text-center text-light">無</td>
                    <?php else : ?>
                        <td class="text-center text-light"><?php echo $row['phoneNumber']; ?></td>
                    <?php endif; ?>
                    <td class="text-center text-light"><?php echo $row['accesslevel']; ?></td>
                    <td class="text-center"><a class="fw-bold btn btn-warning" href="javascript:edt_id('<?php echo $row['id']; ?>')">編輯</a></td>
                    <td class="text-center"><a class="fw-bold btn btn-danger" href="javascript:delete_id('<?php echo $row['id']; ?>')">刪除</a></td>
                </tr>
            <?php
            } ?>
        </tbody>
    </table>
</div>

<script type="text/javascript">
    function edt_id(id) {
        if (confirm('確定要修改?')) {
            window.location.href = 'index.php?controller=admin&page=accountupdate&id=' + id;
        }
    }

    function delete_id(id) {
        if (confirm('確定要刪除?')) {
            window.location.href = 'app/scripts/account/admin/delete.php?id=' + id;
        }
    }
</script>