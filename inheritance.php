<?php
// Tính kế thừa là 1 trong 3 tính chất quan trọng trong LTHDT, đòi hỏi sự logic trong phân tích các đối tượng trong phần mềm, từ đó đưa ra những design pattern giúp việc nâng cấp, bảo trì phần mềm dễ dàng hơn. 
// Tính kế thừa, cách gọi phương thức & thuộc tính của lớp cha
// Cú pháp: 
            /* class classCon extends classCha {

            } */

// Lớp cha
class DongVat {
    // Thuộc tính
    var $mat;
    var $mui;
    var $tay;
    var $chan;
    // Hàm, phương thức
    function an() {
        echo 'Động vật đang ăn';
    }
    function ngu() {

    }
    function chay() {

    }
}
// Lớp con
class ConTrau extends DongVat {
    // Vì class ConTrau được kế thừa từ lớp DongVat nên các thuộc tính không cần phải khai báo lại.
    // Riêng thuộc tính này là class cha không có nền phải khai báo
    var $sung; // Con trâu có sừng
    // Tất cả các hàm, phương thức đều được kế thừa từ lớp cha nền không cần viết lại.

    // Gọi bên trong lớp con
    // Lớp con kế thừa từ lớp cha nên tất cả các phương thức & thuộc tính đều coi như là của nó (coi như chứ không phải của nó hẳn)
    // Từ khóa $this->thuoctinh, $this->phuongthuc()
    // Phân biệt hàm nào là hàm cha hàm nào là hàm con, từ khóa parent::thuoctinh, parent::phuongthuc()
    function gioi_thieu() {
        $this->mat = '<br>Đây là cái mặt';
        $this->mui = '<br>Đây là cái mũi';
        parent::an();
    }
}

// Khởi tạo đối tượng
$contrau = new ConTrau();
// Gọi bên ngoài lớp con
// Giống cách gọi bên trong lớp con, tuy nhiên không phân biệt hàm cha, hàm con
// Gọi đến hàm gioi_thieu trong lớp Con Trâu
$contrau->gioi_thieu(); // Động vật đang ăn
// Trong hàm giới thiệu có gán thuộc tính cho 2 thuộc tính, giờ xuất nó ra & xem giá trị của nó
echo $contrau->mat; // Đây là cái mặt
echo $contrau->mui; // Đây là cái mũi
