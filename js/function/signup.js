// Bắt sự kiện khi click vào nút Tạo tài khoản
$('#submit_signup').on('click', function() {
    // Gán các giá trị trong form đăng ký vào các biến
    $user_signup = $('#user_signup').val();
    $pass_signup = $('#pass_signup').val();
    $repass_signup = $('#repass_signup').val();
 
    // Nếu một trong các biến này rỗng
    if ($user_signup == '' || $pass_signup == '' || $repass_signup == '')
    {
        // Hiển thị thông báo lỗi
        $('#formSignup .alert').removeClass('hidden');
        $('#formSignup .alert').html('Vui lòng điền đầy đủ thông tin bên trên.');
    }
    // Ngược lại
    else
    {
        // Thực thi gửi dữ liệu bằng Ajax
        $.ajax({
            url : 'signup.php', // Đường dẫn file nhận dữ liệu
            type : 'POST', // Phương thức gửi dữ liệu
            // Các dữ liệu
            data : {
                user_signup : $user_signup,
                pass_signup : $pass_signup,
                repass_signup : $repass_signup
            // Thực thi khi gửi dữ liệu thành công
            }, success : function(data) {
                $('#formSignup .alert').html(data);
            }
        });
    }
});