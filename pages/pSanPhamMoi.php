<div class="hot-product-wrapper">
    <h2>SẢN PHẨM MỚI NHẤT</h2>
    <div class="card-wrapper">
        <?php
        $sql = "SELECT * FROM SanPham WHERE BiXoa = 0 ORDER BY NgayNhap DESC LIMIT 0, 10";
        $result = DataProvider::ExecuteQuery($sql);
        while ($row = mysqli_fetch_array($result)) {
        ?>
            <div class="card" onclick='location.href=" index.php?a=4&id=<?php echo $row["MaSanPham"]; ?>";'>
                <img src="/image/<?php echo $row["HinhURL"]; ?>">
                <div class="middle">
                    <button>Thêm vào giỏ hàng</button>
                </div>
                <h6><?php echo $row["TenSanPham"]; ?></h6>
                <p class="price"><?php echo $row["GiaSanPham"]; ?>đ</p>
            </div>
        <?php
        }
        ?>
    </div>

</div>