<?php
// Các mức độ truy cập trong private, protected & public
/* Trong tính kế thừa tất cả các thuộc tính & phương thức của lớp cha đều được sử dụng cho lớp con, nhưng thực tế có những thuộc tính & phương thức ở lớp cha không muốn lớp con có thể truy cập vào. Cũng như lớp con có những thuộc tính và phương thức chỉ muốn sử dụng riêng trong lớp đó thôi chứ không được truy xuất ở ngoài lớp. Để giải quyết vấn đề này ta sẽ tìm hiểu các mức độ truy cập private, protected, public trong lập trình hướng đối tượng */

 echo '<h1> private </h1>';
/* Đây là thành phần chỉ dành riêng cho nội bộ của lớp, nghĩa là không thể truy xuất tới thành phần private ở lớp con hoặc ở bên ngoài lớp. 
Thường được sử dụng với
    Các thuộc tính dữ liệu nhằm bảo vệ chúng, tránh sự truy cập tự do từ bên ngoài. Các thuộc tính này sẽ có những hàm get & set để gán & lấy dữ liệu.
    Các phương thức trung gian tính toán trong nội bộ của đối tượng mà ta không muốn bên ngoài có thể can thiệp vào. */

// Vd: Không kế thừa
class Xe {
    private $loaixe;
    var $tenxe;
    function getLoaiXe() {
        return $this->loaixe;
    }
    function setLoaiXe($loaixe) {
        $this->loaixe = $loaixe;
    }
    private function xoaLoaiXe() {
        echo 'Xóa xe';
    }
}
// Khởi tạo đối tượng xe
$xe = new Xe();
// Gán giá trị cho thuộc tính loại xe
$xe->setLoaiXe('Sirius');
// Lấy giá trị thuộc tính loại xe
echo $xe->getLoaiXe();
// Ở vd trên muốn truy cập thuộc tính loaixe thì phải thông qua phương thức setLoaiXe & getLoaiXe chứ không thể trỏ thẳng trực tiếp đến thuộc tính loaixe vì thuộc tính loại xe đang ở mức private.

// Vd: Có kế thừa
class XeHonDa extends Xe {
    function hienthithongtin() {
        // lệnh này đúng
        echo $this->tenxe;
        // lệnh này sai, vì thuộc tính loại xe là private trong lớp cha
            //echo $this->loaixe;
        // lệnh này đúng
        $this->setLoaiXe('<br>Kawasaki');
        echo $this->getLoaiXe();
        // lệnh này sai, vì hàm xoaLoaiXe là private trong lớp cha
            //$this->xoaLoaiXe();
    }
}
// Khởi tạo lớp xe hon da
$xehonda = new XeHonDa();
// Gọi hàm hienthithongtin trong class XeHonDa kiểm tra function này và xem các error đã note
$xehonda->hienthithongtin();
// Đúng vì class XeHonDa extends class Xe
$xehonda->setLoaiXe('<br>Suzuki');
echo $xehonda->getLoaiXe();
// Sai vì function xoaLoaiXe trong class Xe là private nên class XeHonDa không được kế thừa
    //$xehonda->xoaLoaiXe();

echo '<hr>';
echo '<h1>protected</h1>';
/* Chỉ cho phép truy xuất nội bộ trong lớp đó & lớp kế thừa, riêng ở bên ngoài lớp không thể truy xuất được. Thường được dùng cho những phương thức và thuộc tính có khả năng bị lớp con định nghĩa lại (overwrite) */

// Vd:
class MayTinh {
    protected $loai;
}
// extends từ class MayTinh
class XachTay extends MayTinh {
    function thongtin() {
        // Đúng vì loai đang ở protected nên nó được kế thừa
        $this->loai = 'Dell';
    }
    protected function sua() {
        // lệnh
    }
}
// Khởi tạo đối tượng
$xachtay = new XachTay();
// Sai loai đang ở protected nên ở bên ngoài lớp không được truy xuất vào
    //$xachtay->loai = 'Hàng hịn';
// Đúng
$xachtay->thongtin();
// Sai, function sua đang ở protected nên không thể truy xuất bên ngoài class XachTay
    //$xachtay->sua();

echo '<hr>';
echo '<h1>public</h1>';
/* Là mức độ truy cập thoáng nhất, vì có thể truy cập tới các phương thức & thuộc tính ở bất cứ đâu, dù trong nộ nộ của lớp hay ở lớp con hay cả bên ngoài lớp đều được.
Khi khai báo thuộc tính là public có thể dùng từ khóa var để thay thế cho public
VD: var $sokhung;, public $soseri;
Khi khai báo với function là public nếu ta không đặt từ public ở đầu thì php sẽ tự hiểu function này là public */

//Vd:
class DienThoai {
    // public vì không có từ khóa gì ở trước
    function showDienThoai() {
        // lệnh
    }
    // public vì có từ khóa public ở trước
    public function showhangDienThoai() {
        // lệnh
    }
    // private vì có từ khóa private ở trước
    private function getDienThoai() {
        // lệnh
    }
    // protected vì có từ khóa protected ở trước
    protected function setDienThoai() {
        // lệnh
    }
}
