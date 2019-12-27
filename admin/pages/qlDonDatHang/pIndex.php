<div id="qlDonDatHang" class="containz">
    <?php
    if (!isset($_GET["a"])) {
    ?>
        <h3 style="text-align:center">Quản lý đơn đặt hàng</h3>
        <?php
    } else {
        if ($_GET["a"] == 1 || $_GET["a"] == 0) {
        ?>
            <h3 style="text-align:center">Quản lý đơn đặt hàng</h3>
    <?php
        }
    }
    ?>
    <?php
    $a = 0;

    if (isset($_GET["a"])) {
        $a = $_GET["a"];
    }
    switch ($a) {
        case 1:
            include "pages/qlDonDatHang/pThemMoi.php";
            include "pages/qlDonDatHang/pDanhSach.php";
            break;
        case 2:
            include "pages/qlDonDatHang/pChiTietDonDatHang.php";
            break;
        case 3:
            include "pages/qlDonDatHang/pThemMoiCTHD.php";
            include "pages/qlDonDatHang/pChiTietDonDatHang.php";
            break;
        case 4:
            include "pages/qlDonDatHang/pCapNhat.php";
            include "pages/qlDonDatHang/pChiTietDonDatHang.php";
            break;
        case 0:
            include "pages/qlDonDatHang/pDanhSach.php";
            break;
        default:
            include "pages/pError.php";
            break;
    }

    ?>

</div>