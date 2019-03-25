<?php
/* Hàm khởi tạo sẽ tự động gọi khi tạo mới 1 đối tượng, hàm hủy sẽ gọi khi đối tượng bị hủy */

echo '<h2>1) Hàm khởi tạo </h2> <br>';
/* 1) Hàm khởi tạo 
- Luôn luôn được gọi tới khi ta khởi tạo 1 đối tượng. Có thể có tham số or không có, có thể có giá trị trả về or không.
- Có 2 cách khai báo tên hàm khởi tạo.
    + C1: Khai báo tên trùng với tên lớp.
    + C2: Khai báo với tên __construct */

// C1:
class SinhVien {
    function SinhVien() {
        echo 'Lớp sinh viên được khởi tạo <br>';
    }
}
$sinhvien = new SinhVien();

// C2:
class SinhVien1 {
    function __construct() {
        echo 'Lớp sinh viên 1 được khởi tạo <br>';
    }
}
$sinhvien1 = new SinhVien1();

// Có thể có các tham số truyền vào, lúc này khi khởi tạo đối tượng thì ta sẽ truyền các tham số đó vào trong lớp.
class SinhVien2 {
    function __construct($mes) {
        echo $mes;
    }
}
$sinhvien2 = new SinhVien2('Lớp sinh viên 2 vừa được tạo <br>');

/* ======================================================================================================================================== */

echo '<h2>2) Hàm khởi tạo trong kế thừa</h2> <br>';
/* 2) Hàm khởi tạo trong kế thừa
- TH1: Lớp con có hàm khởi tạo, lớp cha cũng có hàm khởi tạo (Trường hợp này lớp con sẽ được chạy)
- TH2: Lớp con không có hàm khởi tạo, lớp cha có hàm khởi tạo (Trường hợp này lớp cha sẽ được chạy)
- TH3: Lớp con có hàm khởi tạo, lớp cha không có hàm khởi tạo (Trường hợp này lớp con sẽ được chạy)
- Th4: Cả lớp con & lớp cha đều không có hàm khởi tạo (Không có hàm nào được chạy) */

// TH1
class A {
    function __construct() {
        echo 'Lớp A được khởi tạo <br>';
    }
}
class B extends A {
    function __construct() {
        echo 'Lớp B được khởi tạo <br>';
    }
}
$a = new B();

// TH2
class C {
    function __construct() {
        echo 'Lớp C được khởi tạo <br>';
    }
}
class D extends C {

}
$b = new D();

// TH3
class E {

}
class F extends E {
    function __construct() {
        echo 'Lớp F được khởi tạo<br>';
    }
}
$c = new F();

// TH4
class G {

}
class H extends G {

}
$c = new H();

/* ======================================================================================================================================== */

echo '<h2>3) Hàm hủy</h2><br>';
/* 3) Hàm hủy
- Là hàm tự động gọi sau khi đối tượng bị hủy, thường được dùng để giải phóng bộ nhớ chương trình.
- Có thể có hàm hủy or không */

class I {
    function __construct() {
        echo 'Lớp I được khởi tạo<br>';
    }
    function show() {
        echo 'Lớp I đang được sử dụng<br>';
    }
    function __destruct() {
        echo 'Lớp I bị hủy<br>';
    }
}
$i = new I();
$i->show();

/* ======================================================================================================================================== */
//echo '<h2>4) Hàm hủy trong kế thừa</h2><br>';
/* 4) Hàm hủy trong kế thừa.
- Tương tự như hàm khởi tạo trong kế thừa.
- Nếu lớp con có hàm hủy thì được ưu tiên chạy, còn nếu lớp con không có hàm hủy thì sẽ chạy ở lớp cha, còn nếu cả 2 không có thì sẽ không chạy hàm nào. */