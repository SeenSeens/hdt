<?php
/* - Không được xếp vào tính chất quan trọng, giống như tính kế thừa theo tầm nhìn bề ngoài.
- Lớp abstract sẽ định nghĩa các hàm (phương thức) mà từ đó các lớp con sẽ kế thừa nó & overwrite lại (tính đa hình).
- Tất cả các phương thức của lớp abstract đều được khai báo là abstract & phải ở mức protected & public, không được ở mức private.
- Lớp abstract có thể có thuộc tính nhưng thuộc tính không được khai báo là abstract, không thể tạo 1 biến abstract được. */

// Cú pháp:
/* abstract class BaseClass {
    abstract protected function hello();
    abstract public function hi();
} */

// Trong lớp abstract các phương thức khai báo ở dạng abstract đều phải tuân theo cú pháp trên, tức là không được định nghĩa thêm dòng lệnh nào bên trong nó.
/* abstract class FalseClass {
    // Phương thức này sai vì hàm hello là hàm abstract nên không được code bên trong nó
    abstract function hello() {
        echo 1;
    }
} */

// Không thể tạo 1 biến đối tượng mới của lớp abstract
/* abstract class NotAddVar {
    abstract function he();
}
// Sai vì NotAddVar là lớp abstract nên không khởi tạo mới được
$base = new NotAddVar(); */

// Mức độ truy cập phải ở protected or public để lớp kế thừa có thể định nghĩa lại & các thuộc tính của lớp abstract không được khai báo là abstract.
/* abstract class AccLev {
    public $name;
    // Sai các thuộc tính không được để ở dạng abstract
    //abstract public $tit;

    abstract protected function cc();

    // Sai hàm abstract không thể ở private
    //abstract private function ff();
} */

// Lớp kế thừa từ lớp abstract phải rewrite lại tất cả các hàm abstract trong lớp abstract, nếu không sẽ bị báo sai.
/* abstract class Person {
    protected $ten;
    protected $cmnd;
    protected $namsinh;
    abstract function showInfo();
}
// Lớp này sai chưa viết lại hàm showInfo
// class CongNhan extends Person {

// }

// Lớp này đúng vì đã khai báo, viết lại đầy đủ các hàm abstract
class SinhVien extends Person {
    function showInfo() {
        
    }
} */

/* ======================================================================================================================================================= */
/* 2) Hàm & lớp final
- Lớp final là lớp được khai báo cuối cùng, không 1 lớp nào có thể kế thừa nó.
- Hàm final trong abstract or trong kế thừa chỉ để gọi sử dụng, không được viết lại (Override) */
/* final class Person {
    protected $ten;
    protected $cmnd;
    protected $namsinh;
    function showInfo() {
        echo 'Ahihi';
    }
}
// Hàm này lỗi vì lớp sinh viên đã kế thừa 1 lớp final, điều này là không thể
// class SinhVien extends Person {

// }

// Đúng vì lớp final được sử dụng bình thường như các lớp khác, chỉ có đièu không được kế thừa
$person = new Person();
$person->showInfo();    */ 

class Person
{
    protected $ten;
    protected $cmnd;
    protected $namsinh;
    final public function showInfo()
    {
        echo 'freetuts.net';
    }
}
  
// Lớp này đúng vì lớp Person không phải
// là một lớp final
class SinhVien extends Person {
  
    // Hàm này sai vì hàm showInfo
    // là hàm final trong lớp Person
    // nên không thể Override lại
    // public function showInfo(){
  
    // }
  
    public function Go()
    {
        // Đoạn code này đúng vì hàm final được
        // sử dụng bình thường
        $this->showInfo();
    }
}