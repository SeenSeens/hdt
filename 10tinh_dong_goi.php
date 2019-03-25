<?php
/* - Tính đóng gói là tính chất không cho phép người dùng hay đối tượng khác thay đổi dữ liệu thành viên của đối tượng nội tại.
- Chỉ có các hàm thành viên của đối tượng đó mới có quyền thay đổi trạng thái nội tại của nó.
- Các đối tượng khác muốn thay đổi thuộc tính thành viên của đối tượng nội tại, thì chúng cần truyền thông điệp cho đối tượng, và quyết định thay đổi hay không vẫn do đối tượng nội tại quyết định.
- Tính đóng gói là không cho bên ngoài biết được bên trong đối tượng có những gì hay được cài đặt ntn. */
