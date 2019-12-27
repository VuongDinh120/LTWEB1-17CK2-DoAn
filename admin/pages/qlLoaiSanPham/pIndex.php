<div id="qlLoaiSanPham" class="containz">
    <h3 style="text-align:center">Quản lý Loại Sản Phẩm</h3>
    <?php
    $a = 1;
    if (isset($_GET["a"]))
        $a = $_GET["a"];

    switch ($a) {
        case 1:
            include "pages/qlLoaiSanPham/pDanhSach.php";
            break;
        case 2:
            include "pages/qlLoaiSanPham/pThemMoi.php";
            include "pages/qlLoaiSanPham/pDanhSach.php";
            break;
        case 3:
            include "pages/qlLoaiSanPham/pCapNhat.php";
            include "pages/qlLoaiSanPham/pDanhSach.php";
            break;
    
        default:
            include "pages/pError.php";
            break;
    }
    ?>

</div>