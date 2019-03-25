<?php
/* 1) Đa hình là gì?
- Là sự đa hình của mỗi hành động cụ thể ở những đối tượng khác nhau.
vd: Hành động ăn của các loài động vật là khác nhau: heo ăn cám, hổ ăn thịt, người ăn hết
- Đa hình trong lập trình là lớp con sẽ viết lại những phương thức ở lớp cha (overwrite) */

class DongVat {
    function an() {
        echo 'Động vật đang ăn';
    }
}
class ConHeo extends DongVat {
    function an() {
        parent::an();
        echo '<br>Con heo đang ăn cám';
    }
}
$conheo = new ConHeo();
$conheo->an();

/* Bản chất đa hình là kỹ thuật cho phép thay đổi nội dung cùng 1 hành vi |(hàm) trong lớp cha và con, là viết lại hàm ở lớp cha trong lớp con */