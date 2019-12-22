<div class="container-cart" style="overflow-x:auto;">
    <h1 style="text-align: center;">Quản lý Giỏ hàng</h1>
    <table class="table ">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th class="name" scope="col">Tên Sản Phẩm</th>
                <th class="image" scope="col">Hình</th>
                <th class="price" scope="col">Giá</th>
                <th class="quantity" scope="col">Số lượng</th>
                <th class="total" scope="col">Tổng cộng</th>
                <th class="update" scope="col">Thao tác</th>
            </tr>
        </thead>
        <?php
        $tongGia = 0;
        if (isset($_SESSION["GioHang"])) {
            $soSanPham = count($gioHang->listProduct);

            for ($i = 0; $i < $soSanPham; $i++) {
                $id = $gioHang->listProduct->id;
                $sql = "SELECT * FROM SanPham WHERE MaSanPham = $id";

                $result = DataProvider::ExecuteQuery($sql);
                $row = mysqli_fetch_array($result);
        ?>
                <tbody>
                    <form name="frmGioHang" action="/pages/GioHang/xlCapNhatGioHang.php" method="post">
                        <tr>
                            <td scope="row"><?php echo $i; ?></td>
                            <td class="cart_name"><?php echo $row["TenSanPham"]; ?></td>
                            <td class="cart_image"><img src="image/<?php echo $row["HinhURL"]; ?>"></td>
                            <td class="cart_price"><?php echo number_format($row["GiaSanPham"]); ?>₫</td>
                            <td class="cart_quantity">
                                <div class="amount">
                                    <button id="decrease" onclick="decreaseValue()" value="Decrease Value">-</button>
                                    <input type="number" name="txtSL" id="number<?php echo $i; ?>" value="<?php echo $gioHang->listProduct[$i]->num; ?>">
                                    <button id="increase" onclick="increaseValue()" value="Increase Value">+</button>

                                    <input type="hidden" name="hdID" value="<?php echo $gioHang->listProduct[$i]->id; ?>" />
                                </div>
                            </td>
                            <td class="cart_total"><?php echo number_format($row["GiaSanPham"] * $gioHang->listProduct[$i]->num) ; ?>₫</td>
                            <td class="cart_update">
                                <button type="submit" class="btn btn-info">Cập nhật</button>
                            </td>
                        </tr>
                    </form>
                    <script>
                        function increaseValue() {
                            var value = parseInt(document.getElementById('number<?php echo $i; ?>').value, 10);
                            value = isNaN(value) ? 0 : value;
                            value++;
                            document.getElementById('number<?php echo $i; ?>').value = value;
                        }

                        function decreaseValue() {
                            var value = parseInt(document.getElementById('number<?php echo $i; ?>').value, 10);
                            value = isNaN(value) ? 0 : value;
                            value < 1 ? value = 1 : '';
                            value--;
                            document.getElementById('number<?php echo $i; ?>').value = value;
                        }
                    </script>
                </tbody>

        <?php
                $tongGia += $row["GiaSanPham"] * $gioHang->listProduct[$i]->num;
            }
        }
        $_SESSION["TongGia"] = $tongGia;
        ?>
    </table>
    <div class="total-price">TỔNG CỘNG: <?php echo number_format($tongGia) ?>₫</div>
    <div class="order"><button type="button" class="btn btn-info" onclick='location.href="/pages/GioHang/xlDatHang.php";'>Đặt hàng</button></div>
</div>