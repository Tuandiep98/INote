<?php
 
// Kết nối database, session, general info
require_once 'core/init.php';
 
// Nếu không tồn tại $user
if (!$user)
{
    header('Location: index.php'); // Di chuyển đến trang chủ
}
 
// Nhận dữ liệu và gán vào các biến đồng thời xử lý chuỗi
$old_pass = @md5($_POST['old_pass']);
$new_pass = @$_POST['new_pass'];
$re_new_pass = @$_POST['re_new_pass'];
 
// Các biến chứa code JS về thông báo
$show_alert = "<script>$('#formChangePass .alert').removeClass('hidden');</script>";
$hide_alert = "<script>$('#formChangePass .alert').addClass('hidden');</script>";
$success_alert = "<script>$('#formChangePass .alert').attr('class', 'alert alert-success');</script>";
 
// Nếu mật khẩu cũ nhậ đúng
if ($old_pass != $data_user['password'])
{
    echo $show_alert.'Mật khẩu cũ nhập không chính xác, đảm bảo đã tắt caps lock.';
}
// Ngược lại nếu độ dài mật khẩu mới nhỏ hơn 6 ký tự
else if (strlen($new_pass) < 6)
{
    echo $show_alert.'Mật khẩu quá ngắn, hãy thử với mật khẩu khác an toàn hơn.';
}
// Ngược lại nếu mật khẩu mởi nhập lại không khớp
else if ($new_pass != $re_new_pass)
{
    echo $show_alert.'Nhập lại mật khẩu mới không khớp, đảm bảo đã tắt caps lock.';
}
// Ngược lại
else
{
    $new_pass = md5($new_pass); // Mã hoá mật khẩu sang MD5
    // Lệnh SQL đổi mật khẩu
    $sql_change_pass = "UPDATE users SET password = '$new_pass' WHERE id_user = '$data_user[id_user]'";
    // Thực hiện truy vấn
    $db->query($sql_change_pass);
    // Giải phóng kết nối
    $db->close();
     
    // Hiển thị thông báo và tải lại trang
    echo $show_alert.$success_alert.'Đổi mật khẩu thành công.
        <script>
            location.reload();
        </script>
    ';
}
 
?>