<?php
/* 1) Khái niệm dữ liệu tĩnh
- Là loại dữ liệu được sử dụng ở dạng toàn cục.
- Dù xử lý ở bất kỳ file nào trong cùng 1 chương trình đều được lưu lại trong lớp. */
// Vd1: Không sử dụng thành viên tĩnh
class Animal {
    protected $_name = 'Chưa có tên<br>';
    function setName($name) {
        $this->_name = $name;
    }
    function getName() {
        return $this->_name;
    }
}
// P1: Con vịt
$con_vit = new Animal();
$con_vit->setName('Con vịt<br>');
echo $con_vit->getName(); // Con vịt
// P2: Con heo
$con_heo = new Animal();
echo $con_heo->getName(); // Chưa có tên
// Vd2: Sử dụng thành viên tĩnh
class Animel {
    protected static $_name = 'Chưa có tên<br>';
    function setName($name) {
        Animel::$_name = $name;
    }
    function getName() {
        return Animel::$_name;
    }
}
// P1: Con vịt
$con_vit = new Animel();
$con_vit->setName('Con vjt<br>');
echo $con_vit->getName(); // Con vjt
// P2: Con heo
$con_heo = new Animel();
echo $con_heo->getName(); // Con vjt

/* - Khai báo dạng tĩnh (từ khóa static).
- Sử dụng dạng tĩnh và khi có thao tác thay đổi dữ liệu thì nó lưu vào class Animel nên khi khởi tạo thêm biến nó đều bị ảnh hưởng theo. */

echo '===================================================================================================================================================== <br>';

/* 2) Các vấn đề thông dụng khi sử dụng thành viên tĩnh.
Cú pháp:
- Thuộc tính: [public | protected | private] static $name;
vd: public static $name;
- Phương thức: [public | protected | private] static function functionName(){}
vd: public static function setName(){} */
// Vd: Truy cập trực tiếp không cần khởi tạo object
class Enimal {
    protected static $_name = 'Chưa có tên';
    static function setName($name) {
        Enimal::$_name = $name;
    }
    static function getName() {
        return Enimal::$_name;
    }
}
Enimal::setName('Con chó<br>');
echo Enimal::getName(); // Con chó
// Vd: Gọi các hàm tĩnh trong nội bộ class
class Enimel {
    protected static $_name = 'Chưa có tên';
    static function setName($name) {
        Enimel::$_name = $name;
    }
    static function getName() {
        return Enimel::$_name;
    }
    static function all($name) {
        Enimel::setName($name);
        echo Enimel::getName(); // Cái đựu
    }
}
Enimel::all('Cái đựu');

/* - Gọi các thành viên tĩnh nội bộ lẫn nhau trong chính đối tượng đó thông qua cú pháp (::).
- Sử dụng ở ngoải lớp ta vẫn dùng (::) thay vì (->).
- Lưu ý khi gọi đến thuộc tính tĩnh thường dùng $this->name, nhưng trong thành viên tĩnh thì khác dùng thêm dấu ($) nữa, vd Animal::$name. */

// Vd: Không sử dụng từ khóa $this.
/* - Vì các thuộc tính & phương thức tĩnh ở dạng toàn cục, được gọi mà không cần khởi tạo nên nếu dùng từ khóa ($this) để gọi đến 1 hàm nào đó trong chính lớp đó sẽ bị báo sai.
- Trong phương thức tĩnh chỉ gọi được những thuộc tính & phương thức cùng class ở dạng tĩnh.
- Cách gọi trực tiếp tên class ta có thể dùng từ khóa (self) để thay thế. vd: self::name */
class Erinel {
    protected $_age;
    protected static $_name = 'Chưa có tên';
    static function setInfo($name, $age) {
        Erinel::$_name = $name;
        // Sai vì $this không tồn tại
        $this->_name = $name;
        $this->_age = $age;
        // Sai vì thuộc tính $_age không phải là tỉnh
        Erinel::$_age = $age;
    }
}
// Vd: Kế thừa khi sử dụng static
/* - Về tính kế thừa nó không có gì đặc biệt, chỉ khác là dùng dấu (::) để truy xuất đến hàm tĩnh của lớp cha. */
class Erimel {
    protected static $_name;
    static function setName($name) {
        Erimel::$_name = $name;
    }
    static function getName() {
        return Erimel::$_name;
    }
}
class ConHeo extends Erimel {
    static function setName($name) {
        parent::setName($name);
    }
}
ConHeo::setName('<br>Con heo');
echo ConHeo::getName();

echo '<br>=============================================================================================================================================================<br>';

/* 3) Lợi hại khi sử dụng thành viên tĩnh static
- Ưu điểm là ta có thể thay đổi dữ liệu toàn cục cho đối tượng, không cần khởi tạo đối tượng mới vẫn sử dụng được.
- Khuyết điểm là khai báo tĩnh thì chương trình sẽ xử lý lưu trữ toàn cục nên sẽ tốn bộ nhớ hơn. */