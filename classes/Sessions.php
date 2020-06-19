<?php
 
class Session {
    // Hàm gửi dữ liệu
    public function send($user) {
        $_SESSION['user'] = $user;
    }
 
    // Hàm bắt đầu lưu session
    public function start() {
        session_start();
    }
 
    // Hàm lấy dữ liệu
    public function get() {
        // Nếu có tồn tại session đang lưu
        if (isset($_SESSION['user']))
        {
            // Gán $user với session
            $user = $_SESSION['user'];
        }
        // Ngược lại không tồn tại session
        else
        {
            $user = '';
        }
        return $user;
    }
 
    // Hàm xoá session
    public function destroy() {
        session_destroy();
    }
}
 
?>