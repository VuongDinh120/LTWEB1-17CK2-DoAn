<div id="qlTaiKhoan" class="">
<h3 style="text-align:center">Quản lý Tài khoản</h3>
    <?php
    $a = 1;
    if (isset($_GET["a"]))
        $a = $_GET["a"];

    switch ($a) {
        case 1:
            include "pages/qlTaiKhoan/pDanhSach.php";
            break;
        case 2:
            include "pages/qlTaiKhoan/pThemMoi.php";
            include "pages/qlTaiKhoan/pDanhSach.php";
            break;
        case 3:
            include "pages/qlTaiKhoan/pCapNhat.php";
            include "pages/qlTaiKhoan/pDanhSach.php";
            break;
    
        default:
            include "pages/pError.php";
            break;
    }
    ?>
   
</div>