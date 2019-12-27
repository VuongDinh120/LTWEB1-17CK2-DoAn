<div class="container">
    <h1>Tìm kiếm sản phẩm</h1>
    <div class="hot-product-wrapper">
        <div class="card-wrapper">
            <?php
            if (isset($_GET["txtSearch"]))
                $ten = $_GET["txtSearch"];
            else
                DataProvider::ChangeURL("index.php?a=404");

            $sql = "SELECT * FROM SanPham s, LoaiSanPham l, HangSanXuat h  WHERE s.BiXoa = 0 AND s.MaLoaiSanPham = l.MaLoaiSanPham 
                                AND h.MaHangSanXuat = s.MaHangSanXuat 
                                AND (s.TenSanPham LIKE '%$ten%' OR l.TenLoaiSanPham LIKE '%$ten%' OR h.TenHangSanXuat LIKE '%$ten%')";
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