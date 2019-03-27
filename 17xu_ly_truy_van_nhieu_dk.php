<?php
// B1: Lấy thông tin cần lọc
$filter = array(
    'email' => isset($_GET['email']) ? mysqli_real_escape_string($this->__conn, $_GET['email']) : false,
    'phone' => isset($_GET['phone']) ? mysqli_real_escape_string($this->__conn, $_GET['phone']) : false,
    'address' => isset($_GET['address']) ? mysqli_real_escape_string($this->__conn, $_GET['address']) : false,
    'fullname' => isset($_GET['fullname']) ? mysqli_real_escape_string($this->__conn, $_GET['fullname']) : false
);

// B2: Xử lý điều kiện lọc
$where = array();
// Nếu có chọn lọc thì thêm điều kiện vào mảng
if($filter['email']) {
    $where[] = "email = '{$filter['email']}'";
}
if($filter['phone']) {
    $where[] = "phone = '{$filter['phone']}'";
}
if($filter['address']) {
    $where[] = "address = '{$filter['address']}'";
}
if($filter['fullname']) {
    $where[] = "fullname = '{$filter['fullname']}'";
}

// B3: Truy vấn cuối cùng
$sql = 'SELECT * FROM customer';
if($where) {
    $sql .= 'WHERE'.implode('AND', $where);
}