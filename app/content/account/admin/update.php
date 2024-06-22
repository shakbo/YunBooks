<?php
if (isset($_GET['id'])) {
    $sql_command = "SELECT u.id, u.username, u.password, u.email, u.phoneNumber, a.name AS accesslevel FROM users u JOIN accesslevel a ON u.accesslevel = a.id WHERE u.id =" . $_GET['id'];
    $result = mysqli_query($sql_connection, $sql_command);
    $row = mysqli_fetch_assoc($result);
}
?>

<form id="adminEditUpdateForm" method="post" action="app/scripts/account/admin/update.php" class="needs-validation blur-background p-5 text-light mx-auto my-5" style="max-width: 500px; min-width: 500px;" novalidate>
    <div class="mb-3">
        <label for="adminEditUpdateInputId" class="form-label">資料庫編號</label>
        <input type="text" class="form-control" id="adminEditUpdateInputId" name="id" maxlength="800" value="<?php echo $row['id']; ?>" readonly>
    </div>
    <div class="mb-3">
        <label for="adminEditUpdateInputUsername" class="form-label">使用者名稱</label>
        <input type="text" class="form-control" id="adminEditUpdateInputUsername" name="username" data-v-min-length="3" value="<?php echo $row['username']; ?>" required>
    </div>
    <div class="mb-3">
        <label for="adminEditUpdateInputEmail" class="form-label">電子郵件地址</label>
        <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" id="adminEditUpdateInputEmail" name="email" data-v-min-length="3" value="<?php echo $row['email']; ?>" readonly>
    </div>
    <div class="mb-3">
        <label for="adminEditUpdateInputphoneNumber" class="form-label">電話號碼(選填)</label>
        <input type="tel" pattern="\+886[0-9]{9}" class="form-control" id="adminEditUpdateInputphoneNumber" name="phoneNumber" placeholder="+886123456789" value="<?php echo $row['phoneNumber']; ?>">
    </div>
    <label for="adminEditUpdateInputaccesslevel" class="form-label">使用者權限</label>
    <select class="form-select mb-3" name="accesslevel" id='adminEditUpdateInputaccesslevel' aria-label="權限">
        <option value="1">管理員</option>
        <option value="2">一般用戶</option>
    </select>
    <div class="mb-3">
        <label for="adminEditUpdateInputPassword" class="form-label">更新密碼(選填)</label>
        <input type="password" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])\S{6,}" class="form-control" id="adminEditUpdateInputPassword" name="password">
    </div>
    <button type="submit" form="adminEditUpdateForm" class="btn btn-primary w-100 mb-5" name="btn-update">更新</button>
    <a class="btn btn-secondary w-100" href="index.php?controller=admin&page=accounts" style="max-width: 500px;">取消</a>
</form>

<script type='text/javascript'>
    $(document).ready(function() {
        $("#adminEditUpdateInputaccesslevel option:contains(" + '<?php echo $row['accesslevel']; ?>' + ")").attr('selected', 'selected');
    });
</script>