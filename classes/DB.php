<?php
 
class DB
{
    // Khai báo các biến dưới dạng private
    private $hostname = 'localhost',
            $username = 'root',
            $password = '',
            $dbname = 'inote';
 
    // Khai báo các biến kết nối toàn cục
    public $cn = NULL;
    public $rs = NULL;
 
    // Hàm kết nối
    public function connect()
    {
        // Kết nối
        $this->cn = mysqli_connect($this->hostname, $this->username, $this->password, $this->dbname);
    }
 
    // Hàm ngắt kết nối
    public function close(){
        // Nếu đã kết nối
        if ($this->cn){
            // Ngắt kết nối
            mysqli_close($this->cn);
        }
    }
 
    // Hàm truy vấn
    public function query($sql = null) 
    {       
        // Nếu đã kết nối
        if ($this->cn){
            // Truy vấn
            mysqli_query($this->cn, $sql);
        }
    }
 
    // Hàm đếm hàng
    public function num_rows($sql = null) 
    {
        // Nếu đã kết nối
        if ($this->cn)
        {
            $query = mysqli_query($this->cn, $sql);
            $row = mysqli_num_rows($query);
            return $row;
        }
    }
 
    // Hàm lấy dữ liệu
    public function fetch_assoc($sql = null, $type)
    {
        // Nếu đã kết nối
        if ($this->cn)
        {
            // Thực thi truy vấn
            $query = mysqli_query($this->cn, $sql);
            // Nếu tham số type = 0
            if ($type == 0)
            {
                while ($row = mysqli_fetch_assoc($query))
                {
                    $data[] = $row;
                }
                return $data;
            }
            // Nếu tham số type = 1
            else if ($type == 1)
            {
                $data = mysqli_fetch_assoc($query);
                return $data;
            }       
        }
    }
 
    // Hàm xử lý chuỗi dữ liệu truy vấn
    public function real_escape_string($string) {
        // Nếu đã kết nối
        if ($this->cn)
        {
            // Xử lý chuỗi dữ liệu truy vấn
            $string = mysqli_real_escape_string($this->cn, $string);
        }
        // Ngược lại chưa kết nối
        else
        {
            $string = $string;
        }
        return $string;
    }
 
    // Hàm lấy ID vừa insert
    public function insert_id() {
        // Nếu đã kết nối
        if ($this->cn)
        {
            // Lấy ID vừa insert
            return mysqli_insert_id($this->cn);
        }
    }
}
 
?>