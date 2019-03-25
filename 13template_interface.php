<?php
// 1) Interface là gì?
/* - Interface là 1 template (khuôn mẫu), nó không phải là 1 đối tượng mà chỉ là 1 bề nhìn bên ngoài mà nhìn vào đó ta có thể biết được tất cả các hàm của đối tượng implement nó.
- Khai báo 1 interface dùng từ khóa interface thay cho từ khóa class.
- Tất cả các hàm trong interface đều để ở dạng khai báo & không được định nghĩa (giống abstract).
- Nếu 1 đối tượng implement 1 interface thì nó phải khai báo & định nghĩa tất cả các hàm trong interface.
- Bản chất interface & abstract là khác nhau hoàn toàn.
- Interface không phải là 1 lớp cụ thể mà là 1 khuôn mẫu để cho 1 đối tượng implement nó, không thể tạo 1 biến interface.
- Lớp abstract là 1 lớp cụ thể, có đầy đủ các tính chất của 1 đối tượng, có thể gọi, định nghĩa các hàm trong nó. Đối với hằng số ở lớp implement không được định nghĩa lại. */

// VD: Hằng số bị sai
/* interface A {
    const ConstA = 'freetuts.net';
}
// Lớp này sai vì không thể định nghĩa lại hằng 
// class B implements A {
//     const ConstA = 'Other';
// }
// Lớp này đúng
class C implements A {

} */

// VD: Định nghĩa hàm trong template bị sai
/* interface DogTemplate {
    // Hàm này đúng vì khai báo mà không định nghĩa
    function run();
    // Hàm này sai vì đã định nghĩa nó
    // function eat() {

    // }
} */

// VD: Định nghĩa mức truy cập bị sai
/* interface GaTemplate {
    function Run();
    function Eat();
}
class Ga implements GaTemplate {
    // Hàm này sai vì mức độ truy cập của hàm run bên template là public mà trong hàm này ta lại khai báo là private
    // private function Run() {

    // }
    function Run() {
        
    }
    public function Eat() {
        
    }
} */

// VD: Bị thiếu hàm
/* interface CatTemplate {
    public function Run();
    public function Eat();
}
// Lớp Cat sai vì thiếu hàm Run
class Cat implements CatTemplate {
    function Eat() {
        
    }
} */

/* ======================================================================================================================== */

// 2) Tính kế thừa interface trong php
/* - Interface A có thể kế thừa interface B, lúc này đối tượng nào implements lớp A thì nó phải định nghĩa tất cả các hàm mà cả 2 lớp A & B đã khai báo. */
interface A {
    function funcA();
}
interface B extends A {
    function funcB();
}
// Lớp này đúng vì nó đã khai báo đầy đủ các hàm trong A & B
class C implements B {
    function funcA() {

    }
    function funcB() {

    }
}
// Lớp này sai vì nó khai báo mỗi hàm funcA
class D implements B {
    function funcA() {
        
    }
}