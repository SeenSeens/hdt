<?php
require '16class_xu_ly_database2.php';
/* // Tạo mới đối tượng
$DB = new DB_drive();
// Insert
$DB->insert('customer', array(
    'name' => 'Trương Đình Tuấn',
    'phone' => '0385573558'
));
// Update
/* $DB->update('customer', array(
    'name' => 'Trương Đình Tuấn',
    'phone' => '0968320572'
), 'id' = 1); */
// Delete
/* $DB->remove('customer', 'id' = 1); */
// Get list
/* var_dump($DB->get_list('SELECT * FROM customer'));
// Get row
var_dump($DB->get_row('SELECT * FROM customer WHERE id = 2')); */

class Customer extends DB_business {
    function __construct() {
        // Khai báo tên bảng
        $this->_table_name = 'customer';
        // Khai báo tên field id
        $this->_key = 'id';
        // Gọi hàm khởi tạo cha
        parent::__construct();
    }
}
$customer = new Customer();
// Thêm khách hàng
$customer->add_new(array(
    'name' => 'Trương Đình Tuấn',
    'phone' => '0385573558',
));
// Xóa khách hàng
$customer->delete_by_id(1);
// Update khách hàng
$customer->update_by_id(array(
    'name' => 'Trương Đình Tuấn',
    'phone' => '0968320572'
), 2);
// Lấy chi tiết khách hàng
var_dump($customer->select_by_id('*', 2));