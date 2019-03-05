<?php
/* Kế thừa lồng hay còn gọi là kế thừa nhiều lớp, nghĩa là 1 class được extends từ nhiều class. class B extends class A, class C extends class B và thế ta có luồng extends A->B->C */

/* class A {

}
class B extends A {

}
class C extends B {

} */

// Các mức truy cập trong extends lồng
/* 3 mức độ truy cập hay dùng nhất là private, protected, public. Giống như kế thừa 1 cấp tất cả những thuộc tính & phương thức ở public thì tất cả các class con dù ở levels nào cũng có thể truy xuất vào được. private thì chỉ dùng trong lớp đó. protected thì tất cả các class extends nó dù là lồng bao nhiêu lần thì cũng có thể sử dụng */
// Vd:
// class A
class A {
    protected $protected_A = 'Protected';
    private $private_A = 'Private';
    public $public_A = 'Public';
    private function showprivate() {
        echo $this->private_A;
    }
    protected function showprotected() {
        echo $this->protected_A;
    }
    function showpublic() {
        echo $this->public_A;
    }
}
// class B extends class A
class B extends A {
    function classB() {
        echo $this->protected_A;
    }
}
// class C extends class B
class C extends B {
    function showInfo() {
        // Đúng vì truy xuất vào thuộc tính protected
        $this->protected_A = 'Nguyễn Văn A';
        // Đúng vì truy xuất vào thuộc tính public
        $this->public_A = 'Nguyễn Văn B';
        // Sai vì truy xuất vào thuộc tính private
        $this->private_A = 'Lệnh sai';
    }
}
// Khởi tạo class C
$c = new C();
// Đúng vì gọi đến function public of class parent A
$c->showpublic();
// False because it call function protected of class parent A
    //$c->showprotected();
// False because it call function private of class parent A
    //$c->showprivate();
// True because it access to function public of class parent B
$c->classB();