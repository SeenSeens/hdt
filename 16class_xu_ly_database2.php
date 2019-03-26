<?php
require '15class_xu_ly_database1.php';
class DB_business extends DB_drive {
    // Tên table
    protected $_table_name = '';
    // Khóa chính
    protected $_key = '';
    // Khởi tạo
    function __construct() {
        parent::connect();
    }
    // Ngắt kết nối
    function __destruct() {
        parent::disconnect();
    }
    // Xóa theo id
    function delete_by_id($id) {
        return $this->remove($this->_table_name, $this->_key .'='. (int)$id);
    }
    // Thêm mới
    function add_new($data) {
        return $this->insert($this->_table_name, $data);
    }
    // Cập nhật theo id
    function update_by_id($data, $id) {
        return $this->update($this->_table_name, $data, $this->_key. '=' .(int)$id);
    }
    // Select theo id
    function select_by_id($select, $id) {
        $sql = "SELECT $select FROM".$this->_table_name ."WHERE". $this->_key   ."=". (int)$id;
        return $this->get_row($sql);
    }
}