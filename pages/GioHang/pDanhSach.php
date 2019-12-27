<div class="container-cart" style="overflow-x:auto;">
    <h1 style="text-align: center;">Quản lý Giỏ hàng</h1>
    <table class="table ">
        <thead>
            <tr>
                <th>#</th>
                <th class="name">Tên Sản Phẩm</th>
                <th class="image">Hình</th>
                <th class="price">Giá</th>
                <th class="quantity">Số lượng</th>
                <th class="total">Tổng cộng</th>
                <!-- <th class="update">Thao tác</th> -->
            </tr>
        </thead>
        <?php
        $tongGia = 0;
        if (isset($_SESSION["GioHang"])) {
            $soSanPham = count($gioHang->listProduct);

            for ($i = 0; $i < $soSanPham; $i++) {
                $id = $gioHang->listProduct[$i]->id;
                $sql = "SELECT * FROM SanPham WHERE MaSanPham = $id";

                $result = DataProvider::ExecuteQuery($sql);
                $row = mysqli_fetch_array($result);
        ?>
                <tbody>

                    <tr>
                        <td><?php echo $i + 1; ?></td>
                        <td class="cart_name"><?php echo $row["TenSanPham"]; ?></td>
                        <td class="cart_image"><img src="image/<?php echo $row["HinhURL"]; ?>"></td>
                        <td class="cart_price"><?php echo number_format($row["GiaSanPham"]); ?>₫</td>
                        <td class="cart_quantity">
                            <div class="amount">
                                <form name="frmGioHang" action="pages/GioHang/xlCapNhatGioHang.php" method="POST">
                                    <button id="decrease" onclick='decreaseValue("number<?php echo $i; ?>")' value="Decrease Value">-</button>
                                    <input type="number" name="txtSL" id="number<?php echo $i; ?>" value="<?php echo $gioHang->listProduct[$i]->num; ?>">
                                    <button id="increase" onclick='increaseValue("number<?php echo $i; ?>")' value="Increase Value">+</button>

                                    <input type="hidden" name="hdID" value="<?php echo $gioHang->listProduct[$i]->id; ?>" />
                                </form>
                                <!-- <button id="decrease" onclick='decreaseValue("number<?php echo $i; ?>","hidden<?php echo $i; ?>")' value="Decrease Value">-</button>
                                <input type="number" name="txtSLL" id="number<?php echo $i; ?>" value="<?php echo $gioHang->listProduct[$i]->num; ?>">
                                <button id="increase" onclick='increaseValue("number<?php echo $i; ?>","hidden<?php echo $i; ?>")' value="Increase Value">+</button> -->
                            </div>
                        </td>
                        <td class="cart_total"><?php echo number_format($row["GiaSanPham"] * $gioHang->listProduct[$i]->num); ?>₫</td>
                        <!-- <td class="cart_update">
                            <form name="frmGioHang" action="pages/GioHang/xlCapNhatGioHang.php" method="POST">
                                <input type="hidden" name="txtSL" id="hidden<?php echo $i; ?>" value="<?php echo $gioHang->listProduct[$i]->num; ?>">
                                <input type="hidden" name="hdID" value="<?php echo $gioHang->listProduct[$i]->id; ?>" />
                                <button type="submit" class="btn btn-info">Cập nhật</button>
                            </form>
                        </td> -->
                    </tr>


                </tbody>

        <?php
                $tongGia += $row["GiaSanPham"] * $gioHang->listProduct[$i]->num;
            }
        }
        $_SESSION["TongGia"] = $tongGia;
        ?>
    </table>
    <div class="total-price">TỔNG CỘNG: <?php echo number_format($tongGia) ?>₫</div>
    <div class="order"><button type="button" class="btn btn-info" onclick='location.href="pages/GioHang/xlDatHang.php";'>Đặt hàng</button></div>
</div>
<script>
    function increaseValue(a) {
        var value = parseInt(document.getElementById(a).value, 10);
        value = isNaN(value) ? 0 : value;
        value++;
        document.getElementById(a).value = value;
    }

    function decreaseValue(a) {
        var value = parseInt(document.getElementById(a).value, 10);
        value = isNaN(value) ? 0 : value;
        value < 1 ? value = 1 : '';
        value--;
        document.getElementById(a).value = value;
    }
</script>
<!-- <script>
    function increaseValue(a, b) {
        var value1 = parseInt(document.getElementById(a).value, 10);
        // var value2 = parseInt(document.getElementById(b).value, 10);
        value1 = isNaN(value1) ? 0 : value1;
        // value2 = isNaN(value2) ? 0 : value2;
        value1++;
        // value2++;
        document.getElementById(a).value = value1;
        // document.getElementById(b).value = value2;
        return true;
    }

    function decreaseValue(a, b) {
        var value1 = parseInt(document.getElementById(a).value, 10);
        // var value2 = parseInt(document.getElementById(b).value, 10);
        value1 = isNaN(value1) ? 0 : value1;
        // value2 = isNaN(value2) ? 0 : value2;
        value1 < 1 ? value1 = 1 : '';
        // value2 < 1 ? value2 = 1 : '';
        value1--;
        // value2--;
        document.getElementById(a).value = value1;
        // document.getElementById(b).value = value2;
        return true;
    }
</script> -->