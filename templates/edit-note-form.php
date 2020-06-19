<?php

// Lệnh SQL lấy dữ liệu note theo ID
$sql_get_data_note = "SELECT * FROM notes WHERE user_id = '$data_user[id_user]' AND id_note = '$get_id'";

// Lấy dữ liệu
$data_note = $db->fetch_assoc($sql_get_data_note, 1);

$date_created = $data_note['date_created'];
$day_created = substr($date_created, 8, 2); // Ngày tạo
$month_created = substr($date_created, 5, 2); // Tháng tạo
$year_created = substr($date_created, 0, 4); // Năm tạo
$hour_created = substr($date_created, 11, 2); // Giờ tạo
$min_created = substr($date_created, 14, 2); // Phút tạo

?>

<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Danh sách ghi chú</a></li>
            <li class="breadcrumb-item active" aria-current="page">Sửa ghi chú</li>
        </ol>
    </nav>
</div>
<div class="container">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Tạo ngày </strong> <?php
                                        // Hiển thị ngày tháng tạo
                                        echo $day_created . ' tháng
                     ' . $month_created . ' năm
                     ' . $year_created . ' lúc
                     ' . $hour_created . ':' . $min_created;
                                        ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="card">
        <div class="card-header">
            Sửa ghi chú
        </div>
        <div class="card-body">
            <form method="POST" onsubmit="return false;" id="formEditNote">
                <div class="form-group">
                    <label for="user_signin">Tiêu đề</label>
                    <input type="text" class="form-control" id="title_edit_note" value="<?php echo $data_note['title'];  ?>">
                </div>
                <div class="form-group">
                    <label for="pass_signin">Nội dung</label>
                    <textarea class="form-control" id="body_edit_note" rows="5"><?php echo $data_note['body'];  ?></textarea>
                </div>
                <input type="hidden" value="<?php echo $data_note['id_note']; ?>" id="id_edit_note">
                
                <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#modalDeleteNote">
                    <span class="glyphicon glyphicon-trash"></span> Xoá ghi chú
                </button>
                <button class="btn btn-primary" id="submit_edit_note">
                    <span class="glyphicon glyphicon-ok"></span> Lưu thay đổi
                </button>
                <br><br>
                <div class="alert alert-danger hidden"></div>
            </form>
        </div>
    </div>
</div>