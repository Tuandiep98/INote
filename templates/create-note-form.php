<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tạo ghi chú mới</li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="card">
        <div class="card-header">
            Ghi chú mới
        </div>
        <div class="card-body">
            <form method="POST" onsubmit="return false;" id="formCreateNote">
                <div class="form-group">
                    <label for="user_signin">Tiêu đề</label>
                    <input type="text" class="form-control" id="title_create_note" placeholder="Nhập tiêu đề">
                </div>
                <div class="form-group">
                    <label for="pass_signin">Nội dung</label>
                    <textarea class="form-control" id="body_create_note" rows="5" placeholder="Nhập nội dung..."></textarea>
                </div>
                <button class="btn btn-success" id="submit_create_note">
                    <span class="glyphicon glyphicon-ok"></span> Hoàn tất
                </button>
                <br><br>
                <div class="alert alert-danger hidden"></div>
            </form>
        </div>
    </div>
</div>