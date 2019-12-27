<div id="qlTaiKhoan" class="">
    <h3 style="text-align:center">Quản lý tài khoản</h3>
    <?php
    if (isset($_GET["id"])) {
        include "pages/qlTaiKhoan/pCapNhat.php";
    }
    include "pages/qlTaiKhoan/pDanhSach.php";
    ?>
   
</div>