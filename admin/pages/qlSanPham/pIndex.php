<div id="qlSanPham" class="">
    <h3 style="text-align:center">Quản lý Sản Phẩm</h3>
    <?php
    if (isset($_GET["id"]) && $_GET["a"] == 1) {
        include "pages/qlSanPham/pCapNhat.php";
    }
    if (isset($_GET["a"])&& $_GET["a"] == 2) {
        include "pages/qlSanPham/pThemMoi.php";
    }
    include "pages/qlSanPham/pDanhSach.php";
    ?>

</div>