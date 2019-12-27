<div id="qlSanPham" class="">
    <h3 style="text-align:center">Quản lý Sản Phẩm</h3>
    <?php
    $a = 1;
    if (isset($_GET["a"]))
        $a = $_GET["a"];

    switch ($a) {
        case 1:
            include "pages/qlSanPham/pDanhSach.php";
            break;
        case 2:
            include "pages/qlSanPham/pThemMoi.php";
            include "pages/qlSanPham/pDanhSach.php";
            break;
        case 3:
            include "pages/qlSanPham/pCapNhat.php";
            include "pages/qlSanPham/pDanhSach.php";
            break;
    
        default:
            include "pages/pError.php";
            break;
    }
    ?>

</div>