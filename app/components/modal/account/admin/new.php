<div class="modal fade" id="adminCreateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="adminCreateModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="adminCreateModal">新增帳號</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="adminCreateForm" method="post" action="app/scripts/account/admin/new.php" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label for="adminCreateInputUsername" class="form-label">使用者名稱</label>
                        <input type="text" class="form-control" id="adminCreateInputUsername" name="username" data-v-min-length="3" data-v-message="長度需超過 3 個字" required>
                    </div>
                    <div class="mb-3">
                        <label for="adminCreateInputEmail" class="form-label">電子郵箱地址</label>
                        <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" id="adminCreateInputEmail" name="email" data-v-min-length="3" data-v-message="電子郵件不符合格式" required>
                    </div>
                    <div class="mb-3">
                        <label for="adminCreateInputPhoneNumber" class="form-label">電話號碼(選填)</label>
                        <input type="tel" pattern="\+886[0-9]{9}" class="form-control" id="adminCreateInputPhoneNumber" name="phoneNumber" placeholder="+886123456789" data-v-message="電話號碼不符合格式">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="accesslevel" aria-label="權限" required>
                            <option selected>使用者權限</option>
                            <option value="1">管理員</option>
                            <option value="2">一般用戶</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="adminCreateInputPassword" class="form-label">密碼</label>
                        <input type="password" pattern="(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])\S{6,}" class="form-control" id="adminCreateInputPassword" name="password" data-v-message="長度需大於六個字，並包含大小寫英文及數字。" required>
                    </div>
                    <div class="mb-3">
                        <label for="adminCreateInputConfirmPassword" class="form-label">確認密碼</label>
                        <input type="password" class="form-control" id="adminCreateInputConfirmPassword" name="confirmPassword" data-v-equal="#adminCreateInputPassword" data-v-message="密碼不一致" required>
                    </div>
                    <button type="submit" form="adminCreateForm" class="btn btn-primary w-100">新增</button>
                </form>
            </div>
        </div>
    </div>
</div>