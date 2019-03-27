<?php
/* 1) Set và get trong php
- Set là thiết lập, get là lấy ra.
- 2 phương thức này giúp ta can thiệp vào quá trình thiết lập giá trị và lấy giá trị của 1 thuộc tính nào đó trong lớp. */
// Vd:
class className {
    private $__username;
    private $__password;
    // Set
    function setUsername($value) {
        $this->__username = $value;
    }
    function setPassword($value) {
        $this->__password = $value;
    }
    // Get
    function getUsername() {
        return $this->__username;
    }
    function getPassword() {
        return $this->__password;
    }
}
$class = new className();
// Set
$class->setUsername('Tuan_IT<br>');
$class->setPassword('tuan123');
// Get
echo $class->getUsername();
echo $class->getPassword();

echo '<br>=========================================================================================================<br>';

/* 2) Tại sao & khi nào thì sử dụng set & get
=> Trường hợp thuộc tính là private or public
- Thuộc tính ở mức truy cập private thì không thể sử dụng ở ngoài lớp được.
- Đôi lúc ta muốn nó là private nhưng vẫn sử dụng được nó thì đòi hỏi ta phải truy xuất thông qua 1 function trung gian, function trung gian này là set và get.
=> Trường hợp muốn xử lý trước khi gán dữ liệu
- Khi muốn thực hiện 1 số thao tác nào đó trước khi gán or lấy dữ liệu của thuộc tính. */

// vd: Xử lý get lúc gán
class className1 {
    private $__password;
    private $__username;
    // Xử lý get lúc gán
    function setPassword($value) {
        $this->__password = md5('prefix'.$value);
    }
    function setUsername($value) {
        $this->__username = $value;
    }
    // Xử lý set trước khi lấy
    function getUsername() {
        return 'Your account is '.$this->__username;
    }
    function getPassword() {
        return $this->__password;
    }
}
$class1 = new className1();
$class1->setPassword('ahihi');
$class1->setUsername('TuanIT');
echo $class1->getUsername();
echo '<br>'.$class1->getPassword();

echo '<br>=========================================================================================================<br>';

/* 3) Magic method __get và __set.
- 2 hàm này sẽ tự động gọi khi bạn truy xuất hay gán đến 1 thuộc tính trong lớp.
- Cú pháp hàm set: __set($key, $value)
    + $key là tên thuộc tính.
    + $value là giá trị thuộc tính.
- Cú pháp hàm get: __get($key)
    + $key là thuộc tính cần lấy */

// __set
class className2 {
    public $username;
    function __set($key, $value) {
        if($key = 'somekey') {
            $this->username = $value;
        }
    }
}
$class2 = new className2();
$class2->somekey = 'tuanit';
echo $class2->username;
// __get
class className3 {
    public $username = 'tuanit';
    function __get($key) {
        return $this->username;
    }
}
$class3 = new className3();
echo '<br>'.$class3->somekey;