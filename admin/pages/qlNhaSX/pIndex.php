<div id="qlNhaSX" class="containz">
    <h3 style="text-align:center">Quản lý hãng sản xuất</h3>
    <?php
    $a = 1;
    if (isset($_GET["a"]))
        $a = $_GET["a"];

    switch ($a) {
        case 1:
            include "pages/qlNhaSX/pDanhSach.php";
            break;
        case 2:
            include "pages/qlNhaSX/pThemMoi.php";
            include "pages/qlNhaSX/pDanhSach.php";
            break;
        case 3:
            include "pages/qlNhaSX/pCapNhat.php";
            include "pages/qlNhaSX/pDanhSach.php";
            break;
    
        default:
            include "pages/pError.php";
            break;
    }
    ?>

</div>