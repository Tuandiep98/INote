<?php include "includes/header.php"; ?>
<div class="container" width="40%">
    <div class="card">
        <div class="card-header">
            Đăng ký
        </div>
        <div class="card-body">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Bạn ơi!</strong> nhập đầy đủ thông tin dưới đây
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" onsubmit="return false;" id="formSignup">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Tên đăng nhập" id="user_signup">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Mật khẩu" id="pass_signup">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" id="repass_signup">
                </div>
                <button class="btn btn-success" id="submit_signup">Tạo tài khoản</button>
                <a href="#">Chuyển qua đăng nhập</a>
                <br><br>
                <div class="alert alert-danger hidden"></div>
            </form>
        </div>
    </div>
</div>
<?php include "includes/footer.php"; ?>