<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Danh sách ghi chú</li>
        </ol>
    </nav>
</div>
<div class="modal fade" id="DeleteNote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            </div>
            <div class="modal-body">
                <p>Xác nhận xóa ghi chú này ?</p>
                <div class="alert alert-danger hidden"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
                <button type="button" class="btn btn-primary" id="submit_delete_note">Xóa</button>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-3" style="padding-top: 20px">
                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                        <div class="card-header">
                            <button type="button" class="btn btn-outline-light" data-toggle="modal" data-target="#exampleModal">+ Thêm ngay</button>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Ghi chú mới</h5>
                            <p class="card-text">Tạo một ghi chú mới với nội dung tùy chọn mà bạn thích.</p>
                            <small>Hôm nay</small>
                        </div>
                    </div>
                </div>
            <?php
            // Lênh SQL lấy danh sách note theo ID user
            $sql_get_data_list_note = "SELECT * FROM notes WHERE user_id = '$data_user[id_user]' ORDER BY id_note DESC";

            // Nếu có 
            if ($db->num_rows($sql_get_data_list_note)) {
                // In danh sách ghi chú
                foreach ($db->fetch_assoc($sql_get_data_list_note, 0) as $key => $data_list_note) {
                    $date_created = $data_list_note['date_created'];
                    $day_created = substr($date_created, 8, 2); // Ngày tạo
                    $month_created = substr($date_created, 5, 2); // Tháng tạo
                    $year_created = substr($date_created, 0, 4); // Năm tạo
                    $hour_created = substr($date_created, 11, 2); // Giờ tạo
                    $min_created = substr($date_created, 14, 2); // Phút tạo

                    // Chấm 3 chấm khi nội dung ghi chú dài hơn 300 ký tự
                    if (strlen($data_list_note['body']) > 300) {
                        $data_list_note['body'] = substr($data_list_note['body'], 0, 300) . ' ...';
                    } else {
                        $data_list_note['body'] = $data_list_note['body'];
                    }

                    if($data_list_note['id_note']%2==0){
                        echo '
                    <div class="col-sm-3" style="padding-top: 20px">
                    <div class="card bg-warning   mb-3" style="max-width: 18rem;">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-6">
                                <input class="" type="hidden" value="' . $data_list_note['id_note'] . '" id="id_edit_note">
                            </div>
                            <div class="col-sm-3">
                                <a href="index.php?ac=edit_note&&id=' . $data_list_note['id_note'] . '" class="btn btn-outline-dark" aria-label="Edit">
                                    SỬA
                                </a>
                            </div>
                            <div class="col-sm-3">
                                <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#DeleteNote" aria-label="Close">
                                    X
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <h5>' . $data_list_note['title'] . '</h5>
                        <p class="card-title">' . $data_list_note['body'] . '</p>
                        <small class="card-text"> Tạo lúc: 
                        ' . $hour_created . ':' . $min_created . ' - 
                        ' . $day_created . ' /
                        ' . $month_created . ' /
                        ' . $year_created . '
                        </small>
                    </div>
                    </div> 
                    </div>   
                        ';
                    }else{
                        echo '
                    <div class="col-sm-3" style="padding-top: 20px">
                    <div class="card">
                    <div class="card-header">
                    <div class="row">
                    <div class="col-sm-6">
                        <input class="" type="hidden" value="' . $data_list_note['id_note'] . '" id="id_edit_note">
                    </div>
                    <div class="col-sm-3">
                        <a href="index.php?ac=edit_note&&id=' . $data_list_note['id_note'] . '" class="btn btn-outline-dark" aria-label="Edit">
                            SỬA
                        </a>
                    </div>
                    <div class="col-sm-3">
                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#DeleteNote" aria-label="Close">
                            X
                        </button>
                    </div>
                </div>
                    </div>
                    <div class="card-body">
                    <h5>' . $data_list_note['title'] . '</h5>
                        <p class="card-title">' . $data_list_note['body'] . '</p>
                        <small class="card-text"> Tạo lúc: 
                        ' . $hour_created . ':' . $min_created . ' - 
                        ' . $day_created . ' /
                        ' . $month_created . ' /
                        ' . $year_created . '
                        </small>
                    </div>
                    </div> 
                    </div>   
                        ';
                    }
                }
            }
            // Ngược lại không có
            else {
                // Hiển thị thông báo
                echo '
                <div class="col-sm-9">
                <div class="alert alert-warning alert-dismissible fade show" style="margin-top:20px" role="alert">
                <strong>Bạn ơi!</strong> bạn chưa có ghi chú, thêm ngay ghi chú mới nào!.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              </div>
                    ';
            }
            ?>
            </div>
        </div>
    </div>
</div>
<!-- Modal add note test -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ghi chú mới</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>