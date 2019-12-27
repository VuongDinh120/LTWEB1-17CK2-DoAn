<?php
if (isset($_GET["id"]))
    $id = $_GET["id"];
else
    DataProvider::ChangeURL("index.php?a=404");

$sql = "SELECT * FROM HangSanXuat WHERE BiXoa = 0 AND MaHangSanXuat = $id";
$result = DataProvider::ExecuteQuery($sql);
$row = mysqli_fetch_array($result);
?>
<div class="container">
    <h1 style="margin: 20px;">Sản Phẩm theo hãng: <span><?php echo $row["TenHangSanXuat"]?></span></h1>
    <div class="hot-product-wrapper">
        <div class="card-wrapper">
            <?php
            $sql = "SELECT * FROM SanPham WHERE BiXoa = 0 AND MaHangSanXuat = $id";
            $result = DataProvider::ExecuteQuery($sql);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="card" onclick='location.href=" index.php?a=4&id=<?php echo $row["MaSanPham"]; ?>";'>
                    <img src="image/<?php echo $row["HinhURL"]; ?>">
                    <h6><?php echo $row["TenSanPham"]; ?></h6>
                    <p class="price"><?php echo number_format($row["GiaSanPham"]); ?>₫</p>
                </div>
            <?php
            }
            ?>

        </div>

    </div>
</div>