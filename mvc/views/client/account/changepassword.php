<h3 class="p-2 pb-4 border-bottom mb-4 text-uppercase" style="font-size: 28px; color: #222222; font-weight:500">Thay đổi mật khẩu</h3>

<div class="col-sm-8 mx-auto px-5"  >
        <p><i>Bạn có chắc muốn thay đổi mật khẩu chứ? Vui lòng xác nhận lại mật khẩu hiện tại của bạn!</i></p>

    <div class="main-input py-3 new-customer" >
        <?php if (isset($_COOKIE['noti-type'])) { ?>
            <?php if ($_COOKIE['noti-type']=='success') { ?>
                <div class="alert alert-success">
                    <?= $_COOKIE['noti-message'] ?>
                </div>
            <?php } ?>
            <?php if ($_COOKIE['noti-type']=='error') { ?>
                <div class="alert alert-danger">
                    <?= $_COOKIE['noti-message'] ?>
                </div>
            <?php } ?>
        <?php } ?>
        <form action="account/changepassword" method="post">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mật khẩu hiện tại</label>
                <span class="text-danger">*</span>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="******">
            </div>
            <div class="mb-2">
                <label for="exampleInputPassword1" class="form-label">Mật khẩu mới</label>
                <span class="text-danger">*</span>
                <input type="password" class="form-control" name="new_password" id="exampleInputPassword1" placeholder="******">
            </div>
            <button type="submit" class="w-100 mt-3 btn btn-primary">Đổi mật khẩu</button>
        </form>
    </div>
</div>