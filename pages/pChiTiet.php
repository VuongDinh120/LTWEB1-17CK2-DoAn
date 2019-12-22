<?php
if (isset($_GET["id"]))
    $id = $_GET["id"];
else
    DataProvider::ChangeURL("index.php?a=404");

$sql = "SELECT s.MaSanPham, s.TenSanPham, s.GiaSanPham, s.SoLuongNhap, s.SoLuongTon, s.SoLuotXem, s.HinhURL, s.XuatXu, s.MoTa, h.TenHangSanXuat, l.TenloaiSanPham
        FROM SanPham s, HangSanXuat h, LoaiSanPham l WHERE s.BiXoa = 0 AND s.MaHangSanXuat = h.MaHangSanXuat AND s.MaLoaiSanPham = l.MaLoaiSanPham AND s.MaSanPham = $id";
$result = DataProvider::ExecuteQuery($sql);
$row = mysqli_fetch_array($result);

if($row == null)
    DataProvider::ChangeURL("index.php?a=404");

?>
<div class="container-product-detail">
    <div class="view-product">
        <div class="image-show" style="background-image: url('./image/<?php echo $row["HinhURL"] ;?>');  background-repeat: no-repeat;
                            background-size: contain;">
        </div>
        <div class="product-info">
            <div class="product-name"><?php echo $row["TenSanPham"] ;?></div>
            <div class="flex seen">
                <div><?php echo $row["SoLuotXem"] + 1; ?> lượt xem</div>
                <div><?php echo $row["SoLuongNhap"] - $row["SoLuongTon"]; ?> đã bán</div>
            </div>
            <h4 class="product-price"><?php echo number_format($row["GiaSanPham"]); ?> ₫</h4>
            <div class="flex">
                <div style="padding-bottom: 21px;">Số lượng</div>
                <div class="amount">
                    <button id="decrease" onclick="decreaseValue()" value="Decrease Value">-</button>
                    <input type="number" name="btnSL" id="number" value="1">
                    <button id="increase" onclick="increaseValue()" value="Increase Value">+</button>
                </div>
            </div>
            <div class="flex">
                <button type="button" class="btn btn-primary">Thêm vào giỏ hàng</button>
                <button type="button" class="btn btn-danger">Mua ngay</button>
            </div>
        </div>
        <div class="product-detail-info">
            <div class="product-detail-label">Thông tin sản phẩm</div>
            <div class="detail-row">
                <label>Xuất xứ</label>
                <div><?php echo $row["XuatXu"]; ?></div>
            </div>
            <div class="detail-row">
                <label>Loại sản phẩm</label>
                <div><?php echo $row["TenLoaiSanPham"]; ?></div>
            </div>
            <div class="detail-row">
                <label>Hãng xản xuất</label>
                <div><?php echo $row["TenHangSanXuat"]; ?></div>
            </div>
            <div class="detail-row">
                <label>Sản phẩm còn lại</label>
                <div><?php echo $row["SoLuongTon"]; ?></div>
            </div>

            <div class="product-detail-label">Mô tả sản phẩm</div>
            <div><?php echo $row["MoTa"]; ?></div>
        </div>
    </div>
</div>
<?php
$SoLuotXem = $row["SoLuotXem"] + 1;
$sql = "UPDATE SanPham SET SoLuotXem = $SoLuotXem
            WHERE MaSanPham = $id";
DataProvider::ExecuteQuery($sql);
?>