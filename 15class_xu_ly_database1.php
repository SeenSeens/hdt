<?php
/* 1) Cấu trúc các lớp đối tượng xử lý database
- libs
    - DB_business.php
    - DB_drive.php
    - demo.php

- DB_drive đóng vai trò làm adapter, nó chứa các hàm basic xử lý kết nối, câu truy vấn.
- DB_business kế thừa DB_drive ngoài sử dụng các hàm kế thừa thì nó sẽ thêm các hàm hỗ trợ truy vấn theo id.
- demo chứa những đoạn code hướng dẫn sử dụng. */

/* 2) DB_business (Adapter) */
// Thư viện xử lý database
class DB_drive {
    // Biến lưu trữ kết nối
    private $__conn;
    // Hàm kết nối
    function connect() {
        // Nếu chưa kết nối thì thực hiện kết nối
        if(!$this->__conn) {
            // Kết nối
            $this->__conn = mysqli_connect('localhost', 'root', '', 'hdt') or die('Lỗi kết nối');
            // Utf-8 tránh lỗi font
            mysqli_query($this->__conn, "SET character_set_results = 'utf-8', character_set_client = 'utf-8', character_set_database = 'utf-8', character_set_server = 'utf-8'");
        }
    }
    // Hàm ngắt kết nối
    function disconnect() {
        // Nếu đang kết nối thì ngắt kết nối
        if($this->__conn) {
            mysqli_close($this->__conn);
        }
    }
    // Hàm insert
    function insert($table, $data) {
        // Kết nối
        $this->connect();
        // Lưu trữ danh sách field
        $field_list = '';
        // Lưu trữ danh sách giá trị tương ứng với field
        $value_list = '';
        // Lặp qua data
        foreach($data as $key => $value) {
            $field_list .= $key;
            $value_list .= ", '".mysqli_real_escape_string($this->__conn, $value)."' ";
        }
        // Sau vòng lặp sẽ dư dấu , dùng hàm trim() để xóa dấu ,
        $sql = 'INSERT INTO'.$table.'('.trim($field_list, ',').') VALUES('.trim($value_list, ',').')';
        return mysqli_query($this->__conn, $sql);
    }
    // Hàm update
    function update($table, $data, $where) {
        // Kết nối
        $this->connect();
        $sql = '';
        // Lặp qua data
        foreach($data as $key => $value) {
            $sql .="$key = '".mysqli_real_escape_string($this->__conn, $value)."',"; 
        }
        // Vì sau vòng lặp biến $sql sẽ dư dấu (,) dùng hàm trim() để xóa nó
        $sql = 'UPDATE'.$table.'SET'.trim($sql, ',').'WHERE'.$where;
        return mysqli_query($this->__conn, $sql);
    }
    // Hàm delete
    function remove($table, $where) {
        // Kết nối
        $this->connect();
        // Delete
        $sql = "DELETE FROM $table WHERE $where";
        return mysqli_query($this->__conn, $sql);
    }
    // Hàm lấy danh sách
    function get_list($sql) {
        // Kết nối
        $this->connect();
        $result = mysqli_query($this->__conn, $sql);
        if(!$result) {
            die('Truy vấn bị sai');
        }
        $return = array();
        // Lặp qua kết quả đưa vào mảng
        while ($row = mysqli_fetch_assoc($result)) {
            $return[] = $row;
        }
        // Xóa kết quả khỏi bộ nhớ
        mysqli_free_result($result);
        return $return;
    }
    // Hàm lấy 1 record 
    function get_row($sql) {
        // Kết nối
        $this->connect();
        $result = mysqli_query($this->__conn, $sql);
        if(!$result) {
            die('Truy vấn bị sai');
        }
        $row = mysqli_fetch_assoc($result);
        // Xóa kết quả khỏi bộ nhớ
        mysqli_free_result($result);
        if($row) {
            return $row;
        }
        return false;
    }
}