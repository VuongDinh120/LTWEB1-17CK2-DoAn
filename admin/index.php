<?php
session_start();
include "../lib/DataProvider.php";

if (!isset($_SESSION["MaLoaiTaiKhoan"]) || $_SESSION["MaLoaiTaiKhoan"] != 2)
    DataProvider::ChangeURL("../index.php");

$c = 0;
if (isset($_GET["c"]))
    $c = $_GET["c"];
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Contend-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   
    <title>Website Youth Shop</title>
</head>

<body>

    <?php
    include "modules/mHeader.php";
    ?>
    <div class="container">
        <?php
            switch ($c){
                case 0:
                    include "pages/pIndex.php";
                break;
                case 1:
                    include "pages/qlTaiKhoan/pIndex.php";
                break;
                case 2:
                    include "pages/qlSanPham/pIndex.php";
                break;
                case 3:
                    include "pages/qlDonDatHang/pIndex.php";
                break;
                case 4:
                    include "pages/qlNhaSX/pIndex.php";
                break;
                case 5:
                    include "pages/qlLoaiSanPham/pIndex.php";
                break;
                default:
                    include "pages/pError.php";
            break;
            }        
        ?>

    </div>


    <?php
    include "../modules/mFooter.php"
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>