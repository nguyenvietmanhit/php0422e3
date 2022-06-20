<!--views/users/register.php-->
<h2>Form đăng ký</h2>
<form action="" method="post">
    <div class="form-group">
        <label for="username">Nhập username</label>
        <input type="text" name="username" id="username"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="password">Nhập mật khẩu</label>
        <input type="password" name="password" id="password"
               class="form-control"/>
    </div>
    <div class="form-group">
        <label for="password_confirm">Nhập lại mật khẩu</label>
        <input type="password" name="password_confirm"
               id="password_confirm" class="form-control" />
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Lưu"
               class="btn btn-primary" />
        Đã có tài khoản, đăng nhập tại
        <a href="index.php?controller=user&action=login">đây</a>
    </div>
</form>
