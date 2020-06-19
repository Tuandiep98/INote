<div class="container" style="width: 40%">
    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#description" role="tab" aria-controls="description" aria-selected="true">Đăng nhập</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#history" role="tab" aria-controls="history" aria-selected="false">Đăng ký</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content mt-3">
                <div class="tab-pane active" id="description" role="tabpanel">
                    <form method="POST" onsubmit="return false;" id="formSignin">
                        <div class="form-group">
                            <label for="user_signin">Tên đăng nhập</label>
                            <input type="text" class="form-control" id="user_signin">
                        </div>
                        <div class="form-group">
                            <label for="pass_signin">Mật khẩu</label>
                            <input type="password" class="form-control" id="pass_signin">
                            <a href="#">Quên mật khẩu?</a>
                        </div>
                        <button class="btn btn-primary" id="submit_signin">Đăng nhập</button>
                        <br><br>
                        <div class="alert alert-danger hidden"></div>
                    </form>
                </div>

                <div class="tab-pane" id="history" role="tabpanel" aria-labelledby="history-tab">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Bạn ơi!</strong> nhập đầy đủ thông tin dưới đây
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="POST" onsubmit="return false;" id="formSignup">
                        <div class="form-group">
                            <label for="user_signin">Tên đăng nhập</label>
                            <input type="text" class="form-control" placeholder="Tên đăng nhập" id="user_signup">
                        </div>
                        <div class="form-group">
                            <label for="pass_signin">Mật khẩu</label>
                            <input type="password" class="form-control" placeholder="Mật khẩu" id="pass_signup">
                        </div>
                        <div class="form-group">
                            <label for="pass_signin">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" id="repass_signup">
                        </div>
                        <button class="btn btn-success" id="submit_signup">Tạo tài khoản</button>
                        <br><br>
                        <div class="alert alert-danger hidden"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>