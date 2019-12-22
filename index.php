<?php
session_start();
include "./lib/DataProvider.php";

$_SESSION["path"] = $_SERVER["REQUEST_URI"];
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Contend-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Website Youth Shop</title>
</head>

<body>
    <?php
    include "./modules/mHeader.php"
    ?>

    <?php
    $a = 1;
    if (isset($_GET["a"]) == true)
        $a = $_GET["a"];
    if ($a == 1) {
        include "./pages/pCarousel.php";
    }

    switch ($a) {
        case 1:
    ?>
            <div class="wrapper">
                <?php
                include "./modules/mSidebar.php";
                include "./pages/pIndex.php";
                break;
                ?>
            </div>
                
        <?php
        case 2:
        ?>
            <div class="wrapper">
                <?php
                include "./modules/mSidebar.php";
                include "./pages/pSanPhamTheoHang.php";
                break;
                ?>
            </div>

        <?php
        case 3:
        ?>
            <div class="wrapper">
                <?php
                include "./modules/mSidebar.php";
                include "./pages/pSanPhamTheoLoai.php";
                break;
                ?>
            </div>

        <?php
        case 4:
        ?>
            <div class="wrapper">
                <div class="wrapper-product">
                    <?php
                    include "./modules/mSidebar.php";
                    include "./pages/pChiTiet.php";
                    ?>
                </div>
            </div>
    <?php
            include "./pages/pSanPhamCungLoai.php";
            break;
        case 5:
            include "./pages/GioHang/pIndex.php";
            break;
        case 6:
            include "./pages/TaoTaiKhoan/pIndex.php";
            break;
        default:
            include "./pages/pError.php";
            break;
    }
    ?>
    </div>
    <?php
    include "./modules/mFooter.php";
    ?>

</body>

</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>