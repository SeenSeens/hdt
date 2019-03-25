<?php
// 1) Khai báo tên thuộc tính để nhận dạng mức độ truy cập

/* Cách chọn từ đặt tên cho biến (Tên biến (thuộc tính) phải là 1 danh từ or tính từ, tên hàm (phương thức) bắt đầu bằng 1 động từ)
class A {
    public $username;
    public $password;
    function getUsername() {

    }
    function getPassword() {

    }
    function checkLogin() {

    }
}  */

/* Khai báo tên biến dạng private (Nên đặt 2 dấu gạch dưới (__) rồi mới đến tên biến)
class A {
    private $__private;
    private function __func_private() {
        
    }
} */

/* Khai báo tên biến dạng protected (Nên đặt 1 dấu gạch dưới (_) rồi mới tới tên biến)
class A {
    protected $_protected;
    protected function _func_protected() {

    }
} */

/* Khai báo tên biến dạng public (Khai báo tên bình thường)
class A {
    public $public;
    public function func_public() {

    }
} */

/* ================================================================================================================== */

// 2) Hàm Set và hàm get các thuộc tính (Hàm set (gán dữ liệu), hàm get(lấy dữ liệu))
// Quy tắc đặt tên (setThuoctinh(), getThuoctinh())
/* class A {
    private $__username;
    private $__password;
    function getUsername() {
        return 'Xin chào '.$this->__username;
    }
    function setUsername($username) {
        $this->__username = $username;
    }
    function setPassword($password) {
        $this->__password = md5($password.'ky_tu_muon_them');
    }
    function getPassword() {
        return $this->__password;
    }
}
$a = new A();
$a->setUsername('Ahihi đồ ngốc');
echo $a->getUsername();
$a->setPassword('matkhau');
echo '<br>'.$a->getPassword();  */

/* ================================================================================================================== */

/* 3) Khi nào sử dụng private
Những thuộc tính có tính biến đỗi dữ liệu khi nhập & lấy dữ liệu vd Usernam & Password
Những phương thức chỉ dùng trong nội bộ trong lớp đó, không sử dụng bên ngoài lớp */

/* 4) Khi nào sử dụng protected
Dùng khi biết chắc là có lớp khác sẽ kế thừa lớp này & những phương thức, thuộc tính đó chỉ được dùng trong lớp kế thừa nó. */

/* 5) Khi nào sử dụng public
Dùng để lấy dữ liệu & gán dữ liệu ra bên ngoài, or là những hàm mang tính chất là hàm thao tác cuối cùng với người coder. VD: hàm SET & hàm GET */