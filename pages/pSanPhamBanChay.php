<div class="hot-product-wrapper">
    <h2>SẢN PHẨM BÁN CHẠY NHẤT</h2>
    <div class="card-wrapper">
        <?php
        $sql = "SELECT * FROM SanPham WHERE BiXoa = 0 ORDER BY SoLuongBan DESC LIMIT 0, 10";
        $result = DataProvider::ExecuteQuery($sql);
        while ($row = mysqli_fetch_array($result)) {
        ?>
            <div class="card" onclick='location.href=" index.php?a=4&id=<?php echo $row["MaSanPham"]; ?>";'>
                <img src="./image/<?php echo $row["HinhURL"]; ?>">
                <h6><?php echo $row["TenSanPham"]; ?></h6>
                <p class="price"><?php echo number_format($row["GiaSanPham"]); ?>₫</p>
            </div>
        <?php
        }
        ?>
    </div>

</div>