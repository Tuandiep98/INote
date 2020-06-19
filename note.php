<?php
 
// Kết nối database, session, general info
require_once 'core/init.php';
 
// Nếu không tồn tại $user
if (!$user)
{
    header('Location: index.php'); // Di chuyển đến trang chủ
}
 
// Nếu tồn tại hành động nào đó gửi đến
if (isset($_POST['ac']))
{   
    $ac = $_POST['ac'];
    // Nếu hành động là create
    if ($ac == 'create')
    {
        // Nhận dữ liệu và gán vào các biến đồng thời xử lý chuỗi
        $title_create_note = $db->real_escape_string(@$_POST['title_create_note']);
        $body_create_note = $db->real_escape_string(@$_POST['body_create_note']);
 
        $title_create_note = trim(htmlentities($title_create_note));
        $body_create_note = htmlentities($body_create_note);
 
        // Các biến chứa code JS về thông báo
        $show_alert = "<script>$('#formCreateNote .alert').removeClass('hidden');</script>";
        $hide_alert = "<script>$('#formCreateNote .alert').addClass('hidden');</script>";
        $success_alert = "<script>$('#formCreateNote .alert').attr('class', 'alert alert-success');</script>";
 
        // Lệnh SQL tạo note
        $sql_create_note = "INSERT INTO notes VALUES (
            '',
            '$data_user[id_user]',
            '$title_create_note',
            '$body_create_note',
            '$date_current'
        )";
        // Thực thi truy vấn
        $db->query($sql_create_note);
        // Giải phóng kết nối
        $db->close();
 
        // Hiển thị thông báo và di chuyển đến trang edit của note vừa tạo
        echo $show_alert.$success_alert." Tạo ghi chú thành công
            <script>
                location.href = 'index.php?ac=edit_note&&id=".$db->insert_id()."';
            </script>
        ";
    }
    // Nếu hành động là edit
    else if ($ac == 'edit')
{
    // Nhận dữ liệu và gán vào các biến đồng thời xử lý chuỗi
    $title_edit_note = $db->real_escape_string(@$_POST['title_edit_note']);
    $body_edit_note = $db->real_escape_string(@$_POST['body_edit_note']);
    $id_edit_note = $db->real_escape_string(@$_POST['id_edit_note']);
 
    $title_edit_note = trim(htmlentities($title_edit_note));
    $body_edit_note = htmlentities($body_edit_note);
    $id_edit_note = trim(htmlentities($id_edit_note));
 
    // Các biến chứa code JS về thông báo
    $show_alert = "<script>$('#formEditNote .alert').removeClass('hidden');</script>";
    $hide_alert = "<script>$('#formEditNote .alert').addClass('hidden');</script>";
    $success_alert = "<script>$('#formEditNote .alert').attr('class', 'alert alert-success');</script>";
 
    // Lệnh SQL kiểm tra có tồn tại ID note
    $sql_check_id_exist = "SELECT id_note, user_id FROM notes WHERE user_id = '$data_user[id_user]' AND id_note = '$id_edit_note'";
 
    // Nếu có
    if ($db->num_rows($sql_check_id_exist))
    {
        // Lệnh SQL chỉnh sửa note
        $sql_edit_note = "UPDATE notes SET
            body = '$body_edit_note',
            title = '$title_edit_note'
            WHERE user_id = '$data_user[id_user]' AND id_note = '$id_edit_note'
        ";
        // Thực thi truy vấn
        $db->query($sql_edit_note);
        // Giải phóng kết nối
        $db->close();
 
        // Hiển thị thông báo và tải lại trang
        echo $show_alert.$success_alert." Đã chỉnh sửa ghi chú
            <script>
                location.reload();
            </script>
        ";
    }
    // Ngược lại không 
    else
    {
        // Hiển thị thông báo lỗi
        echo $show_alert.'Bạn đã cố tình sửa chữa ID ghi chú, nhưng rất tiếc ID ghi chú này không tồn tại hoặc không thuộc quyền sở hữu của bạn.';
    }
}
// Nếu hành động là delete
else if ($ac == 'delete')
{
    // Nhận dữ liệu và gán vào các biến đồng thời xử lý chuỗi
    $id_edit_note = $db->real_escape_string(@$_POST['id_edit_note']);
    $id_edit_note = trim(htmlentities($id_edit_note));
 
    // Các biến chứa code JS về thông báo
    $show_alert = "<script>$('#modalDeleteNote .alert').removeClass('hidden');</script>";
    $hide_alert = "<script>$('#modalDeleteNote .alert').addClass('hidden');</script>";
    $success_alert = "<script>$('#modalDeleteNote .alert').attr('class', 'alert alert-success');</script>";
         
    // Lệnh SQL kiểm tra có tồn tại ID note và thuộc quyền sở hữu
    $sql_check_id_exist = "SELECT id_note, user_id FROM notes WHERE user_id = '$data_user[id_user]' AND id_note = '$id_edit_note'";
 
    // Nếu có
    if ($db->num_rows($sql_check_id_exist))
    {
        // Lệnh SQL xoá note
        $sql_delete_note = "DELETE FROM notes WHERE user_id = '$data_user[id_user]' AND id_note = '$id_edit_note'";
        // Thực thi truy vấn
        $db->query($sql_delete_note);
        // Giải phóng kết nối
        $db->close();
 
        // Hiển thị thông báo và trở về trang chủ
        echo $show_alert.$success_alert." Xoá ghi chú thành công!
            <script>
                location.href = 'index.php';
            </script>
        ";
    }
    // Ngược lại không 
    else
    {
        // Hiển thị thông báo lỗi
        echo $show_alert.'Bạn đã cố tình sửa chữa ID ghi chú, nhưng rất tiếc ID ghi chú này không tồn tại hoặc không thuộc quyền sở hữu của bạn.';
    }
}
}
 
?>