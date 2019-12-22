<h1>Sản Phẩm theo hãng</h1>
<div class="hot-product-wrapper">
    <div class="card-wrapper">
        <?php
        if (isset($_GET["id"]))
            $id = $_GET["id"];
        else
            DataProvider::ChangeURL("index.php?a=404");

        $sql = "SELECT * FROM SanPham WHERE BiXoa = 0 AND MaHangSanXuat = $id";
        $result = DataProvider::ExecuteQuery($sql);
        while ($row = mysqli_fetch_array($result)) {
        ?>
            <div class="card" onclick='location.href=" index.php?a=4&id=<?php echo $row["MaSanPham"]; ?>";'>
                <img src="image/<?php echo $row["HinhURL"]; ?>">
                <div class="middle">
                    <button>Thêm vào giỏ hàng</button>
                </div>
                <h6><?php echo $row["TenSanPham"]; ?></h6>
                <p class="price"><?php echo number_format($row["GiaSanPham"]); ?>₫</p>
            </div>
        <?php
        }
        ?>

    </div>
    <div class="pagination-wrapper">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>