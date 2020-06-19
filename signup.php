<?php
 
// Include database, session, general info
require_once 'core/init.php';
 
// Nếu tồn tại $user
if ($user)
{
    header('Location: index.php'); // Di chuyển đến trang chủ
}
 
// Nhận dữ liệu và gán vào các biến đồng thời xử lý chuỗi
$user_signup = $db->real_escape_string(@$_POST['user_signup']);
$pass_signup = @$_POST['pass_signup'];
$repass_signup = @$_POST['repass_signup'];
 
// Các biến chứa code JS về thông báo
$show_alert = "<script>$('#formSignup .alert').removeClass('hidden');</script>";
$hide_alert = "<script>$('#formSignup .alert').addClass('hidden');</script>";
$success_alert = "<script>$('#formSignup .alert').attr('class', 'alert alert-success');</script>";
 
// Lệnh SQL kiểm tra sự tồn tại của username
$sql_check_user_exist = "SELECT username FROM users WHERE username = '$user_signup'";
 
// Nếu độ dài tên đăng nhập không nằm trong khoảng từ 6-24 ký tự
if (strlen($user_signup) < 6 || strlen($user_signup) > 24)
{
    echo $show_alert.'Tên đăng nhập phải nằm trong khoảng 6-24 ký tự.';
}
// Ngược lại nếu tên đăng nhập chứa ký tự đặc biệt và khoảng trắng
else if (preg_match('/\W/', $user_signup))
{
    echo $show_alert.'Tên đăng nhập không được chứa ký tự đặc biệt và khoảng trắng.';
}
// Ngược lại nếu tồn tại tên đăng nhập
else if ($db->num_rows($sql_check_user_exist))
{
    echo $show_alert.'Tên đăng nhập đã tồn tại, vui lòng sử dụng tên khác.';
}
// Ngược lại nếu độ dài mật khẩu nhỏ hơn 6
else if (strlen($pass_signup) < 6)
{
    echo $show_alert.'Mật khẩu quá ngắn, hãy thử với mật khẩu khác an toàn hơn.';
}
// Ngược lại nếu mật khẩu nhập lại không khớp
else if ($pass_signup != $repass_signup)
{
    echo $show_alert.'Mật khẩu nhập lại không khớp, đảm bảo đã tắt caps lock.';
}
// Ngược lại
else
{
    $pass_signup = md5($pass_signup); // Mã hoá mật khẩu sang MD5
    // Lệnh SQL tạo tài khoản
    $sql_signup = "INSERT INTO users VALUES (
        '',
        '$user_signup',
        '$pass_signup',
        '$date_current'
    )";
    // Thực thi truy vấn
    $db->query($sql_signup);
 
    // Gửi dữ liệu để lưu session
    $session->send($user_signup);
    // Giải phóng kết nối
    $db->close();
     
    // Hiển thị thông báo và tải lại trang
    echo $show_alert.$success_alert." Đăng ký tài khoản thành công.
        <script>
            location.reload();
        </script>
    ";
}
 
?>